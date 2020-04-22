<!DOCTYPE html>
<html>
<head profile="images/fav.png"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="icon" type="image/png" href="images/fav.png">
    
    <title>Brooklyn Grant Portfolio</title>
    <link href="style.css" type="text/css" rel="stylesheet">
    <script src="javascript.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Assistant|Barlow+Condensed|Bubbler+One|Cairo|Catamaran|Kodchasan|News+Cycle|Rajdhani|Red+Hat+Text|Ropa+Sans|Share+Tech|Text+Me+One|Titillium+Web&display=swap" rel="stylesheet">
	<?php
		$to = "brooklyn.grant@mtchs.org";
		$subject = "Portfolio Contact Form";
		$from = $_REQUEST['email'];	
		$message = "Name: ".$_REQUEST['fullname']. "\n\nMessage: ".$_REQUEST['message'];
	
		$spamcheck = $_REQUEST['address'];
		
		if ($spamcheck)
			die("Do not send this email");
		else 
			mail($to, $subject, $message, $from);
	?>
	
</head>

<body id="formendbody">
    
    <div id="formend">
        
        <h5>Thanks for submiting the form! </h5>
        <p>Here is what you said:
        
        <?php 
        
        echo "<br/><p id='strong'><h6>Full Name:</h6> " . $_REQUEST['fullname'] . "<br/><h6>Email:</h6> " . $from . "<br/><h6>Message:</h6> " . $_REQUEST['message'] . "</p>";
        
        ?>
        
        </p>
        
        <a class="underline" href="http://brooklyng.smtchs.org/">Click here to go back to my portfolio</a>
        
    </div>
    
</body>
</html>

