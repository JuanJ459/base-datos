<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtDescripcion = (isset($_POST["txtDescripcion"])) ? $_POST["txtDescripcion"] : "";
$txtResponsable = (isset($_POST["txtResponsable"])) ? $_POST["txtResponsable"] : "";
$txtFechaInicio = (isset($_POST["txtFechaInicio"])) ? $_POST["txtFechaInicio"] : "";
$txtFechaFinalizacion = (isset($_POST["txtFechaFinalizacion"])) ? $_POST["txtFechaFinalizacion"] : "";
$txtEstado = (isset($_POST["txtEstado"])) ? $_POST["txtEstado"] : "";
$txtListaCompromisos = (isset($_POST["txtListaCompromisos"])) ? $_POST["txtListaCompromisos"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `compromisos`(`descripcion`,`responsable`, `fecha_inicio` ,`fecha_finalizacion`, `estado`,`lista_compromisos`) 
        VALUES (
        :descripcion,
        :responsable,
        :fecha_inicio,
        :fecha_finalizacion,
        :estado,
        :lista_compromisos);
        ";


        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':descripcion', $txtDescripcion);
        $sentencia->bindParam(':responsable', $txtResponsable);
        $sentencia->bindParam(':fecha_inicio', $txtFechaInicio);
        $sentencia->bindParam(':fecha_finalizacion', $txtFechaFinalizacion);
        $sentencia->bindParam(':estado', $txtEstado);
        $sentencia->bindParam(':lista_compromisos', $txtListaCompromisos);
        $sentencia->execute();
        header('Location: compromisos.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE `compromisos` 
        SET 
        `fecha_finalizacion`=:fecha_finalizacion,
        `estado`=:estado,
        `fecha_inicio`=:fecha_inicio,
        `lista_compromisos`=:lista_compromisos,
        `descripcion`=:descripcion,
        `responsable`=:responsable
        WHERE idcompromisos =:id";
        $sentencia2 = $conexion->prepare($cadenaSQL);
        $sentencia2->bindParam(':descripcion', $txtDescripcion);
        $sentencia2->bindParam(':responsable', $txtResponsable);
        $sentencia2->bindParam(':fecha_inicio', $txtFechaInicio);
        $sentencia2->bindParam(':fecha_finalizacion', $txtFechaFinalizacion);
        $sentencia2->bindParam(':estado', $txtEstado);
        $sentencia2->bindParam(':lista_compromisos', $txtListaCompromisos);
        $sentencia2->bindParam(':id', $txtId);
        $sentencia2->execute();


        header('Location: compromisos.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM `compromisos` WHERE idcompromisos =:id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: compromisos.php');

        break;

    case "btnCancelar":
        header('Location: compromisos.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datoscompromisos = $conexion->prepare("SELECT 
// `idcompromisos`, `fecha_finalizacion`, `estado`, `fecha_inicio`, `lista_compromisos`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `responsable`  FROM `compromisos` NATURAL JOIN usuarios");

$datoscompromisos = $conexion->prepare("SELECT `idcompromisos`, c.`descripcion`, `responsable`, `fecha_inicio`, `fecha_finalizacion`, `estado`, `lista_compromisos`,u.nombre as nombre_creador, u.apellido as apellido_creador, a.asunto as acta FROM `compromisos` as c inner join acta as a on a.idacta = c.lista_compromisos inner join usuarios as u on u.idusuarios = a.id_creador_usuario;");
$datoscompromisos->execute();
$lista_compromisos = $datoscompromisos->fetchAll(PDO::FETCH_ASSOC);
// print_r($listacompromisos);
