<?php
$dia = date("d");
$mes = date("m");
$anio = date("Y");
$estacion;
echo "Fecha: ", $dia, "/", $mes, "/", $anio, "<br>";
echo "Fecha: ", $dia, "-", $mes, "-", $anio, "<br>";
echo "Fecha: ", $dia, ",", $mes, ",", $anio, "<br>";

switch($mes)
{
    case 1:
        $estacion = "VERANO";
        break;
    case 2:
        $estacion = "VERANO";
        break;
    case 3:
        if($dia < 21)
        {
            $estacion = "VERANO";
        }
        else
        {
            $estacion = "OTONIO";
        }
        break;
    case 4:
        $estacion = "OTONIO";
        break;
    case 5:
        $estacion = "OTONIO";
        break;
    case 6:
        if($dia < 21)
        {
            $estacion = "OTONIO";
        }
        else
        {
            $estacion = "INVIERNO";
        }
        break;
    case 7:
        $estacion = "INVIERNO";
        break;
    case 8:
        $estacion = "INVIERNO";
        break;
    case 9:
        if($dia < 21)
        {
            $estacion = "INVIERNO";
        }
        else
        {
            $estacion = "PRIMAVERA";
        }
        break;
    case 10:
        $estacion = "PRIMAVERA";
        break;
    case 11:
        $estacion = "PRIMAVERA";
        break;
    case 12:
        if($dia < 21)
        {
            $estacion = "PRIMAVERA";
        }
        else
        {
            $estacion = "VERANO";
        }
        break;

    }
    echo "Estacion del año: ", $estacion, "<br>";
?>