<?php
    require "counter.php";
    updateVisits();
    require "mySqlBase.php";
    require "phpHelper.php";
    initMySql();
    checkBrowser();
    $coords = collectCoordinates();
    $updates = getAllUpdates();
    echo "Sprache ist: ".$_GET['sprache'];
?>
<html>
<head>
	<title>BE</title>
    <meta name="description" content="Entdecken Sie mit Ihrem iPhone die gesamte Wattenmeer&ouml;kologie der Insel Sylt- und das in nur wenigen Sekunden!">
    <link rel="EXHAUST/icon_actual.png">
    <meta name="keywords" content="Beach, explorer, niels, sievertsen, strand, wattenmeer, watt, meer, arten, iphone, smartphone, handy, entdecken, jqtouch, css, php, html, ajax">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css" media="screen">@import "ENGINE/jqtouch/jqtouch/jqtouch.css";</style>
    <style type="text/css" media="screen">@import "ENGINE/jqtouch/themes/jqt/theme.css";</style>
    
    <script src="http://code.jquery.com/jquery-latest.js" type="text/javascript" charset="utf-8"></script>
   	<script src="ENGINE/jqtouch/jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
    
    <script src="jqt.location.js" type="application/x-javascript" charset="utf-8"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    
    <script type="text/javascript" charset="utf-8">
    var jQT = new $.jQTouch({
                icon: 'EXHAUST/icon_actual.png',
                addGlossToIcon: true,
                startupScreen: 'EXHAUST/load_bg_actual.png',
                statusBar: 'black',
                preloadImages: [
                    'ENGINE/jqtouch/themes/jqt/img/back_button.png',
                    'ENGINE/jqtouch/themes/jqt/img/back_button_clicked.png',
                    'ENGINE/jqtouch/themes/jqt/img/button_clicked.png',
                    'ENGINE/jqtouch/themes/jqt/img/grayButton.png',
                    'ENGINE/jqtouch/themes/jqt/img/whiteButton.png',
                    'ENGINE/jqtouch/themes/jqt/img/loading.gif'
                    ]});
    $(function()
    {
 		alert(unescape('Entwicklungs-Meilenstein: Es werden in dieser Woche wieder neue Organismen eingetragen. Zudem werden die aktuellen Fotos durch weitere erg%E4nzt!'));   
    
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
                setDisplay(coords.latitude.toFixed(2) + "&#176; n&ouml;rdliche Breite<br> " + coords.longitude.toFixed(2) + "&#176; &ouml;stliche L&auml;nge");
				document.suche.lat.value = breite;
				document.suche.lon.value = laenge;
                //initializeMap(laenge, breite);
                initializeGMap3(laenge, breite);
            } else 
                {
                    setDisplay('Ger&auml;t nicht GPS-f&auml;hig');
                }
        });
        if (lookup) 
        {
            setDisplay('Lade GPS Koordinaten');
        }
        
        $('a[target="_blank"]').click(function() {
            if (confirm('Dieser Link leitet zu einem neuen Browser-Fenster.')) {
                return true;
            } else {
                $(this).removeClass('active');
                return false;
            }
        });
        
    });
    
    function initializeGMap3(laenge, breite){
        var latlng = new google.maps.LatLng(laenge, breite);
        var latlngC = new google.maps.LatLng(laenge+0.02, breite-0.0275);
        var myOptions = {
            zoom: 13,
            center: latlngC,
            disableDefaultUI: true,
            mapTypeId: google.maps.MapTypeId.TERRAIN,
            disableDoubleClickZoom: false,
            streetViewControl: true
            };
        var map = new google.maps.Map(document.getElementById("map_flaeche"), myOptions);
            var marker = new google.maps.Marker({
                position: latlng,
                title:"Ihre Position"
            });
            marker.setMap(map); 
            var infowindow = new google.maps.InfoWindow({
                content: '<h1>Ihre Position</h1>'
            });

            google.maps.event.addListener(marker, 'click', function() {
                infowindow.open(map,marker);
            });
            var image = 'http://maps.google.com/mapfiles/kml/shapes/donut.png';
	<?php 
		$count = count( $coords );
		$x = 0;
		for($i = 0; $i<count( $coords ); $i++)
		{
			for($j = 0; $j < count( $coords[$i]['LONGITUDE']); $j++ )
			{
				echo "var pos".$x." = new google.maps.LatLng(".$coords[$i]['LONGITUDE'][$j].", ".$coords[$i]['LATITUDE'][$j].");\n";
				echo "var marker".$x." = new google.maps.Marker({position: pos".$x.", title: 'pos', icon: image});\n";
				echo "marker".$x.".setMap(map);\n";
				echo "var infowindow".$x." = new google.maps.InfoWindow({content: '<b>".$updates[$i]['NAME']."</b>, id 00".($j+1)."<hr>Erfahre <a class=\"dissolve\" href=\"suche.php?id=".$updates[$i]['ID']."\">mehr</a>!</b>'});\n";
				echo "google.maps.event.addListener(marker".$x.", 'click', function(){infowindow".$x.".open(map, marker".$x.")});\n";
				$x++;
			}
		}
	?>   
    }
    
    isOpenedFromHomeScreen();
    function isOpenedFromHomeScreen()
    {
        if (window.navigator.standalone != true){
            alert("Bitte speichern Sie die Seite zum Home-Screen. So ist BeachExplorer besser zu bedienen und schneller zu erreichen!");
        }
    }
    
   	var num = 0;
    function newCenter()
    {
    	alert(num);
    	num++;
        map.setCenter(new google.maps.LatLng(0, 0));
    }
