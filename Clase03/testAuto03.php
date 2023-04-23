<?php

include "claseAuto03.php";
$path = "altaAutos.csv";

$auto1 = new Auto("Toyota", "Azul");
$auto2 = new Auto("Toyota", "Rojo");


$auto3 = new Auto("Fiat", "Rojo", 12563);
$auto4 = new Auto("Fiat", "Rojo", 56983);
$fecha5 = date("d-m-Y");
$auto5 = new Auto("Ford", "Negro", 45688, $fecha5);

$auto5->AgregarImpuestos(1500);
$auto4->AgregarImpuestos(1500);
$auto3->AgregarImpuestos(1500);
$arrayAutosAltas = array($auto1, $auto2, $auto3, $auto4, $auto5);

Auto ::AltaAutos($arrayAutosAltas, $path);

$arrayAutos = Auto::LeerCsv($path);

foreach($arrayAutos as $i)
{
    Auto::MostrarAuto($i);
}

?>