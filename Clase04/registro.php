<?php
/* Paiz Belen 
Aplicación No 23 (Registro JSON)
Archivo: registro.php
método:POST
Recibe los datos del usuario(nombre, clave,mail )por POST ,
crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato con la
fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer el alta,
guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
Usuario/Fotos/.
retorna si se pudo agregar o no.
Cada usuario se agrega en un renglón diferente al anterior.
Hacer los métodos necesarios en la clase usuario.
*/
include "claseUsuario.php";
$path = "usuarios.json";
$rutaImagen = "Clase04/Usuario/fotos/";
$ultimoId = 1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    POST_crearUsuario($path, $ultimoId, $rutaImagen);
}


function POST_crearUsuario($path, $id, $rutaImagen){
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];
    $email = $_POST['mail'];
    $imagen = $_FILES['imagen'];
    $destino = $rutaImagen.$imagen['name'];
    print_r($imagen);

    
    if (empty($nombre) || empty($clave) || empty($email) || empty($imagen)) {
        echo "Datos incompletos.";
    } else {
        $usuario = new Usuario($nombre, $clave, $email, $id);
        Usuario:: AltaUsuario($usuario, $path);
        if(move_uploaded_file($imagen['tmp_name'], $destino))
        {
            echo "Se guardo la imagen en: ", $destino;
        }
        else{
            echo "La imagen sigue en: ", $imagen['tmp_name'];
        }
       
        echo "El alta ha sido realizada exitosamente.";  
    }
}
?>