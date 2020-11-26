<!doctype html>
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
  <div id="list_box" class="content_main">

			<div style="padding-top: 180px; height: 60vh;">
				<div style="width: 100%; margin:auto; margin-bottom: 20px;">
					<div style="width: 60%; padding: 20px; margin:auto; text-align: center;">
						<?php	
							include('config.php');
							// secure against SQL injections!!!! not safe yet!!!!
	
							$verifyacc = $conn->query("SELECT verification FROM streamchecksuser WHERE email = '" . $_GET[email] . "'");
							$verifycode = $verifyacc->fetch_assoc();

							if($verifycode[verification] == 1 ) {
								echo '<img src="icons/firework_icon.png" style="width: 100px;"><br><br>';
								echo '<p class="text_black">The E-Mail address has already been verified. There is nothing to see here.<br>
								Go set up your checklist!</p>';
							}
							else {
								if($verifycode[verification] == $_GET[verify]) {
									$storeverify = "UPDATE streamchecksuser SET verification = 1 WHERE email = '" . $_GET[email] . "'";
									if($conn->query($storeverify)) {
										echo '<img src="icons/verified_icon.png" style="width: 100px;"><br><br>';
										echo '<p class="text_black">
										Your E-Mail address has been verified. You can now use all features of your account.</p>';
									}
									$conn->close();
								}
								else {
									echo '<img src="icons/delete_dark.png" style="width: 100px;"><br><br>';
									echo '<p class="text_black">
									There has been a problem with the verification. Please contact the support at contact@palerius.com</p>';
								}
							}
						?>
						<p><a href="https://www.palerius.com/streamchecks/" class="footer">Back to login</a></p>
					</div>	
				</div>
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
</html>