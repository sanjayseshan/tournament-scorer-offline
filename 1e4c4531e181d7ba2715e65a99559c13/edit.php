<h1>Edit/View Scores Page</h1>
Instructions: This is for EDITING/VIEWING SCORES ONLY and should not be used by anyone other than the Head Referee or Tournament Director. This will get filled in automatically when scores are submitted in the Scorer by a Referee.  However, if there is a need to make a modification, please follow the format indicated below. Remember to hit "Save". <b>ONLY USE THIS PAGE WHEN NO REFEREES ARE ENTERING SCORES!<b>
<?php

// configuration
$url1 = 'edit.php';
$file1 = 'scores.txt';

// check if form has been submitted
if (isset($_POST['text1']))
{
$file1 = str_replace("\r", "", $file1);
    // save the text contents
    file_put_contents($file1, $_POST['text1']);

    // redirect to form again
    header(sprintf('Location: %s', $url1));
    printf('<a href="%s">Return</a>.', htmlspecialchars($url));
    exit();
}

// read the textfile
$text1 = file_get_contents($file1);

?>
<!-- HTML form --><br>Score Override:<br>Format: Team #, Round, Points (eg. 51, 2, 200) 
<form action="" method="post">
<textarea rows="20" cols="50" id="text1" name="text1"><?php echo htmlspecialchars($text1) ?></textarea>
<br>
<!--<input type="button" onclick="document.getElementById('text1').value = ''" value="Clear Scores"/>-->
<input value="Save" type="submit" />
<input value="Cancel" type="reset" />


<br>RETURN TO MAIN PAGE</b><br>
 Now that you have fixed the scores you are ready to go <br><input type="button" onclick="window.location.href = '/url.html#' + window.location.href.split('/')[3]" value="Back to main page">.

</form>
