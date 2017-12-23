<?php
    require "mySqlBase.php";
    require "phpHelper.php";
    initMySql();
    $updates = getAllUpdates();
?>
<div id="updates">
    <div class="toolbar">
        <h1>Alle <?php echo count( $updates );?> Eintr&auml;ge</h1>
        <a class="back" href="#">zur&uuml;ck</a>
    </div>
    <div>
        <ul class="plastic">
        <?php 
                    for($a = 0; $a < count( $updates ); $a++)
                    {
                        echo "<li class='arrow'><a class='cuberight' href='suche.php?id=" . $updates[$a]['ID'] . "'>".$updates[$a]['NAME'].", <i>" . $updates[$a]['COUNT'] . " mal</i></a></li>";
                    }
        ?>
        </ul>
    </div>
</div>