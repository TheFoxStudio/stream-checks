<div id="list_box_1" class="content_main">
	
	<div style="float: left; width: 420px; padding: 30px; font-size: 10pt;">
			
			<p>Stream Checks is your simple and quick solution to organize your pre-stream routine. Create your personal To-Do list and never forget something again.</p>
			<p>Stream Checks is free to use and hosted by my humble self for the streaming community.</p>
			<p>If you want to run Stream Checks yourself, feel free to do so. It is an open source project and available <a href="" class="footer">here</a>.</p>
			<br>

		</div>
	
	
	<div style="float: right; width: 420px; padding: 30px; font-size: 10pt;">
	  
		<div style="width: auto; margin: 10px; background-color: #1D1D1D; border-radius: 4px; padding: 10px;">
			<div style="width: 100%; display: inline-block">
				<div id="login_box" style="width: auto; height: 150px; overflow: hidden; transition: .5s">
					<form action="login_done.php" method="POST" id="login_form">
					E-mail:<br>
					<input type="text" name="email" class="input_login"><br>

					Password:<br>
					<input type="password" name="pass_login" class="input_login"><br>

					<input type="submit" style="width: 99%; background-image: linear-gradient(to bottom right, #6441a5, #3D7CA0); color: #fff; padding: 5px ; border-radius: 3px; border: 1px solid #704DB0; font-weight: bold; margin-top: 10px; cursor: pointer" value="Log in">
					</form>
				</div>
				
				<div id="register_box" style="width: auto; height: 0; overflow: hidden; transition: .5s">
					<div style="width: 100%; display: inline-block">
						<form action="register_done.php" method="POST" id="register_form">
						E-mail:<br>
						<input type="text" name="register_email" class="input_login"><br>

						Password:<br>
						<input type="password" name="register_pass" class="input_login"><br>
						<input type="submit" id="register_button" style="width: 99%; background-image: linear-gradient(to bottom right, #6441a5, #3D7CA0); color: #fff; padding: 5px ; border-radius: 3px; border: 1px solid #704DB0; font-weight: bold; margin-top: 10px; cursor: pointer" value="Register Now!">
						</form>	
					</div>
				</div>
				<?php
						if(isset($_GET['return'])) {

							if($_GET['return'] == 'verify') {
								echo '<div style="width:auto; text-align:center;"><p class="register_form">The account has not been activated yet.<br>Please check your mails to activate the login.</p></div>';
							}

							if($_GET['return'] == 'incorrect') {
								echo '<div style="width:auto; text-align:center;"><p class="register_form">E-Mail or Password incorrect.</p></div>';
							}
						}						
						?>
				<input type="submit" id="register_button" style="width: 99%; background-image: linear-gradient(to bottom right, #D3D3D3, #B4B4B4); color: #6441a5; padding: 5px ; border-radius: 3px; border: 1px solid #704DB0; font-weight: bold; margin-top: 30px; cursor: pointer" onClick="register()" value="Register">
			</div>
		 </div>
	  </div> 
		<br style="clear: both">
	
	   
	  <div style="width: 100%;">
	  <img src="img/index_1.png" style="width: 45%; margin: 20px; border-radius: 4px;"><img src="img/index_2.png" style="width: 45%;margin: 20px; border-radius: 4px;">
	  </div>
	</div>