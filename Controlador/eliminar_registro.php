<?php

if(!empty($_GET['id'])) {
   $id= $_GET['id'];
   $sql = $conexion->query("DELETE FROM registros WHERE id_persona = $id");
    if($sql == 1) {
         echo "<div class='container col-8 text-center alert alert-success  '>Registro eliminado correctamente</div>";
    } else {
         echo "<div class='container col-8 text-center alert alert-danger'>Error al eliminar</div>";
    }
}

?>