<?php

    if(!empty($_GET["iden"])){
        $iden=$_GET["iden"];
        $sql=$base->query("DELETE FROM personas WHERE iden_per=$iden");
        if ($sql==1) {
            echo "<div class='alert alert-success'>Persona eliminada correctamente</div>";
        } else {
            echo "<div class='alert alert-warning'>Error al eliminar esta persona</div>";
        }
        

    }

?>