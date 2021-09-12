<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtFechaRealizacion = (isset($_POST["txtFechaRealizacion"])) ? $_POST["txtFechaRealizacion"] : "";
$txtHoraInicio = (isset($_POST["txtHoraInicio"])) ? $_POST["txtHoraInicio"] : "";
$txtHoraFinalizacion = (isset($_POST["txtHoraFinalizacion"])) ? $_POST["txtHoraFinalizacion"] : "";
$txtAsunto = (isset($_POST["txtAsunto"])) ? $_POST["txtAsunto"] : "";
$txtDescripcion = (isset($_POST["txtDescripcion"])) ? $_POST["txtDescripcion"] : "";
$txtIdCreador = (isset($_POST["txtIdCreador"])) ? $_POST["txtIdCreador"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":


        $cadenaSQL = "INSERT INTO `acta`( `fecha_realizacion_acta`, `hora_inicio`, `hora_finalizacion`, `asunto`, `descripcion`, `id_creador_usuario`) 
        VALUES (:fecha_realizacion_acta,:hora_inicio,:hora_finalizacion,:asunto,:descripcion,:id_creador_usuario)";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':fecha_realizacion_acta', $txtFechaRealizacion);
        $sentencia->bindParam(':hora_inicio', $txtHoraInicio);
        $sentencia->bindParam(':hora_finalizacion', $txtHoraFinalizacion);
        $sentencia->bindParam(':asunto', $txtAsunto);
        $sentencia->bindParam(':descripcion', $txtDescripcion);
        $sentencia->bindParam(':id_creador_usuario', $txtIdCreador);
        $sentencia->execute();
        header('Location: acta.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE acta SET  
        acta.`fecha_realizacion_acta`= :fecha_realizacion_acta,
        acta.`hora_inicio`= :hora_inicio,
        acta.`hora_finalizacion`= :hora_finalizacion,
        acta.`asunto`= :asunto,
        acta.`descripcion`= :descripcion,
        acta.`id_creador_usuario`= :id_creador_usuario,
        WHERE acta.idacta= :id";

        $sentencia2 = $conexion->prepare($cadenaSQL);

        $sentencia2->bindParam(':fecha_realizacion_acta', $txtFechaRealizacion);
        $sentencia2->bindParam(':hora_inicio', $txtHoraInicio);
        $sentencia2->bindParam(':hora_finalizacion', $txtHoraFinalizacion);
        $sentencia2->bindParam(':asunto', $txtDescripcion);
        $sentencia2->bindParam(':descripcion', $txtAsunto);
        $sentencia2->bindParam(':id_creador_usuario', $txtIdCreador);
        $sentencia2->bindParam(':id', $txtId);
        $sentencia2->execute();


        header('Location: acta.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM acta 
        WHERE acta.idacta= :id";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':id', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: acta.php');

        break;

    case "btnCancelar":
        header('Location: acta.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

// $datosActa = $conexion->prepare("SELECT 
// `idacta`, `fecha_realizacion_acta`, `hora_inicio`, `hora_finalizacion`, `asunto`, `descripcion`, 
// usuarios.nombre, usuarios.apellido, `id_creador_usuario`  FROM `acta` NATURAL JOIN usuarios");

$datosActa = $conexion->prepare("SELECT 
`idacta`, `fecha_realizacion_acta`, `hora_inicio`, `hora_finalizacion`, `asunto`, `descripcion`, 
usuarios.nombre, usuarios.apellido, `id_creador_usuario`  FROM `acta` inner join usuarios on acta.id_creador_usuario = usuarios.idusuarios");
$datosActa->execute();
$lista_acta = $datosActa->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaacta);

?>