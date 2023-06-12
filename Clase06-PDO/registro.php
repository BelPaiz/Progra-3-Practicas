<?php
function POST_registroUsuario(){
    if(!isset($_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['mail'], $_POST['localidad']))
    {
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $clave = $_POST['clave'];
        $mail = $_POST['mail'];
        $localidad = $_POST['localidad'];

        $user = new Usuario($nombre, $apellido, $clave, $mail, $localidad);
        $idCreado = $user->InsertarUsuario();
        if($idCreado == null){
            echo "Algo salio mal\n";
        }
        else{
            echo "Usuario guardado con exito, ID: ", $idCreado, "\n";
        }

    }
}

?>