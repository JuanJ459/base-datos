<?php 

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet" />
    <title>auth</title>
</head>

<body>
    <div class="flex flex-auto justify-between items-center h-screen w-full">
        <div class="w-2/3 bg-gray-100 h-full">
            <img class="h-full mx-auto w-auto"
                src="https://th.bing.com/th/id/R.f7ab33e290d90d34ae925d3ff36d7335?rik=dL9C1GKa3gyjWQ&riu=http%3a%2f%2f1.bp.blogspot.com%2f-x7k2qyLgGu8%2fVZR-sfp0SJI%2fAAAAAAAAAIU%2fcfcVL6Eq3YE%2fs1600%2fescudo.png&ehk=eFskeQsVHFSKnNgCjc35qcY6Wc1N7sxel7eZ4WBpdcg%3d&risl=&pid=ImgRaw&r=0"
                alt="unicord">
        </div>
        <div class="flex w-1/3 flex-col justify-center items-center  h-full px-10 py-5">
            <h1 class="mb-10 font-bold text-4xl">Login</h1>
            <form action="usuarios/index.php" method="POST" class="flex flex-col space-y-4 w-full">
                <div class="flex flex-col space-y-1">
                    <label for="user" class="ml-2 text-sm text-gray-500">Usuario</label>
                    <div
                        class="flex p-2 focus:outline-none bg-white w-full items-center border-b rounded-ms border-gray-500 ">
                        <input type="text" class="focus:outline-none bg-white w-full" name="user"
                            aria-describedby="emailHelp">
                    </div>
                </div>
                <div class="flex flex-col space-y-1">
                    <label for="pass" class="ml-2 text-sm text-gray-500">Contraseña</label>
                    <div
                        class="flex p-2 focus:outline-none bg-white w-full items-center border-b rounded-ms border-gray-500 ">
                        <input type="password" class="focus:outline-none bg-white w-full" name="pass">
                    </div>
                </div>
                <button type="submit"
                    class="py-2 px-3 hover:shadow-sm rounded-md focus:ring-4 hover:text-gray-400 transition duration-300 bg-gradient-to-r from-purple-400 to-pink-500 uppercase font-bold text-white focus:ring-red-500 focus:ring-opacity-50">Ingresar</button>
            </form>
        </div>
    </div>

</body>

</html>