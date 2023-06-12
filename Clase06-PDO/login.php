<?php
function POST_loginUsuario(){
    if(!isset($_POST['clave'], $_POST['mail'])){
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $mail = $_POST['mail'];
        $clave = $_POST['clave'];

        $user = Usuario::TraerUnUsuarioMail($mail);
        if($user ==  null){
            echo "Usuario no registrado";
        }
        else{
            $user->ConfirmarLogin($clave);
        }
    }
}
?>