<?php
function POST_altaProducto(){
    if(!isset($_POST['codigo'], $_POST['nombre'], $_POST['tipo'], $_POST['stock'], $_POST['precio'])){
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $codigo = $_POST['codigo'];
        $nombre = $_POST['nombre'];
        $tipo = $_POST['tipo'];
        $stock = $_POST['stock'];
        $precio = $_POST['precio'];

        $producto = Producto::TraerUnProductoPorCodigo($codigo);
        if($producto != null){
            $nuevoStock = $producto->stock + $stock;
            if(Producto::AgregarStock($codigo, $nuevoStock) != null){
                echo "Stock actualizado\n";
            }
            else{
                echo "Algo salio mal\n";
            }
        }
        else{
            $producto = new Producto($codigo, $nombre, $tipo, $stock, $precio);
            $retorno = $producto->InsertarNuevoProducto();
            if($retorno == null){
                echo "Algo salio mal\n";
            }
            else{
                echo "Producto Ingresado\n";
            }
        }

    }
}

?>