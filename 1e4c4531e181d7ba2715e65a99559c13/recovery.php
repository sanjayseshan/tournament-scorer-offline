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
//echo $_GET['data'] . 'hi';
// configuration
$url = '';
//$file = 'tournaments.txt';
// check if form has been submitted
if (isset($_POST['usr']))
{
//$myfile = fopen($_POST['usr'], "w") or die("User not availiable");
if (file_exists($_POST['usr']) == 1) {
$to      = $_POST['usr'];
$subject = 'Password recovery';
$message = 'Here is the link to reset your password: http://www.seshan.org:8000/' . $_GET['data'] . '/createpassword.php';
$headers = 'From: no-reply@tournament.ev3lessons.com' . "\r\n" .
    'Reply-To: team@ev3lessons.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
} else {
echo 'User not availiable';
}
header(sprintf('Location: %s', $url));
printf('Password reset email has been sent to the email you entered');
printf('<br><a href="/url.html#%s">View Tournament Dashboard</a>.', htmlspecialchars($_GET['data']));
exit();
}

// read the textfile

$text = file_get_contents($file);


?>
<p style="font-size: 150%;">

<!-- HTML form --><b>User Password Reset:
<br>Password reset link will be sent to the email you enter. The email may go into junk mail.
<br>
<form action="" method="post">
Email:<input type="username" rows="20" cols="50" id="usr" name="usr" value="">
<br></b>
<input type="submit" />
<input type="reset" />
<br>


</p>
<br>
</form>
