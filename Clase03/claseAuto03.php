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
        if ($fecha == "") {
            $this->_fecha = date("d-m-Y");
        } else {
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
        if ($auto1->_marca == $auto2->_marca) {
            return true;
        } else {
            return false;
        }
    }
    public static function Add(Auto $auto1, Auto $auto2)
    {
        $sumaPrecios = 0;

        if (($auto1->_marca == $auto2->_marca) && ($auto1->_color == $auto2->_color)) {
            $sumaPrecios = $auto1->_precio + $auto2->_precio;
        }
        return $sumaPrecios;
    }
    public static function AutoAString(Auto $autoNuevo)
    {
        
        $autoDatos = array(
            $autoNuevo->_marca,
            $autoNuevo->_color,
            $autoNuevo->_precio,
            $autoNuevo->_fecha
        );
        $autoString = implode(",", $autoDatos);

        return $autoString;
    }
    public static function AutosEnString($arrayAutos)
    {
        $stringAutos = "";
        if(sizeof($arrayAutos) != 0)
        {
            foreach($arrayAutos as $i)
            {
                $stringAutos .= Auto:: AutoAString($i)."\n";
            }    
        }
        return $stringAutos;
    }
    public static function AltaUnAuto(Auto $autoNuevo, $path)
    {
        $autoString = Auto:: AutoAString($autoNuevo);
        $archivo = fopen($path, "w");

        if ($archivo == FALSE) {
            echo "No se creo el archivo<br>";
        } else 
        {
            if ((fwrite($archivo, $autoString)) !== FALSE) 
            {
                echo "El auto se guardo correctamente<br>";
            }
        }
        fclose($archivo);
    }
    public static function AltaAutos($arrayAutos, $path)
    {
        $autoString = Auto:: AutosEnString($arrayAutos);
        $archivo = fopen($path, "w");

        if ($archivo == FALSE) {
            echo "No se creo el archivo<br>";
        } else 
        {
            if ((fwrite($archivo, $autoString)) !== FALSE) 
            {
                echo "Los autos se guardaron correctamente<br>";
            }
        }
        fclose($archivo);
    }
    public static function LeerCsv($path)
    {
        $arrayAutos = array();
        $archivo = fopen($path, "r");
        if($archivo == FALSE)
        {
            echo "El archivo no existe";
        }
        else
        {
            
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) 
            {
                $numero = count($datos);
                
                $autoNuevo = new Auto($datos[0], $datos[1], $datos[2], $datos[3]);
                
                array_push($arrayAutos, $autoNuevo);  
            }
            
        }
        return $arrayAutos;

    }
    public function Compare(Auto $auto1, Auto $auto2)
    {
        if(($auto1->_marca == $auto2->_marca) && ($auto1->_color == $auto2->_color) && ($auto1->_precio == $auto2->_precio))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}
