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

function validar_op1($op1,&$error){
    if(empty($op1)){
        $error['op1'] = 'El primer operando es obligatorio.';
    }else if(!is_numeric($op1)){    
        $error['op1'] = 'El primer operando no es número válido.';
    }
}

function validar_op2($op2,&$error){
    if(empty($op2)){
        $error['op2'] = 'El segundo operando es obligatorio.';
    }else if(!is_numeric($op2)){    
        $error['op2'] = 'El segundo operando no es número válido.';
    }
}


function validar_oper($oper,&$error){
    if(empty($oper)){
        $error['oper'] = 'La operación es obligatoria.';
    }else if(!in_array($oper,OPS)){    
        $error['oper'] = 'La operación no existe.';
    }
}


function mostrar_errores($error){ 
    foreach($error as $elem => $mensaje){
        echo "<h3>Error: $mensaje </h3>";
    }
}

function mostrar_resultado($op1,$op2,$oper,$result){ ?>
    <h3>El resultado de <?= "$op1 $oper  $op2" ?> = <?= $result ?> </h3>
<?php }
