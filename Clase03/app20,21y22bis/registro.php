<?php

include "usuario.php";
$path = "usuarios.csv";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    POST_crearUsuario($path);
}


function POST_crearUsuario($path){
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $email = $_POST['email'];
    
    if (empty($nombre) || empty($clave) || empty($email)) {
        echo "Datos incompletos.";
    } else {
        $usuario = new Usuario($nombre, $clave, $email);
        Usuario:: AltaUsuario($usuario, $path);
       
        echo "El alta ha sido realizada exitosamente.";  
    }
}

?>