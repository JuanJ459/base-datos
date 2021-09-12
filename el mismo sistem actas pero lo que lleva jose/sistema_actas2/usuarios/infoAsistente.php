<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
$txtApellido = (isset($_POST["txtApellido"])) ? $_POST["txtApellido"] : "";
$txtCorreo = (isset($_POST["txtCorreo"])) ? $_POST["txtCorreo"] : "";
$txtListaAsistente = (isset($_POST["txtListaAsistente"])) ? $_POST["txtListaAsistente"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `asistentes`( `nombre`, `apellido`, `correo`, `lista_asistente`) 
        VALUES (:Nombre,:Apellido,:Correo,:lista_asistente)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':Nombre', $txtNombre);
        $sentencia->bindParam(':Apellido', $txtApellido);
        $sentencia->bindParam(':Correo', $txtCorreo);
        $sentencia->bindParam(':lista_asistente', $txtListaAsistente);
        $sentencia->execute();
        header('Location: asistente.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `asistentes` 
        SET `nombre`=:Nombre,
        `apellido`=:Apellido,
        `correo`=:Correo,
        `lista_asistente`=:lista_asistente
        
        where idasistentes=:id";

        $sentencia2 = $conexion->prepare($cadenaSQL);

        $sentencia2->bindParam(':Nombre', $txtNombre);
        $sentencia2->bindParam(':Apellido', $txtApellido);
        $sentencia2->bindParam(':Correo', $txtCorreo);
        $sentencia2->bindParam(':lista_asistente', $txtListaAsistente);
        $sentencia2->bindParam(':id', $txtId);
        $sentencia2->execute();


        header('Location: asistente.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM asistentes 
        WHERE asistentes.idasistentes= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: asistente.php');

        break;

    case "btnCancelar":
        header('Location: asistente.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datosasistentes = $conexion->prepare("SELECT 
// `idasistentes`, `Nombre`, `Apellido`, `Correo`, `asunto`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `lista_asistente`  FROM `asistentes` NATURAL JOIN usuarios");

$datosAsistentes = $conexion->prepare("SELECT `idasistentes`, `nombre`, `apellido`, `correo`, `lista_asistente`, 
asunto as nombre_acta
FROM `asistentes` inner join acta on lista_asistente = acta.idacta;");
$datosAsistentes->execute();
$lista_asistente = $datosAsistentes->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaacta);

?>