<?php

$php_errormsg = 'Failed to save score. Please try again.';
$fh = fopen(urldecode($_GET['fname']),'w')         or die($php_errormsg);
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
    echo(urldecode($_GET['data']));
    fwrite($fh,urldecode($_GET['data'])) or die($php_errormsg);
    fwrite($fh,"\n") or die($php_errormsg);
    fflush($fh)                              or die($php_errormsg);
    flock($fh,LOCK_UN)                       or die($php_errormsg);
    fclose($fh)                              or die($php_errormsg);
} else {
    print "Can't get lock.";
}  
?>
