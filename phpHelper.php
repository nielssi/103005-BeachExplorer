<?php
function checkBrowser()
{
    $mobile_browser = '0';
 
    if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
        $mobile_browser++;
    }
 
    if((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml')>0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
        $mobile_browser++;
    }    
 
    $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'],0,4));
    $mobile_agents = array(
    'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
    'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
    'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
    'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
    'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
    'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
    'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
    'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
    'wapr','webc','winw','winw','xda','xda-');
 
    if(in_array($mobile_ua,$mobile_agents)) {
        $mobile_browser++;
    }
 
    if (strpos(strtolower($_SERVER['ALL_HTTP']),'OperaMini')>0) {
        $mobile_browser++;
    }
 
    if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'windows')>0) {
        $mobile_browser=0;
    }
 
    if($mobile_browser>0) {
        // bleibe auf der Seite
    }   
    else {
        //Umleiten auf schutzstation-wattenmeer.de - ACTIIVATE WHEN DEV'd
        //header('Location: http://www.schutzstation-wattenmeer.de');
    }
}

function getAllUpdates()
{
    $abfrage= "SELECT * FROM EINTRAEGE";
    $ergebnis = mysql_query( $abfrage ) or die( mysql_error() );
    $a = 0;
    while( $zeile = mysql_fetch_array( $ergebnis , MYSQL_ASSOC ))
        {
            $arr[$a]['ID'] = $zeile['ID'];
            $arr[$a]['NAME'] = $zeile['NAME'];
            $arr[$a]['LATINNAME'] = $zeile['LATINNAME'];
            $arr[$a]['DESCRIPTION'] = $zeile['DESCRIPTION'];
            $arr[$a]['PHOTOS'] = $zeile['PHOTOS'];
            $arr[$a]['LONGITUDE'] = $zeile['LONGITUDE'];
            $arr[$a]['LATITUDE'] = $zeile['LATITUDE'];
            $arr[$a]['LINKS'] = $zeile['LINKS'];
            $arr[$a]['DATES'] = $zeile['DATES'];
            $arr[$a]['COUNT'] = $zeile['COUNT'];
            $arr[$a]['ATTRIBUTES'] = $zeile['ATTRIBUTES'];
            $a++;
        }
	mysql_free_result( $ergebnis );
    return $arr;
}

function getAnimalInfo( $id )
{
    $abfrage= "SELECT * FROM EINTRAEGE WHERE ID='".$id."'";
    $ergebnis = mysql_query( $abfrage ) or die( mysql_error() );
    $a = 0;
    while( $zeile = mysql_fetch_array( $ergebnis , MYSQL_ASSOC ))
        {
            $arr['ID'] = $zeile['ID'];
            $arr['NAME'] = $zeile['NAME'];
            $arr['LATINNAME'] = $zeile['LATINNAME'];
            $arr['DESCRIPTION'] = $zeile['DESCRIPTION'];
            $arr['PHOTOS'] = $zeile['PHOTOS'];
            $arr[$a]['LONGITUDE'] = $zeile['LONGITUDE'];
            $arr[$a]['LATITUDE'] = $zeile['LATITUDE'];
            $arr['LINKS'] = $zeile['LINKS'];
            $arr['DATES'] = $zeile['DATES'];
            $arr['COUNT'] = $zeile['COUNT'];
            $arr['ATTRIBUTES'] = $zeile['ATTRIBUTES'];
            $a++;
        }
	mysql_free_result( $ergebnis );
    return $arr;
}

