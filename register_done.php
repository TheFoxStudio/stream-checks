<?php

	include('config.php');
	// check if email address already has a user account
	$checkforacc = $conn->prepare("SELECT ID FROM streamchecksuser WHERE email = ? LIMIT 1");
	$checkforacc->bind_param('s',$email);

	$email = $_POST[register_email];

	$checkforacc->execute();

	$result = $checkforacc->get_result();
	$accexists = $result->fetch_assoc();

	$result->close();
	$checkforacc->close();

	// if exists message and refer to login instead otherwise add new account to database and contine
	if($accexists != '') {
		
		echo '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Checks - Get your stream running the right way!</title>
<link rel="stylesheet" type="text/css" href="css/base_styles.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/additional.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/checkboxes.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body oncontextmenu="return false;">
<div class="content_container">
  <div class="content_header"> <img src="img/logo.png" alt="logo" style="width: 50px; height: 50px; padding-left: 30px;">
    <div style="position: relative; display: inline-block;">
      <div style="top: -50px; position: absolute; width: 280px; font-size: 30pt; display: inline-block; padding: 0px 10px;">Stream Checks</div>
      <div style="top: -35px; position: absolute; width: 50px; margin-left: 280px; font-size: 12pt; display: inline-block; line-height: 1;">by Palerius</div>
    </div>
  </div>
  <div style="text-align: center">
  <br>
  <br>
  <img src="icons/register_issue_done.png" style="width: 100px;">
						<br>
						<br>
						<p class="text_black">
							We could not create your account! It seems like the E-Mail address <b>'. $_POST[register_email] .'</b> is already registered with us.<br>
							Did you maybe already register an account? Try to login instead or reset your password if you can not remember it.
						</p>
						<div style="width: 100%">
						<a href="login.php" class="footer">Back to login</a>
						<div style="clear:both"></div>
						<br>
						</div>
						</div>
	<div class="content_footer">
    <div style="padding: 0px 10px; display: inline-block">GNU GENERAL PUBLIC LICENSE</div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://github.com/TheFoxStudio/stream-checks" target="_blank">Developed by Palerius</a></div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://streamelements.com/palerius/tip" target="_blank">Support the dev</div>
  </div>
</div>
	
	<script src="js/functions.js"></script> 
</body>
</html>';

	}
	else {
		$stmt = $conn->prepare("INSERT INTO streamchecksuser (email, password, verification, session) VALUES ( ?, ?, ?, ?)");
		// change '1' to '$verify' if you want to use a e-mail verification system
		$stmt->bind_param('ssii',$email, $hash, 1, $verify);

		$email = $_POST[register_email];
		$hash = password_hash($_POST[register_pass], PASSWORD_ARGON2I);
		$verify = round(microtime(true) * 1000);

		$stmt->execute();

		$stmt->close();
		$conn->close();
		
		
		$to = $email;
		$subject = 'Welcome to StreamChecks!';
		$from = 'noreply@palerius.com';

		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

		// Create email headers
		$headers .= 'From: '.$from."\r\n".
			'Reply-To: '.$from."\r\n" .
			'X-Mailer: PHP/' . phpversion();

		// Compose a simple HTML email message
		$message = file_get_contents('mail_top.html').$verify . '&email='. $email. file_get_contents('mail_bottom.html');
		
		echo '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Checks - Get your stream running the right way!</title>
<link rel="stylesheet" type="text/css" href="css/base_styles.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/additional.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/checkboxes.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body oncontextmenu="return false;">
<div class="content_container">
  <div class="content_header"> <img src="img/logo.png" alt="logo" style="width: 50px; height: 50px; padding-left: 30px;">
    <div style="position: relative; display: inline-block;">
      <div style="top: -50px; position: absolute; width: 280px; font-size: 30pt; display: inline-block; padding: 0px 10px;">Stream Checks</div>
      <div style="top: -35px; position: absolute; width: 50px; margin-left: 280px; font-size: 12pt; display: inline-block; line-height: 1;">by Palerius</div>
    </div>
  </div>
  <div class="content_header_menu">
	 	  
	<div class="menu_button_icon" onClick=""><img src="img/settings.png" style="height: 20px;"></div>
   
    <br style="clear: both">
  </div>
	<div id="list_box" class="content_main" style="text-align: center;">
	
		
		<img src="icons/registered_icon.png" style="width: 100px;">
		<br>
		<br>
		<p class="text_black">
			All done! Welcome to StreamChecks</b>.
			<br>
			Feel free to sign in and check out your brand new account!
		</p>
		<p class="text_black">
			<a href="index.php" class="footer">Back to login</a>
		</p>
		
	
	</div>
	<div class="content_footer">
    <div style="padding: 0px 10px; display: inline-block">GNU GENERAL PUBLIC LICENSE</div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://github.com/TheFoxStudio/stream-checks" target="_blank">Developed by Palerius</a></div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://streamelements.com/palerius/tip" target="_blank">Support the dev</div>
  </div>
</div>
	
	<script src="js/functions.js"></script> 
</body>
</html>';

		// use the following part if you plan to send a verification mail
		/*/*if(mail($to, $subject, $message, $headers)) {
			
			echo '<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Stream Checks - Get your stream running the right way!</title>
<link rel="stylesheet" type="text/css" href="css/base_styles.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/additional.css" media="screen"/>
<link rel="stylesheet" type="text/css" href="css/checkboxes.css" media="screen"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body oncontextmenu="return false;">
<div class="content_container">
  <div class="content_header"> <img src="img/logo.png" alt="logo" style="width: 50px; height: 50px; padding-left: 30px;">
    <div style="position: relative; display: inline-block;">
      <div style="top: -50px; position: absolute; width: 280px; font-size: 30pt; display: inline-block; padding: 0px 10px;">Stream Checks</div>
      <div style="top: -35px; position: absolute; width: 50px; margin-left: 280px; font-size: 12pt; display: inline-block; line-height: 1;">by Palerius</div>
    </div>
  </div>
  <div class="content_header_menu">
	 	  
	<div class="menu_button_icon" onClick=""><img src="img/settings.png" style="height: 20px;"></div>
   
    <br style="clear: both">
  </div>
	<div id="list_box" class="content_main" style="text-align: center;">
	
		
		<img src="icons/registered_icon.png" style="width: 100px;">
		<br>
		<br>
		<p class="text_black">
			Almost done! We have send a verification mail to <b>' . $_POST[register_email] . '</b>.
			<br>
			Please confirm your account within 7 days to activate it. Unconfirmed accounts will be deleted after this time period.
		</p>
		<p class="text_black">
			<a href="index.php" class="footer">Back to login</a>
		</p>
		
	
	</div>
	<div class="content_footer">
    <div style="padding: 0px 10px; display: inline-block">GNU GENERAL PUBLIC LICENSE</div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://github.com/TheFoxStudio/stream-checks" target="_blank">Developed by Palerius</a></div>
    |
    <div style="padding: 0px 10px; display: inline-block"><a class="footer" href="https://streamelements.com/palerius/tip" target="_blank">Support the dev</div>
  </div>
</div>
	
	<script src="js/functions.js"></script> 
</body>
</html>';
			
		}*/
	}

?>