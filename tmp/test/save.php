<?php

$php_errormsg = 'Failed to save score. Please try again.';
$fh = fopen($_GET['name'],'w')         or die('die 1');
$tries = 3;
while ($tries > 0) {
    $locked = flock($fh,LOCK_EX | LOCK_NB);
    if (! $locked) {
        sleep(5);
        $tries--;
    } else {
        // don't go through the loop again 
        $tries = 0;
    }
}
if ($locked) {
    fwrite($fh,$_GET['data']) or die($php_errormsg);
    fwrite($fh,"\n") or die($php_errormsg);
    fflush($fh)                              or die($php_errormsg);
    flock($fh,LOCK_UN)                       or die($php_errormsg);
    fclose($fh)                              or die($php_errormsg);
} else {
    print "Can't get lock.";
}  


$myfile = fopen("scores.txt", "w") or die("Unable to open file!");
$txt = $_GET['data'];
fwrite($myfile, $txt);
fclose($myfile);

//echo file_put_contents("test.txt","Hello World. Testing!");
?>
