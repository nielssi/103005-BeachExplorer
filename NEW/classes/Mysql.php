<?php

require_once 'includes/konstanten.php';

class Mysql {
	private $conn;
	
	function __construct() {
		$this->conn = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME) or 
					  die('There was a problem connecting to the database.');
	}
	
	function verify_Username_and_Pass($un, $pwd) {
				
		$query = "SELECT *
				FROM USERS
				WHERE USERNAME = ? AND PASSWORD = ?
				LIMIT 1";
				
		if($stmt = $this->conn->prepare($query)) {
			$stmt->bind_param('ss', $un, $pwd);
			$stmt->execute();
			
			if($stmt->fetch()) {
				$stmt->close();
				return true;
			}
		}
	}
    function enter_New_Organism($name, $latinname, $description, $photos, $links, $attributes) {
            $query = "INSERT INTO `EINTRAEGE`
            ( 
            `ID` , `NAME` , `LATINNAME` , `DESCRIPTION` , `PHOTOS`, `COORDINATES` , `LINKS` , `DATES`, `COUNT`, `ATTRIBUTES` 
            ) 
            VALUES
            (
            NULL , '".$name."' , '".$latinname."' , '".$description."' , '".$photos."' , NULL , '".$links."' , NULL , NULL , '".$attributes."'
            );";
            mysql_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);
            mysql_query( $query );
    } 
}