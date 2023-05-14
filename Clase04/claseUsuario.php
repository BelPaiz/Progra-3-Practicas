<?php
class Usuario
{
    public $nombre;
    public $clave;
    public $mail;
    public $fechaDeRegistro;
    public $id;
 

    public function __construct($nombre, $clave, $mail, $id)
    {
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->fechaDeRegistro =  date("d-m-Y");
        $this->id = $id;
        $id++;
    }
    public function ToJson(){
        $objetoJson = json_encode($this);
        return $objetoJson;
    }
    public static function UsuariosToJson($array){
        $arrayUsuariosJson = array();
        foreach($array as $i){
            $arrayUsuariosJson += $i->ToJson();
        }
        return $arrayUsuariosJson;
    }
    public static function AltaUsuario($user, $path){
        $userJson = $user->ToJson();
        echo $userJson;
        $archivo = fopen($path, "w");

        if ($archivo == FALSE) {
            echo "No se creo el archivo\n";
        } else 
        {
            if ((fwrite($archivo, $userJson)) !== FALSE) 
            {
                echo "El usuario se guardo correctamente\n";
            }
        }
        fclose($archivo);
    }
}
?>