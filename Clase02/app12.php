<?php
function InvertirPalabras($arr = [])
{

    if(is_null($arr))
    {
        echo "Ingreso de array invalido";
        return $arr;
    }
    else
    {
        $nuevoArr = array_reverse($arr);
        return $nuevoArr;
    }

}
$palabra = ['M', 'E', 'S', 'A'];
$resultado = InvertirPalabras($palabra);
foreach($resultado as $i)
{
    echo $i;
}
?>