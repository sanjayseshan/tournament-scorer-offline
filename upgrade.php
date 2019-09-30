<h1>EV3Lessons Tournament Scoring System v<script>
function textFileToArray(filename) {
    var reader = (window.XMLHttpRequest != null )
               ? new XMLHttpRequest()
               : new ActiveXObject("Microsoft.XMLHTTP");
    reader.open("GET", filename, false );
    reader.send();
    return reader.responseText.split(/\r\n|\n|\r/);  //split(/(\r\n|\n)/g)
}
document.write(textFileToArray('/version.txt')[0]);
  </script>
</h1>
<?php

// configuration
$url = 'start.php';
$file = 'tournaments.txt';

// check if form has been submitted
if (isset($_POST['text']))
{

//$myfile = fopen($file, "a") or die("Unable to open file!");
$txt = $_POST['text'];

$data = md5($_POST['text']);
   echo md5("testaaa") ;
   mkdir($data, 0777);
    mkdir($data . '/images', 0777);
   copy('version.txt', $data . '/version.txt');
   copy('setup.php', $data . '/setup.php');
   copy('edit.php', $data . '/edit.php');
   copy('save.php', $data . '/save.php');
   copy('indexblank.html', $data . '/index.html');
   copy('createpassword.php', $data . '/createpassword.php');
   copy('saverb.php', $data . '/saverb.php');
   copy('login.php', $data . '/login.php');
 copy($_POST['text'] . '/teams.txt', $data . 'teams.txt');
 copy($_POST['text'] . '/scores.txt', $data . 'scores.txt');
copy($_POST['text'] . '/rounds.txt', $data . 'rounds.txt');
copy('recovery.php', $data . '/recovery.php');
copy('logo.jpg', $data . '/images/logo.jpg');
copy('version.txt', $data . '/version.txt');
copy('blank-cv.txt', $data . '/blank-cv.txt');
copy('blank-pr.txt', $data . '/blank-pr.txt');
copy('blank-rd.txt', $data . '/blank-rd.txt');
header( 'Location: ' . $data . '/createpassword.php?data=' . $data) ; 
$myfile1 = fopen($data . '/tournament.txt', "w") or die("Unable to open file!");
$txt1 = $_POST['text'];
fwrite($myfile1, $txt1);
fclose($myfile1);
}

// read the textfile

$text = file_get_contents($file);


?>
<p style="font-size: 150%;">

<!-- HTML form --><b>Tournament Upgrade Wizard</b>
<br>If you were running version 1.0, you will need to re-bookmark the newly generated link for your Dashboard.<br>To start the upgrade, enter your tournament name: 
<form action="" method="post">
<script>
document.write('<input type="text" rows="20" cols="50" id="text" name="text" value="'+decodeURIComponent(window.location.hash.substring(1))+'">');
</script>
<br>
<input value="Start" type="submit" />
<input type="reset" />
<br>
Note: If you have uploaded a tournament logo, it will be erased during the upgrade.
</p>
</form>
