<?php
include "configSQL.php";
include "auxFunctionsPHP.php";
initMySql();
getInfoAndAddOrganism();

//newOrganism("Sandklaffmuschel", "lateinischer Name", "Beschreibung der Muschel!", "http://www.wikipedia.de","http://www.wikipedia.de", "54&#176; N", "8&#176; O");
$organismen = loadOrganisms("SELECT * FROM organisms");
//resetOrganismTable( 'organisms' ); 
//truncateOrganismTable( 'organisms', 300 );
?>
<html manifest="cache.manifest">
<head>
	<title>BE0.6.9</title>
	<style type="text/css" media="screen">@import "jqtouch/jqtouch/jqtouch.css";</style>
    <style type="text/css" media="screen">@import "jqtouch/themes/jqt/theme.css";</style>
    <style type="text/css" media="screen">@import "style.css";</style>
    
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
   	<script src="jqtouch/jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
    <script src="auxFunctionsJS.js" type="text/javascript" charset="utf-8"></script>
    
   	<script src="jqt.autotitles.js" type="application/x-javascript" charset="utf-8"></script>
    <script src="jqt.location.js" type="application/x-javascript" charset="utf-8"></script>
    <script src="jqt.offline.js" type="application/x-javascript" charset="utf-8"></script>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAA1hbQ9rqafZ58lbZrNBJwORTtxTWq_maNICN3H54bRC9IbGADUxSZ1uL_JMFh2A5Cj3yIWH1w2gw5oQ"
            type="text/javascript"></script>
    
    <script type="text/javascript" charset="utf-8">
    var jQT = new $.jQTouch({
                icon: 'images/icon.png',
                addGlossToIcon: true,
                startupScreen: 'images/load_bg.png',
                statusBar: 'black',
                preloadImages: [
                    'jqtouch/themes/jqt/img/back_button.png',
                    'jqtouch/themes/jqt/img/back_button_clicked.png',
                    'jqtouch/themes/jqt/img/button_clicked.png',
                    'jqtouch/themes/jqt/img/grayButton.png',
                    'jqtouch/themes/jqt/img/whiteButton.png',
                    'jqtouch/themes/jqt/img/loading.gif'
                    ]});
    $(function()
    {
        //alert("jQT.updateLocation() ausgef&uuml;hrt.");
        function setDisplay(location)
        {
                $('.info').empty().append(location);
        }
        var lookup = jQT.updateLocation(function(coords)
        {
            if (coords) 
            {
                var laenge = coords.latitude;
                var breite = coords.longitude;
                setDisplay(coords.latitude.toFixed(1) + "&#176; n&ouml;rdliche Breite<br> " + coords.longitude.toFixed(1) + "&#176; &ouml;stliche L&auml;nge");
                initializeMap(laenge, breite);
            } else 
                {
                    setDisplay('Ihr Ger&auml;t kann GPS Koordinaten nicht anzeigen');
                }
        });
        if (lookup) 
        {
            setDisplay('Lade GPS Koordinaten');
        }
    });
    function initializeMap(laenge, breite)
    {
        //alert("initializeMap(laenge, breite) ausgef&uuml;hrt.");
        if (GBrowserIsCompatible()) 
        {
                var map = new GMap2(document.getElementById("map_flaeche"));
                var latlong = new GLatLng(laenge+0.0200, breite-0.0275); //
                map.setCenter(latlong, 13, G_SATELLITE_MAP);
                var userPosition = new GLatLng(laenge,breite);
                map.addOverlay(new GMarker(userPosition));
        }
    }
    <?php
        echo createJsArraysFromPhp( $organismen );
    ?>
    bakeCookie( jsOrganismIds.length );
    </script>

