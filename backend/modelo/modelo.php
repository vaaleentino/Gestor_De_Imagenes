<?php

require_once "../conection/conexion.php";

class imagen{

    function obtenerimg(){
        $connection = conection();
        $sql = "SELECT * FROM imagen";
        $respuesta = $connection->query($sql);
        $imagenes = $respuesta->fetch_all(MYSQLI_ASSOC);
        return $imagenes;
    }

    function agregarimg($nombre, $imagen){
        $connection = conection();
        $nomImg = $imagen['name'];
        $extension = pathinfo($nomImg, PATHINFO_EXTENSION);
        $sql = "INSERT INTO imagen(nombre, extension) VALUES('$nombre', '$extension');";
        $connection->query($sql);
        $id = $connection->insert_id;
        $rutaTemp = $imagen['tmp_name'];
        move_uploaded_file($rutaTemp, "../imagenes/$id.$extension");

    }
  
}

?>