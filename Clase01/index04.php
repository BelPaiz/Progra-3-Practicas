<?php
$operador = '/';
$op1 = 6;
$op2 = 5;
$resultado = 0;

switch ($operador) {
    case '+':
        $resultado = $op1 + $op2;
        break;
    
    case '-':
        $resultado = $op1 - $op2;
        break;
    case '/':

        if($op2 == 0)
        {
            echo "ERROR! La division por 0 no esta definida <br>";
            $resultado = NULL;
        }
        else
        {
            $resultado = $op1 / $op2;
        }
        break;
    case '*':
        $resultado = $op1 * $op2;
        break;
}
if($resultado != NULL)
{
    echo $op1, $operador, $op2, " = ", $resultado;
}

?>