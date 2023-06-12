<?php
include "usuario.php";
include "AccesoDatos.php";
include "producto.php";
include "venta.php";
$pathListado = "listado.json";

switch($_SERVER["REQUEST_METHOD"])
{
    case "POST":
        if(!isset($_POST['accion'])){
            echo "ERROR!! Carga de datos invalida1";
        }
        else{
            switch($_POST['accion'])
            {
                case "registro":
                    include "registro.php";
                    POST_registroUsuario();
                break;
                case "login":
                    include "login.php";
                    POST_loginUsuario();
                break;
                case "altaProducto":
                    include "altaProducto.php";
                    POST_altaProducto();
                break;
                case "realizarVenta":
                    include "realizarVenta.php";
                    POST_realizarVenta();
                break;
                case "modificarUsuario":
                    include "modificarUsuario.php";
                    POST_modificarUsuario();
                break;
                case "modificarProducto":
                    include "modificarProducto.php";
                    POST_modificarProducto();
                break;
            }
        }
    break;
    case "GET":
        if(!isset($_GET['accion'])){
            echo "ERROR!! Carga de datos invalida1";
        }
        else{
            switch($_GET['accion'])
            {
                case "listar":
                    include "listado.php";
                    GET_listar($pathListado);
                break;
                
            }
        }
    break;

}

?>