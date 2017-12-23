<?php
//define ( 'MYSQLHOST', 'db2487.1und1.de' );
//define ( 'MYSQLUSER', 'dbo329822443' );
//define ( 'MYSQLPASS', 'x2x7ad12223' );
//define ( 'MYSQLDB', 'db329822443' );

define ( 'MYSQLHOST', 'www9.subdomain.com' );
define ( 'MYSQLUSER', 'user220224' );
define ( 'MYSQLPASS', 'XXXXXX' );
define ( 'MYSQLDB', 'db220224-lexikon' );



function initMySql()
{
	$link = mysql_connect( MYSQLHOST , MYSQLUSER , MYSQLPASS );
	if ( $link )
	{
	} else {
			die("Keine Verbindung m&ouml;glich!");
		}
	mysql_select_db( MYSQLDB )
    		or die("Konnte Datenbank nicht w&auml;hlen!");
    		echo('pee');
}

?>
