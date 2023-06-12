<?php
function POST_realizarVenta(){
    if(!isset($_POST['codigo'], $_POST['id_usuario'], $_POST['cantidad'])){
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $codigo = $_POST['codigo'];
        $id_usuario = $_POST['id_usuario'];
        $cantidad =  $_POST['cantidad'];

        $usuario = Usuario::TraerUnUsuarioId($id_usuario);
        if($usuario == null){
            echo "El usuario no existe\n";
        }
        else{
            $producto = Producto::TraerUnProductoPorCodigo($codigo);
            if($producto == null){
                echo "El producto no existe\n";
            }
            else{
                if($producto->stock <= $cantidad){
                    echo "No hay stock\n";
                }
                else{
                    $venta = new Venta($codigo, $id_usuario, $cantidad);
                    $retorno = $venta->InsertarVenta();
                    if($retorno != null){
                      echo "Venta realizada\n";  
                    }
                    else{
                        echo "No se pudo realizar\n";
                    }
                }
                
            }
        }
    }
}
?>