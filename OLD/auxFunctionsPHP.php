<?php
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

function getInfoAndAddOrganism()
{
	$name = $_GET["name"];
	if (isset($name)) { 
		$latinName = $_GET["latinName"];
		if (isset($latinName)) { 
			$description = $_GET["description"];
			if (isset($description)) { 
				$link1 = $_GET["link1"];
				if (isset($link1)) { 
					$link2 = $_GET["link2"];
					if (isset($link2)) { 
						$geoLat = $_GET["geoLat"];
						if (isset($geoLat)) { 
							$geoLon = $_GET["geoLon"];
							if (isset($geoLon)) { 
								newOrganism($name, $latinName, $description, $link1, $link2, $geoLat, $geoLon);
							}
						}
					}
				}
			}
		}
	} else { 
		//echo "mindestens ein Wert fehlt."; 
	} 
}

function createJsArraysFromPhp( $array )
{
    echo "var jsOrganismIds = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo $array[ $a ]['id'] ,", ";
    }
    echo $array[ $a++ ]['id'];
    echo ");";
    
    echo "var jsOrganismNames = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['name'] ,"', ";
    }
    echo "'", $array[ $a++ ]['name'];
    echo "');";
    
    echo "var jsOrganismLatinNames = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['latinName'] ,"', ";
    }
    echo "'", $array[ $a++ ]['latinName'];
    echo "');";
    
    echo "var jsOrganismDescriptions = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['description'] ,"', ";
    }
    echo "'", $array[ $a++ ]['description'];
    echo "');";
    
    echo "var jsOrganismFirstLinks = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['link1'] ,"', ";
    }
    echo "'", $array[ $a++ ]['link1'];
    echo "');";
    echo "var jsOrganismSecondLinks = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['link2'] ,"', ";
    }
    echo "'", $array[ $a++ ]['link2'];
    echo "');";
    
    echo "var jsOrganismCoordLats = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['geoLat'] ,"', ";
    }
    echo "'", $array[ $a++ ]['geoLat'];
    echo "');";
    
    echo "var jsOrganismCoordLons = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['geoLon'] ,"', ";
    }
    echo "'", $array[ $a++ ]['geoLon'];
    echo "');";
    
    echo "var jsOrganismDates = new Array(";
    for($a = 0; $a<count( $array ) -1; $a++)
    {
        echo "'", $array[ $a ]['date'] ,"', ";
    }
    echo "'", $array[ $a++ ]['date'];
    echo "');\n";
}
?>