<?php
    require "mySqlBase.php";
    require "phpHelper.php";
    initMySql();
    if( $_GET['id'] ){
   		$org = getAnimalInfo( $_GET['id'] );
    }
    else{
    	$org = lookUpAnimalByDescription( $_POST['desc'], $_POST['lat'], $_POST['lon'] );
    }
?>
<div>

    <meta name="description" content="Mein aktueller Fund: <?php echo $org['NAME'];?>">
    <link rel="EXHAUST/icon_actual.png">
    <div class="toolbar">
        <h1><?php echo $org['NAME'];?></h1>
        <a href="#" class="button back">zur&uuml;ck</a>
    </div>
    <ul class="rounded">
        <li><?php echo $org['NAME'];?> - <i><?php echo $org['LATINNAME'];?></i></li>
    </ul>
    <ul class="individual">
        <li><a class="dissolve" href="#map">Karte</a></li>
        <li><a class="swap"href="fotos.php?name=<?php echo $org['NAME'];?>">Fotos</a></li>
    </ul>
    <ul class="rounded">
    <?php
    	if ($_GET['id']){
    		$t = date("Y-m-d H:i:s");
    		$mostRecent = end(explode("+", $org['DATE']));
    		echo '<li>Der Meeresbewohner wurde das letzte mal '.getTimeDifference( $mostRecent , $t ).'</i> gefunden!</li>';
    	}
    	else{
        	echo '<li>Dieser Meeresbewohner wurde bereits '. $org['COUNT'].' mal gefunden!</li>';
        }
    ?> 
        <li><?php echo $org['DESCRIPTION'];?></li>
        <li class="forward"><a href="<?php echo $org['LINKS'];?>" target="_blank">mehr &uuml;ber <?php echo $org['NAME'];?>...</a></li>
    </ul>
</div>