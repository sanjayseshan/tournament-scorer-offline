<?php

// configuration
$url = 'createpassword.php';
//$file = 'tournaments.txt';

// check if form has been submitted
if (isset($_POST['usr']))
{

$myfile = fopen($_POST['usr'], "r") or die("Incorrect Username");
$password = $_POST['pas'];
//$rememberme = $_POST['user'];
$filepassword = trim(fgets($myfile));
$filerole = trim(fgets($myfile));
//echo $password;
//echo $filepassword;



fclose($myfile);

if (strcmp(md5($password), $filepassword) == 0) {

// echo 'correct';
if (strcmp($filerole, 'Tournament Director') == 0) {
	if (strcmp($_GET['data'], 'scorer') == 0) {
		header( 'Location: loadscorer.html') ;
	} elseif (strcmp($_GET['data'], 'corevalue') == 0) {
		header( 'Location: /CoreValues.html#' . $_GET['hash']) ;
	} elseif (strcmp($_GET['data'], 'rdes') == 0) {
		header( 'Location: /Rdes.html#' . $_GET['hash']) ;
	} elseif (strcmp($_GET['data'], 'project') == 0) {
		header( 'Location: /Project.html#' . $_GET['hash']) ;
	} else {
		  header( 'Location:'. $_GET['data']  . '.php#') ;
	}
	echo 'hi TD';
} elseif (strcmp($filerole, 'Head Referee') == 0) {
    if (strcmp($_GET['data'], 'scorer') == 0) {
	      header( 'Location: loadscorer.html') ;
    } else {
	     echo 'Denied';
    }
} elseif (strcmp($filerole, 'Referee') == 0) {
   if (strcmp($_GET['data'], 'scorer') == 0) {
     header( 'Location: loadscorer.html') ;
   } else {
      echo 'Denied';
   }
} elseif (strcmp($filerole, "Head Judge") == 0) {
	if (strcmp($_GET['data'], 'corevalue') == 0) {
              header( 'Location: /CoreValues.html#' . $_GET['hash']) ;
        } elseif (strcmp($_GET['data'], 'rdes') == 0) {
                header( 'Location: /Rdes.html#' . $_GET['hash']) ;
        } elseif (strcmp($_GET['data'], 'project') == 0) {
                header( 'Location: /Project.html#' . $_GET['hash']) ;
   	} else {
   	   echo 'Denied';
   	}

} elseif (strcmp($filerole, "Core Values Judge") == 0) {
	if (strcmp($_GET['data'], 'corevalue') == 0) {
              header( 'Location: /CoreValues.html#' . $_GET['hash']) ;
   	} else {
   	   echo 'Denied';
   	}

} elseif (strcmp($filerole, "Project Judge") == 0) {
        if (strcmp($_GET['data'], 'project') == 0) {
                header( 'Location: /Project.html#' . $_GET['hash']) ;
        } else {
           echo 'Denied';
        }

} elseif (strcmp($filerole, "Robot Design Judge") == 0) {
        if (strcmp($_GET['data'], 'rdes') == 0) {
                header( 'Location: /Rdes.html#' . $_GET['hash']) ;
        } else {
           echo 'Denied';
        }

} else {
    echo 'unknown';
}

} else {
   echo 'Incorrect, please try again';
}



}

// read the textfile

$text = file_get_contents($file);


?>
<p style="font-size: 150%;">

<!-- HTML form -->Tournament Login Page.
<script>document.write('<form action="'+window.location.search+'" method="post">')</script>
Email:<input type="username" rows="20" cols="50" id="usr" name="usr" value="">
Password:<input type="password" rows="20" cols="50" id="pas" name="pas" value="">
<br>
<input type="submit" />
<input type="reset" />
</form>
<button onclick="window.location.href = '/' + window.location.href.split('/')[3] + '/'">Back to main page</button></p>
