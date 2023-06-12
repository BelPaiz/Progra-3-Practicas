<?php
class Producto
{
    public $id;
    public $codigoBarras;
    public $nombre;
    public $tipo;
    public $stock;
    public $precio;
    public $fechaAlta;

    public function __construct($codigoBarras, $nombre, $tipo, $stock, $precio, $fechaAlta = null, $id = null)
    {
        $this->codigoBarras = $codigoBarras;
        $this->nombre = $nombre;
        $this->tipo = $tipo;
        $this->stock = $stock;
        $this->precio = $precio;
        if($fechaAlta == null){
            $this->fechaAlta =  date("Y-m-d");
        }
        else{
            $this->fechaAlta =  $fechaAlta;
        }
        if($id != null){
            $this->id = $id;
        }
    }
    public static function TraerUnProductoPorCodigo($codigo) 
	{
        $producto = null;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from productos where codigo_barras = ?");
        $consulta->bindValue(1, $codigo, PDO::PARAM_STR);
        $consulta->execute();
        $productoBuscado= $consulta->fetchObject();
        if($productoBuscado != null){
            $producto = new Producto($productoBuscado->codigo_barras, $productoBuscado->nombre, $productoBuscado->tipo, $productoBuscado->stock, $productoBuscado->precio, $productoBuscado->fecha_alta, $productoBuscado->id );
        }
        return $producto;
	}
    public static function AgregarStock($codigo, $stock){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("update productos set stock = ? where codigo_barras = ?");
        $consulta->bindValue(1, $stock, PDO::PARAM_INT);
        $consulta->bindValue(2, $codigo, PDO::PARAM_INT);
        return$consulta->execute();
    }
    public function InsertarNuevoProducto(){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("insert into productos (codigo_barras, nombre, tipo, stock, precio, fecha_alta) values (:codigoBarras,:nombre,:tipo,:stock,:precio,:fechaAlta) ");
        $consulta->bindValue(':codigoBarras', $this->codigoBarras, PDO::PARAM_INT);
        $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
        $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_INT);
        $consulta->bindValue(':stock', $this->stock, PDO::PARAM_INT);
        $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
        $consulta->bindValue(':fechaAlta', $this->fechaAlta, PDO::PARAM_STR);
        $consulta->execute();
        return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
    public static function TraerTodosLosProductos()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select codigo_barras as codigoBarras, nombre as nombre, tipo as tipo, stock as stock, precio as precio, fecha_alta as fechaAlta, id as id from productos");
        $consulta->execute();
        $arrayObtenido = array();
        $productos = array();
        $arrayObtenido = $consulta->fetchAll(PDO::FETCH_OBJ);
        foreach($arrayObtenido as $i){
            $producto = new Producto($i->codigoBarras, $i->nombre, $i->tipo, $i->stock, $i->precio,$i->fechaAlta, $i->id );
            $productos[] = $producto;
        }
        return $productos;
	}
    public static function GuardarEnJSON($array, $path){
        $datosJson = json_encode($array);
        $archivo = fopen($path, "w");

        if ($archivo == FALSE) {
            echo "No se creo el archivo\n";
        } else 
        {
            if ((fwrite($archivo, $datosJson)) !== FALSE) 
            {
                echo "Productos guardados en archivo Json\n";
            }
        }
        fclose($archivo);
    }
    public function ModificarProducto($nombre, $tipo, $stock, $precio){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("update productos set nombre = ?, tipo = ?, stock = ?, precio = ? where codigo_barras = ?");
        $consulta->bindValue(1, $nombre, PDO::PARAM_STR);
        $consulta->bindValue(2, $tipo, PDO::PARAM_STR);
        $consulta->bindValue(3, $stock, PDO::PARAM_INT);
        $consulta->bindValue(4, $precio, PDO::PARAM_INT);
        $consulta->bindValue(5, $this->codigoBarras, PDO::PARAM_INT);
        return$consulta->execute();
    }
}
?>