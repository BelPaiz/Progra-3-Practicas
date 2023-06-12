<?php
function GET_listar($path)
{
    if(!isset($_GET['tipo']))
    {
        echo "ERROR!! Carga de datos invalida";
    }
    else{
        $tipo = $_GET['tipo'];
        switch($tipo){
            case "usuarios":
                $usuarios = Usuario::TraerTodoLosUsuarios();
                Usuario::GuardarEnJSON($usuarios, $path);
            break;
            case "productos":
                $productos = Producto::TraerTodosLosProductos();
                Producto::GuardarEnJSON($productos, $path);
            break;
            case "ventas":
                $ventas = Venta::TraerTodasLasVentas();
                Venta::GuardarEnJSON($ventas, $path);
            break;
        }
    }
}

?>