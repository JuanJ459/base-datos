<?php

    $database='dbacta'; #Nombre base de datos
    $usuario="root"; #Usuario phpMyAdmin
    $password="";
    try {
        $conexion = new PDO('mysql:host=localhost;dbname='.$database,$usuario,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8"));
    } catch (PDOException $e) {
        echo "Conexión fallida: (".$e->getMessage();
    }