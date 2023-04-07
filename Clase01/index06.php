<?php
$sumatoria;
$promedio;
$numeros = [];
for($i = 0; $i < 5; $i++)
{
    $num = rand(0,10);
    array_push($numeros, $num);
    echo $num , "<br>";
    
}
$sumatoria = array_sum($numeros);
$promedio = $sumatoria / 5;

if($promedio > 6)
{
    echo "El promedio es mayor a 6";
}
else if($promedio < 6)
{
    echo "El promedio es menor a 6";
}
else
{
    echo "El promedio es igual a 6";
}
?>