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
$url = '';
//$file = 'tournaments.txt';

// check if form has been submitted
if (isset($_POST['usr']))
{
$myfile = fopen($_POST['usr'], "w");
$txt = md5($_POST['pas']);
   fwrite($myfile, $txt);
   $txt = "\n";
fwrite($myfile, $txt);
   $txt = $_POST['role'];
fwrite($myfile, $txt);
fclose($myfile);
    header(sprintf('Location: %s', $url));
    printf('<a href="%s">Add new user</a>.', htmlspecialchars($url));
printf('<br><a href="url.html#%s">View Tournament Dashboard</a>.', htmlspecialchars($_GET['data']));
exit();
}

// read the textfile

$text = file_get_contents($file);


?>
<p style="font-size: 150%;">

<!-- HTML form --><b>User Setup:
<br>
Tournament Director:</b> Create a user for the Tournament Director. This user will be able to access the Tourament Scorer designed for your tournament and the Setup page.<br>
<b>Head Referee:</b> Create a user for the Head Referee. This user will be able to access the only the Tournament Scorer and the Score Editor page.<br>
<b>Referee:</b> Create one user for all Referees. The referees will only be able to access only the Tournament Scorer page.<br>
<form action="" method="post">
Email:<input type="username" rows="20" cols="50" id="usr" name="usr" value="">
Password:<input type="password" rows="20" cols="50" id="pas" name="pas" value="">
<br>
Role:<select id="role" name="role">
  <option>Tournament Director</option>
  <option>Head Referee</option>
  <option>Referee</option>
<!--  <option>Head Judge</option>
  <option>Core Values Judge</option>
  <option>Project Judge</option>
  <option>Robot Design Judge</option>-->
  </select>
<br>
<input type="submit" />
<input type="reset" />
<br>


</p>
<br>
</form>

<br><br>
Note: Judges should be marked as referee and Head Judges should be marked as Head Referee.
