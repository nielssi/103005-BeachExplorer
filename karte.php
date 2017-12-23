<?php
    require "mySqlBase.php";
    require "phpHelper.php";
    initMySql();
    $org = getAnimalInfo( $_GET['id'] );
?>
<div>
<script type="text/javascript">
    alert('asdasd');
</script>
    <div class="toolbar">
        <h1>Alle <?php echo $org['NAME'];?> zeigen!</h1>
        <a class="back" href="#">zur&uuml;ck</a>
    </div>
    <div class="map_canvas" style="width:320px; height:400px"></div>
</div>