</head>
<body onorientationchange="javascript:updateOrientation();">

	<div id="home" class="current">
    	<div class="toolbar">
        	<h1>BE 0.6.9</h1>
    	</div>
            <div class="info">
            	Lade GPS Koordinaten	
            </div>
    	<ul class="rounded">
        	<li class="arrow"><a class="swap" href="#takePhoto">Ich hab' was!</a></li>
        	<li class="arrow"><a class="slide" href="#recentUpdates">Neuzug&auml;nge durchsuchen</a><small class="counter"><p id="number"><?php echo count($organismen);?></p></small></li>
        	<li class="arrow"><a class="cuberight" href="#map">Interaktive Karte</a></li>
        	<li class="forward"><a href="http://www.facebook.com/sharer.php?u=www.beachexplorer.kilu.de&t=Ich%20habe%20den%20BeachExplorer%20auf%20Sylt%20genutzt" target="_blank">Auf facebook weitersagen</a></li>
    	</ul>
    	<ul class="rounded">
        	<li class="arrow"><a href="tel:015156644770" target="_blank">Mit uns sprechen</a></li>
        	<li class="forward"><a href="http://www.schutzstation-wattenmeer.de" target="_blank">Homepage</a></li>
            <li class="forward"><a class="fade" href="#aboutBeachExplorer">&uuml;ber BeachExplorer</a></li>
    	</ul>
    </div>
    
    <div id="takePhoto">
        <div class="toolbar">
            <h1>Fund melden!</h1>
            <a href="#home" class="back">zur&uuml;ck</a>
        </div>
        <div>
            <ul class="rounded">
                <li class="arrow"><a href="index.php?name=Eine%20Sandklaffmuschel&latinName=not%20set%20yet&description=beschreibung&link1=abc&link2=abc&geoLon=34&geoLat=27">Sandklaffmuschel</a></li>
                <li class="arrow"><a href="index.php?name=Eine%20Miesmuschel&latinName=not%20set%20yet&description=beschreibung&link1=abc&link2=abc&geoLon=34&geoLat=27">Miesmuschel</a></li>
                <li class="arrow"><a href="index.php?name=Eine%20Strandkrabbe&latinName=not%20set%20yet&description=beschreibung&link1=abc&link2=abc&geoLon=34&geoLat=27">Strandkrabbe</a></li>
                <li class="arrow"><a href="index.php?name=Ein%20Seepferdchen&latinName=not%20set%20yet&description=beschreibung&link1=abc&link2=abc&geoLon=34&geoLat=27">Seepferdchen</a></li>
            </ul>
        </div>
    </div>
    
    <div id="recentUpdates">
        <div class="toolbar">
            <h1>Die neuesten 5 Organismen!</h1>
            <a href="#home" class="back">zur&uuml;ck</a>
        </div>
        <div>
            <ul class="rounded">
                <?php 
                    $a = count($organismen)-1;
                    $b = $a - 5;
                    $c = 1;
                    $t = date("Y-m-d H:i:s");
                    while($a > $b)
                    {
                        if($a >= 0)
                        {
                            echo "<li class='arrow'><a class='cuberight' href='#animalInfo".$c."'>".$organismen[$a]['name']." <i>".getTimeDifference( $organismen[$a]['date'] , $t )."</i></a></li>";
                            $c++;
                        }
                        $a--;
                    }
                ?>
            </ul>
            <ul class="rounded">
                <li class="forward"><a class="cuberight" href="#allUpdates">alle Eintr&auml;ge zeigen</a></li>
            </ul>
        </div>
    </div>
    
    <div id="allUpdates">
        <div class="toolbar">
            <h1>Alle Funde</h1>
            <a href="#home" class="back">zur&uuml;ck</a>
        </div>
        <div>
            <ul class="rounded">
                <?php 
                    $c = 1;
                    $t = date("Y-m-d H:i:s");
                    for($a = 0; $a < count( $organismen ) ;$a++)
                    {
                        echo "<li class='arrow'><a class='cuberight' href='#animalInfo".$c."'>".$organismen[$a]['name']." <i>".getTimeDifference( $organismen[$a]['date'] , $t )."</i></a></li>";
                        $c++;
                    }
                ?>
            </ul>
            <ul class="rounded">
                <li class="forward"><a href="http://www.schutzstation-wattenmeer.de">...mehr Informationen anzeigen</a></li>
            </ul>
        </div>
    </div>
    
    <?php
        for($a = 1; $a <6; $a++ )
        {
            echo "<div id='animalInfo", $a ,"'>\n";
                echo "<div class='toolbar'>\n";
                echo "<h1>[Animal Name Here]</h1>\n";
                echo "<a href='#recentUpdates' class='back'>zur&uuml;ck</a>\n";
                echo "</div>\n";
                
                echo "<ul>\n";
                    echo "<li>\n";
                        echo "<p>Infos zum Organimsus #", $a ,"!<br>\n";
                            echo "Name: ", $organismen[ count( $organismen ) - $a  ]['name'] ,"<br>\n"; 
                            echo "Lateinischer Name: ", $organismen[ count( $organismen ) - $a  ]['latinName'] ,"<br>\n"; 
                            echo "Beschreibung: ", $organismen[ count( $organismen ) - $a  ]['description'] ,"<br>\n"; 
                            $t = date("Y-m-d H:i:s");
                            echo "Datum: ", $organismen[ count( $organismen ) - $a  ]['date'] ,", also ", getTimeDifference($organismen[ count( $organismen ) - $a  ]['date'], $t) ,"<br>\n"; 
                        echo "</p>\n";
                    echo "</li>\n";
                    echo "<li>\n";
                        //echo "<a onclick='javascript:alert(",,");'>test</a>";
                        echo "<a class='flip' href='#map' onclick='drawLocations();'>Alle Funde auf der Karte zeigen!</a>\n";
                    echo "</li>\n";
                echo "</ul>\n";
            echo "</div>\n";
        }
    ?>
    
    <div id="map">
    	<div class="toolbar">
    		<h1>Karte</h1>
    		<a href="#home" class="back">zur&uuml;ck</a>	
    	</div>
    	<div id="map_flaeche" style="height: 480px;width: 320px;">
    		
    	
    	</div>	
    </div>
    
    <div id="donateMoney">
    	<div class="toolbar">
    		<h1>Jetzt Spenden</h1>
    		<a href="#home" class="back">zur&uuml;ck</a>	
    	</div>
    	<div>
            <ul class="rounded">
                <li><p>
                    Platzhalter noch nicht bearbeitet.
                </p></li>
            </ul>
    	</div>	
    </div>

    
    <div id="aboutBeachExplorer">
    	<div class="toolbar">
    		<h1>BeachExplorer 1.0</h1>
    		<a href="#home" class="back">zur&uuml;ck</a>	
    	</div>
    	<div>
            <ul class="rounded">
                <li><p>
                    BeachExplorer 0.6.9<br>
                    Niels Sievertsen<br>
                    sievertsenniels@googlemail.com<br>
                    01714808069
                </p></li>
            </ul>
    	</div>	
    </div>
    
    
</body>
</html>