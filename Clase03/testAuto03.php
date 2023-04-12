<?php

include "claseAuto03.php";
$path = "opt/lampp/htdocs/Clase03/altaAutos.csv";
$retorno = fopen($path , "w");
if($retorno == FALSE)
{
    echo "No se creo el archivo";
}
else
{
    echo fwrite($retorno,"Prueba de guardado");

}
fclose($retorno);

$auto1 = new Auto("Toyota", "Azul");
$auto2 = new Auto("Toyota", "Rojo");


$auto3 = new Auto("Fiat", "Rojo", 12563);
$auto4 = new Auto("Fiat", "Rojo", 56983);
$fecha5 = date("d-m-Y");
$auto5 = new Auto("Ford", "Negro", 45688, $fecha5);

$auto5->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto3->AgregarImpuestos(1500);

//Auto ::AltaAuto($auto1, $path);
?>