<?php
$a = 1;
$b = 1;
$c = 5;

if($a > $b && $a < $c)
{
    echo "El valor del medio es: ", $a;
}
else
{
    if($b > $a && $b < $c)
    {
        echo "El valor del medio es: ", $b;
    }
    else
    {
        if($c > $a && $c < $b)
        {
                echo "El valor del medio es: ", $c;
        }
        else
        {
            echo "No hay valor del medio";
        }
    }
}

?>