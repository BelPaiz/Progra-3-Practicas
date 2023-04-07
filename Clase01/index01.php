<?php 
$numero = 1;
$suma = 0;
$numerosSumados = 1;
while (($suma = $suma += $numero) <= 1000)
{

    echo "Se sumo: ", $numero, "<br>";
    $numero ++;
    $numerosSumados ++;
}
echo "En total se sumaron: ", $numerosSumados - 1, " numeros.";
?>