
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img class="logo" src="../img/logUNICORDOBA vigiladoMENmodalidad 2.png" alt="" srcset=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Facultades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Programas</a>
        </li>
        
        
      </ul>
      
    </div>
  </div>
</nav>
<div class="encabezado">
<h1> Bienvenido </h1>    
  <?php 

header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
try {

    $conn = new PDO('mysql:host=localhost;dbname=dbacta','root', '');

    $p1 = $_POST['user'];

    $p2 = $_POST['pass'];


    $sql = "SELECT idusuarios , contrasena FROM usuarios where idusuarios = '$p1' and contrasena = '$p2'";

    $res = $conn->query($sql);

foreach ($res as $fila) {

    
     if( $p1 === $fila["uid"]  &&  $p2 === $fila["password"] ){
        echo "<div class='buttons row'>";
        echo "<a class='btn btn-outline-primary col' href='../usuarios/acta.php?uid=".$p1."'> Ir a facultades </a>";
        echo "</br>";
        echo "<a class='btn btn-outline-success col' href='../usuarios/index.php?uid=".$p1."'> Ir a programas </a>";
        echo "</div>";
    } else {
        echo "<p> Usuario no encontrado </p>";
    }
    
    
}
   
    
    $conn = null;

    
} catch (PDOException $e) {
    print "Error!:".$e->getMessage() . "<br/>";
    die();
}
 ?>
  
</div>
</body>
</html>