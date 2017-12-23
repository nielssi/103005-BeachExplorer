<?php

require_once 'classes/Membership.php';
require_once 'classes/Mysql.php';
$membership = New Membership();
$membership->confirm_Member();

// Check, ob Daten eingegeben wurden.
if($_POST && !empty($_POST['name']) && !empty($_POST['latinname']) && !empty($_POST['description']) && !empty($_POST['links']) && !empty($_POST['attributes'])) {
    $mysqlL = New Mysql();
    $Eintrag = $mysqlL->enter_New_Organism($_POST['name'],$_POST['latinname'],$_POST['description'],$_POST['photos'],$_POST['links'],$_POST['attributes']);
    echo $Eintrag;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>BeachExplorer - NEW ORGANISM - Sie sind eingeloggt</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/default.css" />
<!--[if lt IE 7]>
<script type="text/javascript" src="js/DD_belatedPNG_0.0.7a-min.js"></script>
<![endif]-->
</head>
<body>
<div id="panel">
	<form method="post" action="">
    	<h2>Neuer Organismus</h2>
        <p>
        	<label for="name">Deutscher Name: </label>
            <input type="text" name="name" />
        </p>
        <p>
        	<label for="latinname">Lateinischer Name: </label>
            <input type="text" name="latinname" />
        </p>
        <p>
        	<label for="description">Beschreibung: </label>
            <input type="text" name="description" />
        </p>
        <p>
        	<label for="photos">Fotopfade*: </label>
            <input type="text" name="photos" />
        </p>
        <p>
        	<label for="coordinates">Koordinaten*: </label>
            <input type="text" name="coordinates" DISABLED/>
        </p>
        <p>
        	<label for="links">Links*: </label>
            <input type="text" name="links" />
        </p>
        <p>
        	<label for="dates">Fundzeiten*: </label>
            <input type="text" name="dates" DISABLED/>
        </p>
        <p>
        	<label for="count">Anzahl bisheriger Funde: </label>
            <input type="text" name="count" />
        </p>
        <p>
        	<label for="attributes">Attribute*: </label>
            <input type="text" name="attributes" />
        </p>
        <p>
        	<input type="submit" id="submit" value="Eintragen" name="submit" />
        </p>
    <a href="index.php?status=loggedout">Log Out</a>
</div>


</body>
</html>
