<?php
include "claseAuto03.php";
class Garage
{
    private $_razonSocial;
    private $_precioPorHora;
    private $_autos = array();

    public function __construct($razonSocial, $precioHora = 0)
    {
        $this->_razonSocial = $razonSocial;
        $this->_precioPorHora = $precioHora;
        
    }
    public function MostrarGarage()
    {
        echo "Razon Social: ", $this->_razonSocial, "<br>";
        echo "Precio por hora: ", $this->_precioPorHora, "<br>";
        echo "Autos: <br>";
        foreach($this->_autos as $i)
        {
            Auto ::MostrarAuto($i);
        }
    }
    public function Equals(Auto $auto)
    {    
        if(sizeof($this->_autos) != 0)
        {
            foreach($this->_autos as $i)
            {
                if($auto->Compare($auto, $i))
                {
                    return true;, $datos[1]
    }
    public function Add(Auto $auto)
    {
        if(!($this->Equals($auto)))
        {
            array_push($this->_autos, $auto);
            return "El auto se agrego correctamente al garage <br>";
        }
        else
        {
            return "El auto ya estaba en el garage <br>";
        }
    }

    public function Remove(Auto $auto)
    {
        $key = 0;
        if(sizeof($this->_autos) != 0)
        {
            foreach($this->_autos as $i)
            {
                $key ++;
                if($auto->Compare($auto, $i))
                {
                    
                    unset($this->_autos[$key-1]);
                    return "El auto fue removido del garage<br>";
                }
                
            }
            return "El auto no se encontraba en el garage<br>";
        }
        else
        {
            return "El garage esta vacio<br>";
        } 
    }
    public static function GarageAString(Garage $g)
    {
        $gDatos = array(
            $g->_razonSocial,
            $g->_precioPorHora,
            Auto:: AutosEnString($g->_autos)

        );
        $garageString = implode(",", $gDatos);
        return $garageString;
    }
    public static function AltaGarage(Garage $g, $path)
    {
        $garageEnString = Garage:: GarageAString($g);
        $archivo = fopen($path, "w");
        if ($archivo == FALSE) {
            echo "No se creo el archivo<br>";
        } else 
        {
            if ((fwrite($archivo, $garageEnString)) !== FALSE) 
            {
                echo "El garage se guardo correctamente<br>";
            }
        }
        fclose($archivo);
    }
    public static function LeerGarageDeCsv($path)
    {
        $arrayGarage = array();
        $archivo = fopen($path, "r");
        if($archivo == FALSE)
        {
            echo "El archivo no existe";
        }
        else
        {
            echo "El archivo existe";
            while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) 
            {
                $numero = count($datos);
                echo "", $datos[0], $datos[1];
                $garageNew = new Garage($datos[0], $datos[1]);
                // for($i = 2; $i<=$numero; i+4)
                // {
                //     $autoNuevo = new Auto($datos[i], $datos[i+1], $datos[i+2], $datos[i+3]);
                //     array_push($garageNew->_autos, $autoNuevo);
                // }
                
                array_push($arrayGarage, $garageNew);  
            }
            
        }
        return $arrayGarage;

    }
}
?>