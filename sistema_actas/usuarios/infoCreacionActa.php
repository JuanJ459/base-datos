<?php
require 'creacionActa.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=desvice-width, initial-scale=1.0">
    <title>Creacion de Acta</title>
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
                            <h5 class="modal-title" id="exampleModalLongTitle">Creación de una Facultad</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder="" id="txt1" require="">

                            <div class="form-row">

                                <div class="form-group col-md-12 ">
                                    <label for="">Id Facultad:</label>
                                    <input type="number" class="form-control" name="txtIdFacultad" required value="<?php echo $txtIdFacultad ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="">Id Acta:</label>
                                    <input type="number" class="form-control" name="txtIdActa" required value="<?php echo $txtIdActa ?>" placeholder="" id="txt3" require="">
                                    <br>
                                </div>
                                <div class="form-group col-md-12 ">
                                    <label for="">Id Programa:</label>
                                    <input type="number" class="form-control" name="txtIdPrograma" required value="<?php echo $txtIdPrograma ?>" placeholder="" id="txt3" require="">
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
                Agregar Facultad
            </button>
            <a href="index.php" class="btn btn-primary linea">Crear Usuario</a>
            <a href="acta.php" class="btn btn-primary linea">Crear Acta</a>
            <a href="programa.php" class="btn btn-primary linea">Crear programa</a>

            <br>
            <br>



        </form>
        <div class="row">
            <table CLASS="table table-hover table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Id Acta</th>
                        <th>Nombre del Acta</th>
                        <th>Id Programa</th>
                        <th>Nombre Programa</th>
                        <th>Id Facultad</th>
                        <th>Nombre Facultad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <?php foreach ($listaAC as $ac) { ?>
                    <tr>
                        <td> <?php echo $ac['acta_idacta'] ?></td>
                        <td> <?php echo $ac['anombre'] ?></td>
                        <td> <?php echo $ac['programa_idprograma'] ?></td>
                        <td> <?php echo $ac['pnombre'] ?></td>
                        <td> <?php echo $ac['facultad_idfacultad'] ?></td>
                        <td> <?php echo $ac['fnombre'] ?></td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="txtIdActa" value="<?php echo $ac['acta_idacta '] ?>">
                                <input type="hidden" name="txtIdFacultad" value="<?php echo $ac['programa_idprograma'] ?>">
                                <input type="hidden" name="txtIdPrograma" value="<?php echo $ac['facultad_idfacultad'] ?>">
                        
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