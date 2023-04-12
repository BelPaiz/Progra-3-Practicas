<?php
class Auto
{
    private $_color;
    private $_precio;
    private $_marca;
    private $_fecha;

    public function __construct($marca, $color, $precio = 0, $fecha = "")
    {
        $this->_marca = $marca;
        $this->_color = $color;
        $this->_precio = $precio;
        if($fecha == "")
        {
            $this->_fecha = date("d-m-Y");
        }
        else
        {
            $this->_fecha = $fecha;
        }
        
    }

    public function AgregarImpuestos($agrega)
    {
        $this->_precio += $agrega;
    }
    public static function MostrarAuto(Auto $auto)
    {
        echo "<br>Datos del auto: <br>";
        echo "Marca: ", $auto->_marca, "<br>";
        echo "Color: ", $auto->_color, "<br>";
        echo "Precio: ", $auto->_precio, "<br>";
        echo "Fecha: ", $auto->_fecha, "<br>";
        echo "<br>";
    }
    public function Equals(Auto $auto1, Auto $auto2)
    {
        if($auto1->_marca == $auto2->_marca)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public static function Add(Auto $auto1, Auto $auto2)
    {
        $sumaPrecios = 0;

        if(($auto1->_marca == $auto2->_marca) && ($auto1->_color == $auto2->_color))
        {
            $sumaPrecios = $auto1->_precio + $auto2->_precio;
        }
        return $sumaPrecios;
    }

    public static function AltaAuto($autoNuevo, $path)
    {

        $autoDatos = array(
            $autoNuevo->_marca,
            $autoNuevo->_color,
            $autoNuevo->_precio,
            $autoNuevo->_fecha);
        $autoString = implode(",", $autoDatos);
        echo $autoString;

        $archivo = fopen($path, "x");
        
        /*if((fwrite($archivo, $autoString))!== FALSE)
        {
            echo"El auto se guardo correctamente";
        }*/
        fclose($archivo);
    }

}
?>