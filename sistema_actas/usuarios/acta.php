<?php
require 'infoActa.php';
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
    <link rel="stylesheet" href="/css/css.css">
</head>

<body>

    <div class="container">
        <form action="" method="post">
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Creación de Nueva Acta</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">

                            <div class="form-row">

                            <div class="form-group col-md-12 ">
                                    <label for="">Asunto:</label>
                                    <input type="text" class="form-control" name="txtAsunto" required value="<?php echo $txtAsunto ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Fecha de Realizacion:</label>
                                    <input type="date"  class="form-control" name="txtFechaRealizacion" required value="<?php echo $txtFechaRealizacion ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="">Hora de Inicio:</label>
                                    <input type="time" class="form-control" name="txtHoraInicio" required value="<?php echo $txtHoraInicio ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                <div class="form-group col-md-6 ">
                                    <label for="">Hora de Finalización:</label>
                                    <input type="time"  class="form-control" name="txtHoraFinalizacion" required value="<?php echo $txtHoraFinalizacion ?>" placeholder="" id="txt2" require="">
                                    <br>
                                </div>

                                

                                <div class="form-group col-md-6 ">
                                    <label for="">Descripcion:</label>
                                    <input type="text" class="form-control" name="txtDescripcion" required value="<?php echo $txtDescripcion ?>" placeholder="" id="txt4" require="">
                                
                                    <br>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">ID de Creador:</label>
                                    <input type="number" class="form-control" name="txtIdCreador" required value="<?php echo $txtIdCreador ?>" placeholder="" id="txt8" require="">
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
                Agregar Acta
            </button>
            <a href="index.php" class="btn btn-primary linea">Crear Usuario</a>
        <br>
        <br>



        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Asunto</th>
                        <th>Fecha de creacion</th>
                        <th>Hora de Inicio</th>
                        <th>Hora de Finalizacion</th>
                        <th>Descripcion</th>
                        <th>Creador</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($lista_acta as $acta) { ?>
                    <tr>
                        <td> <?php echo $acta['asunto'] ?> </td>
                        <td> <?php echo $acta['fecha_realizacion_acta'] ?> </td>
                        <td> <?php echo $acta['hora_inicio'] ?> </td>
                        <td> <?php echo $acta['hora_finalizacion'] ?> </td>
                        <td> <?php echo $acta['descripcion'] ?> </td>
                        <td> <?php echo $acta['nombre'] ?> <?php echo $acta['apellido'] ?> </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtId" value="<?php echo $acta['idacta'] ?>">
                                <input type="hidden" name="txtAsunto" value="<?php echo $acta['asunto'] ?>">
                                <input type="hidden" name="txtDescripcion" value="<?php echo $acta['descripcion'] ?>">
                                <input type="hidden" name="txtFechaRealizacion" value="<?php echo $acta['fecha_realizacion_acta'] ?>">
                                <input type="hidden" name="txtHoraInicio" value="<?php echo $acta['hora_inicio'] ?>">
                                <input type="hidden" name="txtHoraFinalizacion" value="<?php echo $acta['hora_finalizacion'] ?> ">
                                <input type="hidden" name="txtIdCreador" value="<?php echo $acta['id_creador_usuario'] ?>">
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