<?php
include "usuario.php";
$path = "usuarios.csv";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    GET_crearUsuario($path);
}


function GET_crearUsuario($path){
    $tipo = $_GET['tipo'];
    
    if (empty($tipo)) {
        echo "Especifique tipo de dato";
    } else {
        if($tipo == 'usuarios')
        {
            $arrayUsuarios = Usuario::LeerCsvUsuarios($path);
            echo "Usuarios: \n";
            foreach($arrayUsuarios as $user)
            {
                echo "nombre: ", $user->getNombre(), "\n";
                echo "clave: ", $user->getClave(), "\n";
                echo "mail: ", $user->getMail(), "\n";
            }
        }
    }
}
?>