<?php

include('config.php');
// prepare login attempt against sql injections
$stmt = $conn->prepare("SELECT email, password, verification, session FROM streamchecksuser WHERE email = ? LIMIT 1");
$email = $_POST[email];
$stmt->bind_param('s', $email);

$stmt->execute();

$loginresult = $stmt->get_result();
$loginrow = $loginresult->fetch_assoc();

$loginresult->close();
$stmt->close();
$conn->close();

// check if password is correct
if(password_verify($_POST[pass_login], $loginrow[password])) {

	// if password is correct, check if account has been activated
	if($loginrow[verification] == 1) {

		//if account activated start a session by setting a cookie with the needed information
		session_start();	
		setcookie('userid', $loginrow[session], time() + (86400 * 30), "/"); // 86400 = 1 day
		header('Location: index.php');
		
	}
	else {
		header('Location: index.php?return=verify');
	}
}
else 
{	
	header('Location: index.php?return=incorrect');
}
?>