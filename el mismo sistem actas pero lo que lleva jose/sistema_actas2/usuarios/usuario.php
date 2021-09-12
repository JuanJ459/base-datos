<?php
$txtId = (isset($_POST["txtId"])) ? $_POST["txtId"] : "";
$txtCedula = (isset($_POST["txtCedula"])) ? $_POST["txtCedula"] : "";
$txtNombre = (isset($_POST["txtNombre"])) ? $_POST["txtNombre"] : "";
$txtApellido = (isset($_POST["txtApellido"])) ? $_POST["txtApellido"] : "";
$txtCorreo = (isset($_POST["txtCorreo"])) ? $_POST["txtCorreo"] : "";
$txtPass = (isset($_POST["txtPass"])) ? $_POST["txtPass"] : "";
$txtIdPrograma = (isset($_POST["txtIdPrograma"])) ? $_POST["txtIdPrograma"] : "";
$txtIdRol = (isset($_POST["txtIdRol"])) ? $_POST["txtIdRol"] : "";

$accion = (isset($_POST["accion"])) ? $_POST["accion"] : "";
$error = array();
$accionAdd = "";
$accionMod = $accionDel = $accionCancel = "disabled";
$showModal = false;
include("../conexion/conexion.php");

switch ($accion) {

    case "btnAgregar":

        if ($txtNombre == "") {
            $error['nombre'] = "¡Debes escribir un nombre!";
        }
        if ($txtApellido == "") {
            $error['apellido'] = "¡Debes escribir un Apellido!";
        }
        if ($txtCedula == "") {
            $error['cedula'] = "¡Debes escribir un Cedula!";
        }
        if ($txtCorreo == "") {
            $error['correo'] = "¡Debes escribir un Correo!";
        }
        if ($txtPass == "") {
            $error['contrasena'] = "¡Debes escribir un contraseña!";
        }
        if ($txtIdPrograma == "") {
            $error['id_programa'] = "¡Debes digitar el id de un programa";
        }
        if ($txtIdPrograma != "0") {
            $error['id_programa'] = "¡El id del programa debe ser mayor a cero";
        }
        if ($txtIdRol == "" && $txtIdRol > 0) {
            $error['id_rol'] = "¡Debes digitar el id de un rol!";
        }
        if ($txtIdRol != "0") {
            $error['id_rol'] = "¡El id del rol debe ser mayor a cero!";
        }

        if (count($error) < 0) {
            $showModal = true;
            break;
        }


        $cadenaSQL = "INSERT INTO usuarios (cedula,nombre,apellido,contrasena,correo,id_programa,id_rol) 
        VALUES (:cedula,:nombre,:apellido,:contrasena,:correo,:id_programa,:id_rol ) ";
        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':cedula', $txtCedula);
        $sentencia->bindParam(':nombre', $txtNombre);
        $sentencia->bindParam(':apellido', $txtApellido);
        $sentencia->bindParam(':contrasena', $txtPass);
        $sentencia->bindParam(':correo', $txtCorreo);
        $sentencia->bindParam(':id_programa', $txtIdPrograma);
        $sentencia->bindParam(':id_rol', $txtIdRol);
        $sentencia->execute();
        header('Location: index.php');
        break;

    case "btnEditar":

        $cadenaSQL = "UPDATE usuarios SET  
        usuarios.`cedula`= :cedula,
        usuarios.`nombre`= :nombre,
        usuarios.`apellido`= :apellido,
        usuarios.`contrasena`= :contrasena,
        usuarios.`correo`= :correo,
        usuarios.`id_programa`= :id_programa,
        usuarios.`id_rol`= :id_rol
        WHERE usuarios.`idusuarios`= :idusuarios";

        $sentencia2 = $conexion->prepare($cadenaSQL);

        $sentencia2->bindParam(':cedula', $txtCedula, PDO::PARAM_INT);
        $sentencia2->bindParam(':nombre', $txtNombre, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':apellido', $txtApellido, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':contrasena', $txtPass, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':correo', $txtCorreo, PDO::PARAM_STR, 25);
        $sentencia2->bindParam(':id_programa', $txtIdPrograma, PDO::PARAM_INT);
        $sentencia2->bindParam(':id_rol', $txtIdRol, PDO::PARAM_INT);
        $sentencia2->bindParam(':idusuarios', $txtId, PDO::PARAM_INT);
        $sentencia2->execute();


        header('Location: index.php');

        break;

    case "btnEliminar":

        $cadenaSQL = "DELETE FROM usuarios 
        WHERE usuarios.`idusuarios`= :idusuarios";

        $sentencia = $conexion->prepare($cadenaSQL);
        $sentencia->bindParam(':idusuarios', $txtId, PDO::PARAM_INT);
        $sentencia->execute();
        header('Location: index.php');

        break;

    case "btnCancelar":
        header('Location: index.php');
        break;

    case "Seleccionar":
        $accionAdd = "disabled";
        $accionMod = $accionDel = $accionCancel = "";
        $showModal = true;
}

$datosUsuario = $conexion->prepare("SELECT usuarios.`idusuarios`, `cedula`, usuarios.`nombre`, usuarios.`apellido`, usuarios.`correo`, `contrasena`,programa.`idprograma`,rol.`idrol`,
rol.`nombre` as `rol_nombre`,
programa.`nombre` as `programa_nombre`,
facultad.`nombre` as facultad_nombre
FROM `usuarios`
inner join rol on (rol.`idrol` = usuarios.id_rol)
inner join programa on (programa.`idprograma` = usuarios.`id_programa`) 
inner join facultad on (programa.`idfacultad` = facultad.`idfacultad`);");
$datosUsuario->execute();
$listaUsuarios = $datosUsuario->fetchAll(PDO::FETCH_ASSOC);
// print_r($listaUsuarios);

?>