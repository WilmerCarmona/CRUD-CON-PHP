<?php

    if(!empty($_GET["iden"])){
        $iden=$_GET["iden"];
        $sql=$base->query("DELETE FROM personas WHERE iden_per=$iden");
        if ($sql==1) {
          header("Location: index.php?mensaje=eliminado");
        exit();
        } else {
            header("Location: index.php?mensaje=error");
            exit();
        }
        

    }

?>