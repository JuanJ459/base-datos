<?php
require 'infoCompromisos.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de compromisos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/css/css.css">
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Creación de un nuevo compromiso</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">

                            <div class="form-row">

                                <div class="form-group col-md-12 ">
                                    <label for="">Descripción:</label>
                                    <input type="text" class="form-control" name="txtDescripcion" required value="<?php echo $txtDescripcion ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">ID Responsable:</label>
                                    <input type="number" class="form-control" name="txtResponsable" required value="<?php echo $txtResponsable ?>" placeholder="" id="txt8" require="">
                                    <br>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">Fecha de inicio:</label>
                                    <input type="date" class="form-control" name="txtFechaInicio" required value="<?php echo $txtFechaInicio ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">Fecha de finalización:</label>
                                    <input type="date" class="form-control" name="txtFechaFinalizacion" required value="<?php echo $txtFechaFinalizacion ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="">Estado:</label>
                                    <input type="txt" class="form-control" name="txtEstado" value="<?php echo $txtEstado ?>" placeholder="" id="txt9" require="">
                                    <br>
                                </div>



                                <div class="form-group col-md-6 ">
                                    <label for="">Compromiso para el Acta:</label>
                                    <input type="number" class="form-control" name="txtListaCompromisos" required value="<?php echo $txtListaCompromisos ?>" placeholder="" id="txt4" require="">

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
            <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Compromiso
            </button>
            <a href="index.php" class="btn btn-primary linea">Crear Usuario</a>
            <a href="asistente.php" class="btn btn-primary linea">Crear Asistente</a>
            <a href="programa.php" class="btn btn-primary linea">Crear Programa</a>
            <a href="facultad.php" class="btn btn-primary linea">Crear facultad</a>
            <br>
            <br>



        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id Compromiso</th>
                        <th>Descripcion</th>
                        <th>Responsable</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Finalizacion</th>
                        <th>Estado</th>
                        <th>Compromiso del Acta</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($lista_compromisos as $compromiso) { ?>
                    <tr>
                        <td> <?php echo $compromiso['idcompromisos'] ?> </td>
                        <td> <?php echo $compromiso['descripcion'] ?> </td>
                        <td> <?php echo $compromiso['nombre_creador'] ?> <?php echo $compromiso['apellido_creador'] ?> </td>
                        <td> <?php echo $compromiso['fecha_inicio'] ?> </td>
                        <td> <?php echo $compromiso['fecha_finalizacion'] ?> </td>
                        <td> <?php echo $compromiso['estado'] ?> </td>
                        <td> <?php echo $compromiso['acta'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $compromiso['idcompromisos'] ?>">
                                <input type="hidden" name="txtDescripcion" value="<?php echo $compromiso['descripcion'] ?>">
                                <input type="hidden" name="txtResponsable" value="<?php echo $compromiso['responsable'] ?>">
                                <input type="hidden" name="txtFechaInicio" value="<?php echo $compromiso['fecha_inicio'] ?>">
                                <input type="hidden" name="txtFechaFinalizacion" value="<?php echo $compromiso['fecha_finalizacion'] ?>">
                                <input type="hidden" name="txtEstado" value="<?php echo $compromiso['estado'] ?> ">
                                <input type="hidden" name="txtListaCompromisos" value="<?php echo $compromiso['lista_compromisos'] ?>">
                                <input type="submit" value="Seleccionar" class="btn btn-info linea" name="accion">
                                <button value="btnEliminar" type="submit" class="btn btn-danger linea" onclick="return confirmar('¿Quieres borrar este registro?')" name="accion">Eliminar</button>
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