<?php
function POST_modificarProducto(){
    if(!isset($_POST['codigoBarras'], $_POST['nombre'], $_POST['tipo'], $_POST['stock'], $_POST['precio'])){
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $codigo = $_POST['codigoBarras'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        $producto = Producto::TraerUnProductoPorCodigo($codigo);
        if($producto == null){
            echo "El producto no existe\n";
        }
        else{
            $producto->ModificarProducto($nombre, $tipo, $stock, $precio);
            echo "Producto modificado con Exito\n";
        }
    }
}
?>