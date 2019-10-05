<?php

// configuration
$url = 'start.php';
$file = 'tournaments.txt';

// check if form has been submitted
if (isset($_POST['text']))
{
/*    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])):
        //your site secret key
        $secret = '6LcK4DEUAAAAALT5142P8DWJxjA3RsgmdqUaQfuP';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success):*/
		$name = $_POST['text'];
		$nameenc = md5($_POST['text']);
		if (file_exists($nameenc) != 1) {
			exec('cp -r ' . 'template/ ' . $nameenc);
//			mkdir($data . '/images', 0777);
//			copy('template/', $nameenc);
			header( 'Location: ' . $nameenc . '/createpassword.php?data=' . $nameenc) ; 
			$tournname = fopen($nameenc . '/tournament.txt', "w") or die("Unable to open file!");
			fwrite($tournname, $name);
			fclose($tournname);
			echo 'success';
		} else {
			header( 'Location: '. $nameenc . '/index.html#') ; 
		}

/*        else:
            $errMsg = 'Robot verification failed, please try again.';
	    echo $errMsg;
        endif;
    else:
        $errMsg = 'Please click on the reCAPTCHA box.';
	echo $errMsg;
    endif;*/
}

// read the textfile

//$text = file_get_contents($file);


?>

<head>
<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" type="text/css" href="css/accordian.css">

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<title>Start</title>

</head>
<body>
  <div style="max-width: 1024px;margin:0 auto;">
    <script>
    $(function(){
      $("#header").load("header.html");
    });
    </script>
     <div id="header"></div><br>
  <section style="padding: 5px 5px 5px 15px;">

  <h2>Start a Tournament<!-- v<script>
function textFileToArray(filename) {
    var reader = (window.XMLHttpRequest != null )
               ? new XMLHttpRequest()
               : new ActiveXObject("Microsoft.XMLHTTP");
    reader.open("GET", filename, false );
    reader.send();
    return reader.responseText.split(/\r\n|\n|\r/);  //split(/(\r\n|\n)/g)
}
document.write(textFileToArray('/version.txt')[0]);
  </script>--></h2>
</section><br><section> <div class="text-body" style="font-size: 20px;">

<p style="font-size: 150%;">
<script src='https://www.google.com/recaptcha/api.js'></script>

<!-- HTML form -->Tournament Name:
<form action="" method="post">
<input style="font-size:20px;width:500px; height:50px" type="text" rows="20" cols="50" id="text" name="text" value="">
<br><br>

<!--<div class="g-recaptcha" data-sitekey="6LcK4DEUAAAAAAUGO2pq__6V0K51-DwreZYdOB3f"></div>-->

<input id="sub" value="Create" type="submit" />
<input type="reset" value="Clear" />


<br><!--
If your tournament ALREADY exists, you will be taken directly to the urls. If your tournament DOES NOT exist yet, you will be asked to create a password(s).-->
</p>


</form>
</div>
</section><br>
<section>
<div>
<h2>Load Existing Tournament:</h2>
</div>
</section><br>
<section>
<div>
<br>
<script>
function loadtourn(tourn) {
	document.getElementById('text').value = tourn
	document.getElementById('sub').click()

}

tournaments = textFileToArray('/tournaments.txt')
x = 0
while (x != tournaments.length) {
//document.write('<button onclick="loadtourn(\''+tournaments[x]+'\')">'+tournaments[x]+'</button><br>')
x = x+1
}
</script>
<?php
foreach (glob("*/tournament.txt*") as $filename) {
//	echo $filename."<br />";
	$file = fopen($filename,"r");
	$x = fgets($file);
	$y = str_replace("'", "\'", $x);
	echo '<button onclick="loadtourn(\''. $y .'\')">'. $x .'</button><br>';
	fclose($file);
}
?>

</div>

</section>
<br>
    <script>
    $(function(){
      $("#footer").load("footer.html");
    });
    </script>
     <div id="footer"></div>
  </div>
<script src='js/accordian.js'></script>

</body>