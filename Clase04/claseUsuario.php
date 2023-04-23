<?php
class Usuario
{
    public $nombre;
    public $clave;
    public $mail;
    public $fechaDeRegistro;
    public $id;

    public function __construct($nombre, $clave, $mail)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaDeRegistro =  date("d-m-Y");
        $this->id =   rand(0,10000);
    }
}
?>