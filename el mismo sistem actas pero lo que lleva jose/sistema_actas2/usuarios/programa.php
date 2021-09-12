<?php
require 'infoPrograma.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creacion de programa</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body>
    <nav class="bg-blue-600">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>

                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 flex items-center">
                        <div class="bg-white h-8">

                            <img class="block lg:hidden h-full w-auto bg-red-100"
                                src="https://th.bing.com/th/id/R.f7ab33e290d90d34ae925d3ff36d7335?rik=dL9C1GKa3gyjWQ&riu=http%3a%2f%2f1.bp.blogspot.com%2f-x7k2qyLgGu8%2fVZR-sfp0SJI%2fAAAAAAAAAIU%2fcfcVL6Eq3YE%2fs1600%2fescudo.png&ehk=eFskeQsVHFSKnNgCjc35qcY6Wc1N7sxel7eZ4WBpdcg%3d&risl=&pid=ImgRaw&r=0"
                                alt="unicord">
                        </div>
                        <div class="bg-white rounded-full h-8">

                            <img class="hidden lg:block h-full w-auto"
                                src="https://th.bing.com/th/id/R.f7ab33e290d90d34ae925d3ff36d7335?rik=dL9C1GKa3gyjWQ&riu=http%3a%2f%2f1.bp.blogspot.com%2f-x7k2qyLgGu8%2fVZR-sfp0SJI%2fAAAAAAAAAIU%2fcfcVL6Eq3YE%2fs1600%2fescudo.png&ehk=eFskeQsVHFSKnNgCjc35qcY6Wc1N7sxel7eZ4WBpdcg%3d&risl=&pid=ImgRaw&r=0"
                                alt="unicord">
                        </div>
                    </div>
                    <div class="sm:ml-6 flex justify-between w-full">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="index.php"
                                class="text-gray-100 hover:bg-gray-100 hover:text-black px-3 py-2 rounded-md text-sm font-medium">Usuarios</a>
                            <a href="acta.php"
                                class="text-gray-100 hover:bg-gray-100 hover:text-black px-3 py-2 rounded-md text-sm font-medium">Actas</a>
                            <a href="facultad.php"
                                class="text-gray-100 hover:bg-gray-100 hover:text-black px-3 py-2 rounded-md text-sm font-medium">Facultad</a>
                            <a href="asistente.php"
                                class="text-gray-100 hover:bg-gray-100 hover:text-black px-3 py-2 rounded-md text-sm font-medium">Asistente</a>
                            <a href="programa.php" class="bg-white text-black px-3 py-2 rounded-md text-sm font-medium"
                                aria-current="page">Programa</a>
                        </div>
                        <button
                            class="bg-green-500 text-white active:bg-purple-600 font-bold uppercase text-sm px-6 py-1 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button" onclick="toggleModal('modal-example-regular')">
                            crear programa
                        </button>
                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                        aria-current="page">Registro acta</a>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Ver
                        actas</a>
                </div>
            </div>
    </nav>
    <div class="bg-blue-600 h-32 w-full">


        <div class="container mx-auto">
            <form action="" method="post">
                <!-- Modal -->
                <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                    id="modal-example-regular">
                    <div class="relative w-11/12 h-4/5 my-6 mx-auto p-4">
                        <!--content-->
                        <div
                            class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                            <!--header-->
                            <div
                                class="flex items-start justify-between p-5 border-b border-solid border-gray-200 rounded-t">
                                <h3 class="text-3xl font-semibold">
                                    Crear programa
                                </h3>
                                <button
                                    class="p-1 ml-auto bg-transparent border-0 text-gray-300 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                    onclick="toggleModal('modal-example-regular')">
                                    <span class="bg-transparent h-6 w-6 text-2xl text-black block outline-none focus:outline-none">
                                        X
                                    </span>
                                </button>
                            </div>
                            <!--body-->
                            <div class="p-4">
                                <input type="hidden" required name="txtId" value="<?php echo $txtId ?>" placeholder=""
                                    id="txt1" require="">
                                <div class="form-row">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700" for="">Nombre:</label>
                                        <input type="text"
                                            class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-blue-200 rounded-md focus:outline-none focus:border-red-500"
                                            name="txtNombre" required value="<?php echo $txtNombre ?>" placeholder=""
                                            id="txt3" require="">
                                        <br>
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label class="block text-sm font-medium text-gray-700 for="">Id Facultad:</label>
                    <input type=" number" class="mt-1 p-2 block w-full shadow-sm sm:text-sm border border-blue-200 rounded-md focus:outline-none focus:border-red-500"
                                            name="txtIdFacultad" required value="<?php echo $txtIdFacultad ?>"
                                            placeholder="" id="txt8" require="">
                                    </div>

                                </div>
                                <div
                                    class="flex items-center justify-end p-6 border-t border-solid border-gray-200 rounded-b">
                                    <button <?php echo $accionAdd; ?> type="submit" name="accion" value="btnAgregar"
                                        class="bg-blue-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Agregar
                                    </button>
                                    <button <?php echo $accionMod; ?> type="submit" name="accion" value="btnEditar"
                                        class="bg-green-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">
                                        Editar
                                    </button>
                                    <button <?php echo $accionDel; ?> type="submit" name="accion" value="btnEliminar"
                                        class="bg-red-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        onclick="return confirmar('¿Quieres borrar este registro?')">
                                        Eliminar
                                    </button>
                                    <button <?php echo $accionCancel; ?> name="accion" value="btnCancelar"
                                        class="bg-gray-500 text-white active:bg-purple-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                        type="button" onclick="toggleModal('modal-example-regular')">
                                        Cancelar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>


            <!-- <button type="button" class="btn btn-primary linea" data-toggle="modal" data-target="#exampleModalCenter">
                Agregar Programa
            </button>
            <a href="index.php" class="btn btn-primary linea">Crear Usuario</a>
            <a href="acta.php" class="btn btn-primary linea">Crear Acta</a>
            <a href="facultad.php" class="btn btn-primary linea">Crear facultad</a> -->



            </form>
            <div class="flex flex-col w-10/12 mx-auto absolute mx-auto inset-x-0 top-14">
                <h1 class="text-center text-4xl font-semibold mt-10 text-white">Programas</h1>
                <div></div>
                <div class="my-2 mx-auto w-full overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Nombre</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Facultad del programa</th>
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Acciones</th>
                                    </tr>
                                </thead>

                                <?php foreach ($listaP as $programa) { ?>
                                <tr>
                                    <td class='px-6 py-4 whitespace-nowrap'> <?php echo $programa['nombre'] ?></td>
                                    <td class='px-6 py-4 whitespace-nowrap'> <?php echo $programa['nombre_facultad'] ?>
                                    </td>
                                    <td class='px-6 py-4 whitespace-nowrap'>
                                        <form action="" method="post">
                                            <input type="hidden" name="txtId"
                                                value="<?php echo $programa['idprograma'] ?>">
                                            <input type="hidden" name="txtNombre"
                                                value="<?php echo $programa['nombre'] ?>">
                                            <input type="hidden" name="txtIdFacultad"
                                                value="<?php echo $programa['idfacultad'] ?>">
                                            <button type="submit" value="Seleccionar"
                                                onclick="toggleModal('modal-example-regular')"
                                                class="hover:bg-blue-700 hover:cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50 bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium"
                                                name="accion">Seleccionar</button>
                                            <button value="btnEliminar" type="submit"
                                                class="hover:bg-red-700 cursor-pointer focus:outline-none focus:ring-2 focus:ring-red-600 focus:ring-opacity-50 bg-red-500 text-white px-3 py-2 rounded-md text-sm font-medium"
                                                onclick="return confirmar('¿Quieres borrar este registro?')"
                                                name="accion">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
            function toggleModal(modalID) {
                // modalID.preventDefault();
                document.getElementById(modalID).classList.toggle("hidden");
                document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
                document.getElementById(modalID).classList.toggle("flex");
                document.getElementById(modalID + "-backdrop").classList.toggle("flex");
            }
            </script>
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