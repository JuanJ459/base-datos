<?php
require 'usuario.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de actas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Creación de Nuevo Usuario</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">

                            <div class="form-row">
                                <div class="form-group col-sm-4 ml-auto">
                                    <label for="">Cedula:</label>
                                    <input type="number" <?php echo (isset($error['cedula'])) ? "is-invalid" : ""; ?> class="form-control" name="txtCedula" required value="<?php echo $txtCedula ?>" placeholder="" id="txt2" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['cedula'])) ? $error['cedula'] : ""; ?>
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group col-sm-4 ml-auto ">
                                    <label for="">Nombre(s):</label>
                                    <input type="text" class="form-control" <?php echo (isset($error['nombre'])) ? "is-invalid" : ""; ?> name="txtNombre" required value="<?php echo $txtNombre ?>" placeholder="" id="txt3" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['nombre'])) ? $error['nombre'] : ""; ?>
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group col-sm-4 ml-auto">
                                    <label for="">Apellido:</label>
                                    <input type="text" class="form-control" <?php echo (isset($error['apellido'])) ? "is-invalid" : ""; ?> name="txtApellido" required value="<?php echo $txtApellido ?>" placeholder="" id="txt4" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['apellido'])) ? $error['apellido'] : ""; ?>
                                    </div>
                                    <br>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Correo:</label>
                                    <input type="email" class="form-control" <?php echo (isset($error['correo'])) ? "is-invalid" : ""; ?> name="txtCorreo" required value="<?php echo $txtCorreo ?>" placeholder="" id="txt5" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['correo'])) ? $error['correo'] : ""; ?>
                                    </div>
                                    <br>

                                </div>

                                <div class="form-group col-md-12">
                                    <label for="">Contraseña:</label>
                                    <input type="password" class="form-control" <?php echo (isset($error['contrasena'])) ? "is-invalid" : ""; ?> name="txtPass" required value="<?php echo $txtPass ?>" placeholder="" id="txt6" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['contrasena'])) ? $error['contrasena'] : ""; ?>
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">ID Programa:</label>
                                    <input type="number" class="form-control" <?php echo (isset($error['id_programa'])) ? "is-invalid" : ""; ?> name="txtIdPrograma" required value="<?php echo $txtIdPrograma ?>" placeholder="" id="txt7" require="">
                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['id_programa'])) ? $error['id_programa'] : ""; ?>
                                    </div>
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">ID Rol:</label>
                                    <input type="number" class="form-control" <?php echo (isset($error['id_rol'])) ? "is-invalid" : ""; ?> name="txtIdRol" required value="<?php echo $txtIdRol ?>" placeholder="" id="txt8" require="">

                                    <div class="invalid-feedback">
                                        <?php echo (isset($error['id_rol'])) ? $error['id_rol'] : ""; ?>
                                    </div>

                                    <br>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button value="btnAgregar" <?php echo $accionAdd; ?> class="btn btn-success" type="submit" name="accion">Agregar</button>
                            <button value="btnEditar" <?php echo $accionMod; ?> type="submit" class="btn btn-warning " name="accion">Editar</button>
                            <button value="btnEliminar" <?php echo $accionDel; ?> type="submit" class="btn btn-danger" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            <button value="btnCancelar" <?php echo $accionCancel; ?> type="submit" class="btn btn-primary" name="accion">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Usuario
            </button>

            <a href="acta.php" class="btn btn-primary linea">Crear Acta</a>
            <br>
            <br>



        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre Completo</th>
                        <th>Cedula</th>
                        <th>Correo</th>
                        <th>Programa</th>
                        <th>Facultad</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaUsuarios as $usuario) { ?>
                    <tr>
                        <td> <?php echo $usuario['nombre'] ?> <?php echo $usuario['apellido'] ?> </td>
                        <td> <?php echo $usuario['cedula'] ?> </td>
                        <td> <?php echo $usuario['correo'] ?> </td>
                        <td> <?php echo $usuario['programa_nombre'] ?> </td>
                        <td> <?php echo $usuario['facultad_nombre'] ?> </td>
                        <td> <?php echo $usuario['rol_nombre'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $usuario['idusuarios'] ?>">
                                <input type="hidden" name="txtNombre" value="<?php echo $usuario['nombre'] ?>">
                                <input type="hidden" name="txtApellido" value="<?php echo $usuario['apellido'] ?>">
                                <input type="hidden" name="txtCedula" value="<?php echo $usuario['cedula'] ?>">
                                <input type="hidden" name="txtCorreo" value="<?php echo $usuario['correo'] ?>">
                                <input type="hidden" name="txtPass" value="<?php echo $usuario['contrasena'] ?> ">
                                <input type="hidden" name="txtIdPrograma" value="<?php echo $usuario['idprograma'] ?>">
                                <input type="hidden" name="txtIdRol" value="<?php echo $usuario['idrol'] ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info " name="accion">
                                <br>
                                <button value="btnEliminar" type="submit" class="btn btn-danger " onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
        <?php if ($showModal) { ?>
            <script>
                $('#exampleModalCenter').modal('show');
            </script>
        <?php } ?>
        <script>
            function confirmar(msg) {
                return (confirm(msg)) ? true : false;
            }
        </script>
    </div>
</body>

</html>