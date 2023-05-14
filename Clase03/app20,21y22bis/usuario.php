<?php
class Usuario
{
    private $_nombre;
    private $_clave;
    private $_mail;

    public function __construct($nombre, $clave, $mail)
    {
        if(is_string($nombre) && is_string($clave) && is_string($mail))
        {
            $this->_nombre = $nombre;
            $this->_clave = $clave;
            $this->_mail = $mail;
        }
    }
    #region propiedades
    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }
    public function getNombre()
    {
        return $this->_nombre;
    }
    public function setClave($clave)
    {
        $this->_clave = $clave;
    }
    public function getClave()
    {
        return $this->_clave;
    }
    public function setMail($mail)
    {
        $this->_mail = $mail;
    }
    public function getMail()
    {
        return $this->_mail;
    }
    #endregion

    public static function Add($user, $arrray)
    {
        if($user != null)
        {
            $arrray.array_push($arrray, $user);
            return true;
        }
        return false;
    }

    public static function UsuarioAString($user)
    {
        $datosUser = array(
            $user->getNombre(),
            $user->getClave(),
            $user->getMail()
        );
        $datosAString = implode(",", $datosUser);
        return $datosAString;
    }

    public static function UsuariosEnString($array)
    {
        $string = "";
        if(sizeof($array) != 0)
        {
            foreach($array as $i)
            {
                $string .= Usuario:: UsuarioAString($i)."\n";
            }    
        }
        return $string;
    }
    public static function AltaUsuario($nuevoUsuario, $path)
    {
        $userString = Usuario:: UsuarioAString($nuevoUsuario);
        $archivo = fopen($path, "a");

        if ($archivo == FALSE) {
            echo "No se creo el archivo\n";
        } else 
        {
            if ((fwrite($archivo, $userString.PHP_EOL)) !== FALSE) 
            {
                echo "El usuario se guardo correctamente\n";
            }
        }
        fclose($archivo);
    }
    public static function Altas($array, $path)
    {
        $string = Usuario:: UsuariosEnString($array);
        $archivo = fopen($path, "w");

        if ($archivo == FALSE) {
            echo "No se creo el archivo<br>";
        } else 
        {
            if ((fwrite($archivo, $string)) !== FALSE) 
            {
                echo "Los usuarios se guardaron correctamente<br>";
            }
        }
        fclose($archivo);
    }
    public static function LeerCsvUsuarios($path){
        $arrayUsuarios = array();
        $archivo = fopen($path, "r");
        if($archivo == FALSE)
        {
            echo "El archivo no existe";
        }
        else
        {
            while (!feof($archivo))
            {
                $datos = fgets($archivo);
                if($datos != " ")
                {
                    $buffer = explode(",", $datos);
                    $buffer[2] = preg_replace("/[\r\n|\n|\r]+/", "", $buffer[2]);
                    $nuevoUsuario = new Usuario($buffer[0], $buffer[1], $buffer[2]);
                    array_push($arrayUsuarios, $nuevoUsuario); 
                }
            }
            fclose($archivo);
        }
        return $arrayUsuarios;
    }
    public static function CompareUsuarios($array, $clave, $mail){
        $retorno = -1;
        foreach($array as $user){
                $mailUser = $user->getMail();
                $claveUser = $user->getClave();
            if($mailUser == $mail && $claveUser == $clave){
                $retorno = 1;
                break;
            }
            else{
                if($mailUser == $mail){
                    $retorno = 0;
                    break;
                }
            }
        }
        return $retorno;
    }

}
?>