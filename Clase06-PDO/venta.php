<?php

use Venta as GlobalVenta;

class Venta
{
    public $codigoProducto;
    public $id_usuario;
    public $cantidad;
    public $id;

    public function __construct($codigoProducto, $id_usuario, $cantidad, $id = null)
    {
        $this->codigoProducto = $codigoProducto;
        $this->id_usuario = $id_usuario;
        $this->cantidad = $cantidad;
        if($id != null){
            $this->id = $id;
        }
    }
    public function InsertarVenta()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into ventas (codigo_producto,id_usuario,cantidad)values('$this->codigoProducto','$this->id_usuario','$this->cantidad')");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
    public static function TraerTodasLasVentas()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select codigo_producto as codigoProducto, id_usuario as id_usuario, cantidad as cantidad, id as id from ventas");
        $consulta->execute();
        $arrayObtenido = array();
        $ventas = array();
        $arrayObtenido = $consulta->fetchAll(PDO::FETCH_OBJ);
        foreach($arrayObtenido as $i){
            $venta = new Venta($i->codigoProducto, $i->id_usuario, $i->cantidad, $i->id);
            $ventas[] = $venta;
        }
        return $ventas;
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
                echo "Ventas guardados en archivo Json\n";
            }
        }
        fclose($archivo);
    }

}
?>