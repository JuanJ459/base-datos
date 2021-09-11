<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";


$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `facultad`(  `nombre`) 
        VALUES (:Nombre)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':Nombre', $txtNombre);
        $sentencia->execute();
        header('Location: facultad.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `facultad` 
        SET `nombre`=:Nombre,
        
        
        where idfacultad=:id";

        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':Nombre', $txtNombre);
        $sentencia2->bindParam(':id', $txtId);
        $sentencia2->execute();


        header('Location: facultad.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM facultad 
        WHERE facultad.idfacultad= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: facultad.php');

        break;

    case "btnCancelar":
        header('Location: facultad.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datosfacultad = $conexion->prepare("SELECT 
// `idfacultad`, `Nombre`, `Apellido`, `Correo`, `asunto`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `idfacultad`  FROM `facultad` NATURAL JOIN usuarios");

$datosfacultad = $conexion->prepare("SELECT * FROM `facultad` WHERE 1");
$datosfacultad->execute();
$listaF = $datosfacultad->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaacta);