</script>

</head>
<body onorientationchange="javascript:updateOrientation();">

	<div id="home" class="current">
    	<div class="toolbar">
        	<h1>BE 1.0.3</h1>
            <a class="button swap" id="infoButton" href="#about">About</a>
    	</div>
            <div class="info">
            	Lade GPS Koordinaten	
            </div>
        <h2>BeachExplorer</h2>
        <ul class="rounded">
        	<li class="arrow"><a class="swap" href="#wasistbe">Was ist BeachExplorer?</a></li>
        </ul>
    	<ul class="rounded">
            <li class="arrow"><a class="pop" href="#suche">Ich hab' was!</a></li>
        	<li class="arrow"><a class="flip" href="updates.php">St&ouml;bern</a><small class="counter"><?php echo count( $updates );?></small></li>
        	<li class="arrow"><a class="swap" href="#map">Interaktive Karte</a></li>
            <li class="arrow"><a class="slide" href="#question">Mit uns sprechen</a></li>
            <li class="arrow"><a class="slide" href="#donateMoney">Spenden Sie</a></li> 
    	</ul>
        <h2>Externe Links</h2>
    	<ul class="rounded">
        	<li class="forward"><a href="http://www.schutzstation-wattenmeer.de" target="_blank">Schutzstation Wattenmeer</a></li>
        </ul>
        <ul class="individual">
           	<li><center><iframe src="http://www.facebook.com/plugins/like.php?locale=de_DE&amp;href=beachexplorer.kilu.de&amp;layout=button_count&amp;show_faces=false&amp;width=120&amp;action=recommend&amp;colorscheme=dark&amp;height=24" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:120px; height:24px;" allowTransparency="true"></iframe></center></li>
           	<li style="height: 51px;"><a href="http://www.limitedknowledge.wordpress.com" target="_blank">Blog</a></li>
    	</ul>
    </div>
    
    <div id="about" class="selectable">
            <center>
                <br />
                <br />
                <div id="engines"><img src="EXHAUST/symbols/webkit_small.png"> <img src="EXHAUST/symbols/coda.png"> <img src="EXHAUST/symbols/google_32.png"></div>
                <p><strong>BeachExplorer</strong><br />Version 1.0.3<br /></p>
                <p><em>Entdecken Sie Nordseebewohner<br /> mit Ihrem Smartphone und dem Internet!</em></p>
                <br />
                <p>Copyright &copy; <a href="http://limitedknowledge.wordpress.com/" target="_blank">Niels Sievertsen 2010</a></p>
                <br />
                <p><br /><br /><a href="#" class="grayButton goback" style="width: 75%; margin:0 10px;color:rgba(255,255,255,.8)">Zur&uuml;ck</a></p>
            </center>
    </div>
    
    <form id="suche" name="suche" action="suche.php" method="POST" class="form">
            <div class="toolbar">
                <h1>Fund melden!</h1>
                <a class="back" href="#">zur&uuml;ck</a>
            </div>
            <ul class="rounded">
                <li><input type="text" name="desc" placeholder="mit Komma trennen" style="width: 100%;height: 26px;position: relative;top: -4px;font-size: 24px;padding: 0 .3em;color: #fff;}"/></li>
            </ul>
            <a style="margin:0 10px;color:rgba(0,0,0,.9)" href="#" class="submit whiteButton">Dieses Tier finden!</a>
			<input type="hidden" name="lat" value="">	
			<input type="hidden" name="lon" value="">
    </form>
        
    <div id="map">
    	<div class="toolbar">
    		<h1>Karte</h1>
    		<a href="#home" class="back">zur&uuml;ck</a>
    		<a class="button" id="infoButton" href="#" onClick="javascript:newCenter()">n&auml;chstes Tier</a>
    	</div>
    	<div id="map_flaeche" style="width:320px; height:480px"></div>
    </div>
    
    <div id="donateMoney">
    	<div class="toolbar">
    		<h1>Jetzt Spenden</h1>
    		<a href="#home" class="back">zur&uuml;ck</a>	
    	</div>
    	<div>
            <ul class="rounded">
                <li><p>
                    Auch Sie k&ouml;nnen uns helfen, das Projekt weiterzuf&uuml;hren
                </p></li>
            </ul>
            <ul class="rounded">
                <li>
                    <a href="#question" class="pop">Mit uns in Kontakt treten</a>
                </li>
            </ul>
    	</div>	
    </div>
    
    
            <form id="question" method="POST" action="question.php" class="form">
             <div class="toolbar">
                <h1>Frage stellen!</h1>
                <a class="back" href="#">zur&uuml;ck</a>
                </div>
                <center>
                <ul class="edit rounded">
                    <p>Ihre Email-Adresse:</p>
                    <li><input type="text" autocorrect="off" autocapitalize="off" name="email" placeholder="Ihre E-Mail Adresse" style="font-size: 24px; color: #fff;"/></li>
                    <p>Thema:</p>
                    <li>
                        <select id="lol" style="font-size: 24px; color: #fff;">
                            <optgroup label="Programm">
                                <option value ="ideen">Ideen</option>
                                <option value ="bugs">Bugs</option>
                            </optgroup>
                            <optgroup label="Thematik">
                                <option value ="oko">&Ouml;kologie</option>
                            </optgroup>
                            <optgroup label="Spenden">
                                <option value ="spe">Spenden</option>
                            </optgroup>
                            <optgroup label="Allgemein">
                                <option value ="sonst">Sonstiges</option>
                            </optgroup>
                        </select>
                    </li>
                    <p>Ihre Nachricht:</p>
                    <li><textarea onfocus="" placeholder="Stellen Sie hier Ihre Fragen" name="msg" style="font-size: 24px; color: #fff;"></textarea></li>
                </ul>
                <a style="width: 75%; margin:0 10px;color:rgba(0, 0, 0,.9)" href="" class="submit whiteButton">Frage stellen!</a>
            </center>
            </form>	
            
   <div id="wasistbe">         
		<div class="toolbar">
        <h1>Was ist das?</h1>
        <a href="#" class="button back">zur&uuml;ck</a>
    </div>
    <ul class="rounded">
        <li>'Was ist das'? Das fragt man sich oft am Nordseestrand, wenn man mal wieder vor einer Muschel steht, die man nicht kennt. 'Was ist das'? Manchmal kann man zwar den Namen der gemeinen Strandkrabbe nennen, die sich mit ihren Scheren Ihren fragenden Blicken zu wehr setzt. Sie wissen aber leider nicht mehr als das über diesen und viele andere Meeresbewohner.</li>
    </ul>
    <ul class="rounded">
    	<li>BeachExplorer ist eine Anwendung f&uuml;r das iPhone, die es dem Benutzer erm&ouml;glicht in k&uuml;rzester Zeit einen Nordseebewohner zu identifizieren. Dazu beschreiben Sie einfach den Fund mit Begriffen. Miesmuscheln w&uuml;rden Sie einfach mit 'oval', 'blau', 'f&auml;den' und 'muschel' beschreiben. Je spezifischer,desto besser. BeachExplorer ermittelt anhand der Begriffe das Tier aus der Datenbank und versorgt Sie mit Informationen. Der BeachExplorer lernt von Ihren Abfragen, einige Attribute, die vermehrt in Verbindung mit einem Organismus gebracht werden, aber noch nicht in der Datenbank vermerkt sind, werden nachgetragen und bei sp&auml;teren Abfragen ber&uuml;cksichtigt. Neben einer Kurzbeschreibung liefert der BeachExplorer Bilder der gefundenen Art und eine Karte mit eingezeichneten, fr&uuml;heren Fundstellen. Zudem k&ouml;nnen Sie herausfinden, ob das von Ihnen gefundene Tier zu einer heimischen oder durch den Menschen eingeschleppte Art z&auml;hlt.</li>
    	</ul>
    	<ul class="rounded">
    		<li>Nicht nur f&uuml;r Sie und Ihre Familie ist es interessant, das &Ouml;kosystem Wattenmeer zu erleben und mehr dar&uuml;ber zu erfahren, auch die Schutzstation Wattenmeer kann von den Daten profitieren. Automatisch wird mit der GPS-Funktion des iPhones die Position des Fundes &uuml;bermittelt und der Fund registriert. Mit einer ausreichend großen Community ist es dann vielleicht schon bald m&ouml;glich bedeutende &Auml;nderungen von Populationsgr&ouml;ßen durch den BeachExplorer fr&uuml;hzeitig zu erkennen und das einzigartige &Ouml;kosystem Wattenmeer zu erhalten! Probieren Sie also diese WebApp bei Ihrem n&auml;chsten Strandspaziergang aus, wenn Sie sich wieder fragen: 'Was ist das?'</li>
    	</ul>
    	<ul class="rounded">
       		<li class="forward"><a href="http://limitedknowledge.wordpress.com/2010/07/11/beachexplorer-web-app-to-combine-science-and-fun/" target="_blank">mehr &uuml;ber BeachExplorer</a></li>
    	</ul>
    </div>

</body>
</html>