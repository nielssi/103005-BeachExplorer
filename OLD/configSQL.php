<?php
define ( 'MYSQLHOST', 'localhost' );
define ( 'MYSQLUSER', 'user220224' );
define ( 'MYSQLPASS', 'f0112358132134' );
define ( 'MYSQLDB', 'db220224-lexikon' );
function initMySql()
{
	$link = mysql_connect( MYSQLHOST , MYSQLUSER , MYSQLPASS );
	if ( $link )
	{
    		//echo "Verbunden!";
	} else {
			die("Keine Verbindung m&ouml;glich!");
		}
	mysql_select_db( MYSQLDB )
    		or die("Konnte Datenbank nicht w&auml;hlen!");
}

function loadOrganisms($query)
{
	$result = mysql_query( $query );
	$i = 0;
	while($line = mysql_fetch_array( $result , MYSQL_ASSOC ))
	{
		$organisms[$i]['id'] = $line['id'];
		$organisms[$i]['name'] = $line['name'];
		$organisms[$i]['latinName'] = $line['latin name'];
		$organisms[$i]['description'] = $line['description'];
		$organisms[$i]['link1'] = $line['link1'];
		$organisms[$i]['link2'] = $line['link2'];
		$organisms[$i]['geoLat'] = $line['geo latitude'];
		$organisms[$i]['geoLon'] = $line['geo logitude'];
        $organisms[$i]['date'] = $line['date'];
		$i++;
	}
	mysql_free_result( $result );
	return $organisms;	
}

function resetOrganismTable($table)
{
    mysql_query("CREATE TABLE `".$table."` (
        `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
        `name` VARCHAR( 30 ) NULL ,
        `latin name` VARCHAR( 30 ) NULL ,
        `description` VARCHAR( 200 ) NULL ,
        `link1` VARCHAR( 100 ) NULL ,
        `link2` VARCHAR( 100 ) NULL ,
        `geo latitude` VARCHAR( 20 ) NULL ,
        `geo longitude` VARCHAR( 20 ) NULL ,
        `date` DATETIME NOT NULL
    ) ENGINE = MYISAM ;");
}

function truncateOrganismTable($table, $limit )
{
    mysql_query("DELETE FROM `".$table."` WHERE `id`>'".$limit."'");
}


function newOrganism($name, $latinName, $description, $link1, $link2, $geoLat, $geoLon)
{
	mysql_query("INSERT INTO `organisms`
  ( 
  `id` , `name` , `latin name` , `description` , `link1`, `link2` , `geo latitude` , `geo longitude`, `date` 
  ) 
  VALUES
  (
  NULL , '".$name."', '".$latinName."', '".$description."', '".$link1."', '".$link2."', '".$geoLat."', '".$geoLon."', NOW() + 0
  );
");

}
?>