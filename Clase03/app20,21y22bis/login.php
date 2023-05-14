<?php

include "usuario.php";
$path = "usuarios.csv";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    POST_loginUsuario($path);
}


function POST_loginUsuario($path){
    //$nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $email = $_POST['mail'];
    
    if (empty($clave) || empty($email)) {
        echo "Datos incompletos.\n";
    } else {
        $usuarios = Usuario::LeerCsvUsuarios($path);
        $retorno = Usuario::CompareUsuarios($usuarios, $clave, $email);
        switch($retorno){
            case -1:
                echo "Usuario no registrado\n";
            break;
            case 0:
                echo "Error en los datos\n";
            break;
            case 1:
                echo "Verificado\n";
            break;
        }
    }
}

?>