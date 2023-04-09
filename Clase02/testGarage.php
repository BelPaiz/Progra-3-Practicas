<?php
include "claseGarage.php";

$auto1 = new Auto("Toyota", "Azul");
$auto2 = new Auto("Toyota", "Rojo");


$auto3 = new Auto("Fiat", "Rojo", 12563);
$auto4 = new Auto("Fiat", "Rojo", 56983);
$fecha5 = date("d-m-Y");
$auto5 = new Auto("Ford", "Negro", 45688, $fecha5);

$garage1 = new Garage("Golaso", 3265);
echo $garage1->Add($auto1);
echo $garage1->Add($auto1);
echo $garage1->Add($auto2);
echo $garage1->Add($auto3);
$garage1->MostrarGarage();
echo $garage1->Remove($auto1);
$garage1->MostrarGarage();

?>