//Mit mySql wird nach dem Tier gesucht.
function lookUpAnimalByDescription( $text, $lat, $lon )
{
	if( ($lat!="") && ($lon!="" )){
    $wordArray = explode(",", strtolower( $text ) );
    for($a = 0; $a < count( $wordArray ); $a++)
    {
        $suche = $wordArray[ $a ];
        $abfrage = "SELECT * FROM  `EINTRAEGE` WHERE  `ATTRIBUTES` LIKE  '%". $suche ."%'"; 
        $ergebnis = mysql_query( $abfrage ) or die( mysql_error() );
        while( $zeile = mysql_fetch_array( $ergebnis , MYSQL_ASSOC ))
        {
            $arr[$a]['ID'] = $zeile['ID'];
            $arr[$a]['NAME'] = $zeile['NAME'];
            $arr[$a]['LATINNAME'] = $zeile['LATINNAME'];
            $arr[$a]['DESCRIPTION'] = $zeile['DESCRIPTION'];
            $arr[$a]['PHOTOS'] = $zeile['PHOTOS'];
            $arr[$a]['LONGITUDE'] = $zeile['LONGITUDE'];
            $arr[$a]['LATITUDE'] = $zeile['LATITUDE'];
            $arr[$a]['LINKS'] = $zeile['LINKS'];
            $arr[$a]['DATES'] = $zeile['DATES'];
            $arr[$a]['COUNT'] = $zeile['COUNT'];
            $arr[$a]['ATTRIBUTES'] = $zeile['ATTRIBUTES'];
            $arr[$a]['RELEVANT'] = null;
            $anzahlen[$a] = $zeile['NAME'];
            $rangliste = array_count_values( $anzahlen );
            if($rangliste[0] = $arr[ $a ]['NAME'])
            {
                $arr[ $a ]['RELEVANT'] = $rangliste[0];
                $gefundenerOrganismus = $arr[ $a ];
            }
        }
    }
   	updateAnimal( $gefundenerOrganismus, $lat, $lon );
    return $gefundenerOrganismus;
    }else{
    return false;
    }
}

//Der gefundene Eintrag wird aktualisiert mit Koordinaten und Count + 1.
function updateAnimal( $animal, $lat, $lon ){
    $lon = $animal['LONGITUDE'] . "," . $lon;
    $lat = $animal['LATITUDE'] . "," . $lat;
    $count = $animal['COUNT'] + 1;
    $t = date("Y-m-d H:i:s");
    $dates = $animal['DATES'] . "+". $t;
    $name = $animal['NAME'];
    
    $q1="UPDATE EINTRAEGE SET COUNT = ". $count ." WHERE COUNT = ". $animal['COUNT'] ." AND NAME = '" . $name . "'";
    $ergebnisUpdate1 = mysql_query( $q1 ) or die( mysql_error() );
    $q3="UPDATE EINTRAEGE SET DATES = '". $dates ."' WHERE DATES = '". $animal['DATES'] ."' AND NAME = '" . $name . "'";
    $ergebnisUpdate3 = mysql_query( $q3 ) or die( mysql_error() );
    $q2="UPDATE EINTRAEGE SET LONGITUDE = '". $lon ."' WHERE LONGITUDE = '". $animal['LONGITUDE'] ."' AND NAME = '" . $name . "'";
    $ergebnisUpdate2 = mysql_query( $q2 ) or die( mysql_error() );
    $q4="UPDATE EINTRAEGE SET LATITUDE = '". $lat ."' WHERE LATITUDE = '". $animal['LATITUDE'] ."' AND NAME = '" . $name . "'";
    $ergebnisUpdate4 = mysql_query( $q4 ) or die( mysql_error() );
}

function getTimeDifference($firstTime,$secondTime)
{
    $firstTime = strtotime( $firstTime );
    $secondTime = strtotime( $secondTime );
    $timeDifference = $secondTime - $firstTime;
    if( $timeDifference <= 604800 )
    {
        $result = "vor " . floor($timeDifference / 86400) . " Tagen";
        if( $timeDifference <= 86400 )
        {
            $result = "vor weniger als einem Tag";
            if( $timeDifference <= 43200 )
            {
                $result = "vor weniger als 12 Stunden";
                if( $timeDifference <= 21600 )
                {
                    $result = "vor " . floor($timeDifference / 3600) . " Stunden";
                    if( $timeDifference <= 3600 )
                    {
                        $result = "vor " . floor($timeDifference / 60) . " Minuten";
                        if( $timeDifference <= 300 )
                        {
                            $result = "eben, vor " . floor($timeDifference / 60) . " Minuten";
                            if( $timeDifference <= 60 )
                            {
                                $result = "gerade eben";
                            }
                        }
                    }
                }
            }
        } 
    } else
    {
        $result = "vor mehr als einer Woche";
    }
    return $result;
}

function collectCoordinates()
{
	$organisms = getAllUpdates();
   		for($a = 0; $a < count($organisms); $a++)
    	{
 			$larr = explode(",",$organisms[$a]['LATITUDE']);
 			$lorr = explode(",",$organisms[$a]['LONGITUDE']);
 			array_shift($larr);
 			array_shift($lorr);
 			$coords[$a] = getCoords($larr, $lorr);
    	}
    	
    return $coords;
}

function getCoords($larray, $lorray)
{
    $coord['LATITUDE'] = $larray;
    $coord['LONGITUDE'] = $lorray;
    return $coord; 
}

















   