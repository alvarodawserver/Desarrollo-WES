<?php
const OPS = ['+','-','/','*'];
$error = [];

/**
 * Calcula el resultado de la operación  definida en $oper 
 * sobre los operandos $op1 y $op2
 * @param mixed $op1
 * @param mixed $op2
 * @param mixed $oper
 */
function calcular_resultado($op1,$op2,$oper){
    
    $result = "";
    switch ($oper) {
        case '+': $result = $op1 + $op2; break;
        case '-': $result = $op1 - $op2; break;
        case '*': $result = $op1 * $op2; break;
        case '/': $result = round($op1 / $op2); break;
    }
        return $result;
}
/**
 * Obtiene los datos de $_GET.
 * Devuelve null si el parámetro no existe.
 * @param mixed $par
 * @return string|null
 */
function obtener_get($par){ 
    return isset($_GET[$par]) ? trim($_GET[$par]) : null; 
}

function validar_datos($op1,$op2,$oper){

}


function mostrar_error($error){ 
    foreach($error as $elem => $mensaje){
        echo "<h3>Error: $mensaje </h3>";
    }
}

function mostrar_resultado($op1,$op2,$oper,$result){ ?>
    <h3>El resultado de <?= "$op1 $oper  $op2" ?> = <?= $result ?> </h3>
<?php }
