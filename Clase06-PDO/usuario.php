<?php
class Usuario
{
    public $id;
    public $nombre;
    public $apellido;
    public $clave;
    public $mail;
    public $localidad;
    public $fechaRegistro;

    public function __construct($nombre, $apellido, $clave, $mail, $localidad, $fechaRegistro = null, $id = null)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->clave = $clave;
        $this->mail = $mail;
        $this->localidad = $localidad;
        if($fechaRegistro == null){
            $this->fechaRegistro =  date("Y-m-d");
        }
        else{
            $this->fechaRegistro = $fechaRegistro;
        }
        if($id != null){
            $this->id = $id;
        }
    }
    public function InsertarUsuario()
	{
		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
		$consulta =$objetoAccesoDato->RetornarConsulta("INSERT into usuarios (nombre,apellido,clave, mail, localidad, fecha_registro)values('$this->nombre','$this->apellido','$this->clave', '$this->mail', '$this->localidad', '$this->fechaRegistro')");
		$consulta->execute();
		return $objetoAccesoDato->RetornarUltimoIdInsertado();
	}
    public static function TraerTodoLosUsuarios()
	{
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select nombre as nombre, apellido as apellido, clave as clave, mail as mail, localidad as localidad, fecha_registro as fechaRegistro, id as id from usuarios");
        $consulta->execute();
        $arrayObtenido = array();
        $usuarios = array();
        $arrayObtenido = $consulta->fetchAll(PDO::FETCH_OBJ);
        foreach($arrayObtenido as $i){
            $usuario = new Usuario($i->nombre, $i->apellido, $i->clave, $i->mail, $i->localidad,$i->fechaRegistro, $i->id );
            $usuarios[] = $usuario;
        }
        return $usuarios;
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
                echo "Usuarios guardados en archivo Json\n";
            }
        }
        fclose($archivo);
    }
    public static function TraerUnUsuarioMail($mail) 
	{
        $usuario = null;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios where mail = ?");
        $consulta->bindValue(1, $mail, PDO::PARAM_STR);
        $consulta->execute();
        $usuarioBuscado= $consulta->fetchObject();
        if($usuarioBuscado != null){
            $usuario = new Usuario($usuarioBuscado->nombre, $usuarioBuscado->apellido, $usuarioBuscado->clave, $usuarioBuscado->mail, $usuarioBuscado->localidad,$usuarioBuscado->fecha_registro, $usuarioBuscado->id );
        }
        return $usuario;
	}
    public static function TraerUnUsuarioId($id) 
	{
        $usuario = null;
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("select * from usuarios where id = ?");
        $consulta->bindValue(1, $id, PDO::PARAM_STR);
        $consulta->execute();
        $usuarioBuscado= $consulta->fetchObject();
        if($usuarioBuscado != null){
            $usuario = new Usuario($usuarioBuscado->nombre, $usuarioBuscado->apellido, $usuarioBuscado->clave, $usuarioBuscado->mail, $usuarioBuscado->localidad,$usuarioBuscado->fecha_registro, $usuarioBuscado->id );
        }
        return $usuario;
	}
    public function ConfirmarLogin($clave)
    {
        $retorno = 0;
        if($this->clave == $clave){
           echo "Verificado\n"; 
           $retorno = 1;
        }
        else{
            echo "Clave incorrecta\n"; 
        }
        return $retorno;
    }
    public function ModificarUsuario($claveNueva){
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("update usuarios set clave = ? where id = ?");
        $consulta->bindValue(1, $claveNueva, PDO::PARAM_INT);
        $consulta->bindValue(2, $this->id, PDO::PARAM_INT);
        return$consulta->execute();
    }

}
?>