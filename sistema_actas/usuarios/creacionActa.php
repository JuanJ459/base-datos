<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtIdFacultad = (isset($_POST["txtIdFacultad"])) ? $_POST["txtIdFacultad"] : "";
$txtIdActa = (isset($_POST["txtIdActa"])) ? $_POST["txtIdActa"] : "";
$txtIdPrograma = (isset($_POST["txtIdPrograma"])) ? $_POST["txtIdPrograma"] : "";


$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `creacion_acta`(`facultad_idfacultad`, `acta_idacta`, `programa_idprograma`) 
        VALUES (facultad,:acta,:programa)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':programa', $txtIdPrograma);
        $sentencia->bindParam(':facultad', $txtIdFacultad);
        $sentencia->bindParam(':acta', $txtIdActa);
        $sentencia->execute();
        header('Location: infoCreacionActa.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `creacion_acta` 
        SET  facultad_idfacultad=:facultad,
        `programa_idprograma=:programa
        
        
        where acta_idacta=:acta";

        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':programa', $txtIdPrograma);
        $sentencia2->bindParam(':facultad', $txtIdFacultad);
        $sentencia2->bindParam(':acta', $txtIdActa);
        $sentencia2->execute();


        header('Location: infoCreacionActa.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM creacion_acta 
        WHERE creacion_acta.acta_idacta = :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtIdActa, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: infoCreacionActa.php');

        break;

    case "btnCancelar":
        header('Location: infoCreacionActa.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datosfacultad = $conexion->prepare("SELECT 
// `idfacultad`, `Nombre`, `Apellido`, `Correo`, `asunto`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `idfacultad`  FROM `facultad` NATURAL JOIN usuarios");

$datosActaCreacion = $conexion->prepare("SELECT `facultad_idfacultad`,facultad.nombre as fnombre ,acta.asunto as anombre,programa.nombre as pnombre, `acta_idacta`, `programa_idprograma` FROM `creacion_acta` inner join acta on acta.idacta = creacion_acta.acta_idacta inner join programa on programa.idprograma = creacion_acta.programa_idprograma inner join facultad on creacion_acta.facultad_idfacultad=facultad.idfacultad");
$datosActaCreacion->execute();
$listaAC = $datosActaCreacion->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaacta);
