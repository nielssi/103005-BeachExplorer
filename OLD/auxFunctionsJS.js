//javascript aux functions

//COOKIES FOR LANGUAGE
//
function bakeCookie( anzahl )
{ 
    if( document.cookie )
    {
        var a = document.cookie;
        alert("Organimsen vorher: "+ a.substr(a.search("= ")+1, a.search(" ;")));
        alert("Organismen jetzt: "+anzahl);
    }
    else
    {
        var expiration = new Date();	 
        //Cookie 14 Tage g&uuml;ltig
        //expiration.setTime(expiration.getTime() + (1000 * 60 * 60 * 24 * 14));
        //5 Minuten-Cookie
        expiration.setTime(expiration.getTime() + (1000 * 60 * 1));
        document.cookie = "name = "+anzahl+"; path = /; expires = "+expiration.toGMTString();
        alert(document.cookie);
    }
}

function drawLocations( tierName )
{
    alert("drawLocations( tierName ) ausgef&uuml;hrt.");
    for(var a=0;a<jsOrganismCoordLats.length)
    {
        if(jsOrganismNames[a] == tierName)
        {
            var pin = new GLatLng(jsOrganismCoordLats[a], jsOrganismCoordLons[a]);
            map.addOverlay(new GMarker(pin));
        }
    }

}

//function drawLocations()
//{
//	var lats = new Array();
//        var lons = new Array();
//        <?php
//            $i = count( $organismen );
//            $b = 0;
//            while($b <= $i)
//            {
//                $laenge = $organismen[$b]['geoLat'];
//                $breite = $organismen[$b]['geoLon'];
//                echo"lats[$b] = '$laenge';";
//                echo"lons[$b] = '$breite';";
//                $b++;
//            }
//        ?>
//        for(var p = 0; p < itemCount; p++)
//        {
//           alert(lats[p]);
//        }
//}

//UPDATE ORIENTATION FOR USER EXPERIENCE
//
function updateOrientation()
{
	//alert("updateOrientation() ausgef&uuml;hrt.");
	switch(orientation) 
	{
        	case 0:
                	alert("iPhone Orientierung: Portrait-Modus");
                	break; 
       
            case 90:
                	alert("iPhone Orientierung: Landscape(90) - Kamera-Modus");
                    //$('#takePhoto').click();
                	break;
   
            case -90:
                	alert("iPhone Orientierung: Landscape(-90)");
                	break;
    }
}
