<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
$txtIdFacultad = (isset($_POST["txtIdFacultad"])) ? $_POST["txtIdFacultad"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `programa`(  `nombre`, `idfacultad`) 
        VALUES (:Nombre,:idfacultad)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':Nombre', $txtNombre);
        $sentencia->bindParam(':idfacultad', $txtIdFacultad);
        $sentencia->execute();
        header('Location: programa.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `programa` 
        SET `nombre`=:Nombre,
        `idfacultad`=:idfacultad
        
        where idprograma=:id";

        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':Nombre', $txtNombre);
        $sentencia2->bindParam(':idfacultad', $txtIdFacultad);
        $sentencia2->bindParam(':id', $txtId);
        $sentencia2->execute();


        header('Location: programa.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM programa 
        WHERE programa.idprograma= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: programa.php');

        break;

    case "btnCancelar":
        header('Location: programa.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datosprograma = $conexion->prepare("SELECT 
// `idprograma`, `Nombre`, `Apellido`, `Correo`, `asunto`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `idfacultad`  FROM `programa` NATURAL JOIN usuarios");

$datosprograma = $conexion->prepare("SELECT `idprograma`, p.`nombre`, f.nombre as nombre_facultad, p.idfacultad FROM `programa` as p inner join facultad as f on 
p.idfacultad = f.idfacultad");
$datosprograma->execute();
$listaP = $datosprograma->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaacta);
