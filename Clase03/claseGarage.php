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
                    return true;
                }
            }
        }
        else
        {
            return false;
        } 
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
}
?>