<?php
session_start();
require_once 'classes/Membership.php';
$membership = new Membership();

// Hat Benutzer 'Logout' geklickt?
if(isset($_GET['status']) && $_GET['status'] == 'loggedout') {
	$membership->log_User_Out();
}

// username und pw eingegeben?
if($_POST && !empty($_POST['username']) && !empty($_POST['pwd'])) {
	$response = $membership->validate_User($_POST['username'], $_POST['pwd']);
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BeachExplorer - NEW ORGANISM</title>
<link rel="stylesheet" type="text/css" href="css/default.css" />
<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
<div id="login">
	<form method="post" action="">
    	<h2>Login <small>Nutzernamen und Kennwort eingeben</small></h2>
        <p>
        	<label for="name">Nutzername: </label>
            <input type="text" name="username" />
        </p>
        
        <p>
        	<label for="pwd">Passwort: &nbsp; &nbsp; </label>
            <input type="password" name="pwd" />
        </p>
        
        <p>
        	<input type="submit" id="submit" value="Login" name="submit" />
        </p>
    </form>
    <?php if(isset($response)) echo "<h4 class='alert'>" . $response . "</h4>"; ?>
</div>
</body>
</html>