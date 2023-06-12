<?php
function POST_modificarUsuario(){
    if(!isset($_POST['nombre'], $_POST['claveVieja'], $_POST['claveNueva'], $_POST['mail'])){
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $nombre = $_POST['nombre'];
        $claveVieja = $_POST['claveVieja'];
        $claveNueva = $_POST['claveNueva'];
        $mail = $_POST['mail'];

        $user = Usuario::TraerUnUsuarioMail($mail);
        if($user != null){
            $login = $user->ConfirmarLogin($claveVieja);
            if($login == 1){
                $user->ModificarUsuario($claveNueva);
                echo "Usuario modificado con exito\n";
            }
        }
        else{
            echo "El usuario no existe\n";
        }
    }
}


?>