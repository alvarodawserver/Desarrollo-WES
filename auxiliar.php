<?php
const OPS = ['+' => 'Suma','-'=> 'Resta','/'=> 'División','*'=> 'Multiplicación'];
$error = [];

/**
 * Calcula el resultado de la operación  definida en $oper 
 * sobre los operandos $op1 y $op2
 * @param string $op1
 * @param string $op2
 * @param string $oper
 */
function calcular_resultado(string $op1,string $op2, string $oper){
    
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
 * @param string $par
 * @return string|null
 */
function obtener_get(string $par){ 
    return isset($_GET[$par]) ? trim($_GET[$par]) : null; 
}
/**
 * Valida el primer operador
 * @param mixed $op1
 * @param mixed $error
 * @return void
 */
function validar_op1(string $op1,array &$error){
    if(empty($op1)){
        $error['op1'] = 'El primer operando es obligatorio.';
    }else if(!is_numeric($op1)){    
        $error['op1'] = 'El primer operando no es número válido.';
    }
}
/**
 * Valida el segundo operador
 * @param mixed $op2
 * @param mixed $error
 * @return void
 */
function validar_op2(string $op2,array &$error){
    if(empty($op2)){
        $error['op2'] = 'El segundo operando es obligatorio.';
    }else if(!is_numeric($op2)){    
        $error['op2'] = 'El segundo operando no es número válido.';
    }
}

/**
 * Valida el operadoor
 * @param mixed $oper
 * @param mixed $error
 * @return void
 */
function validar_oper(string $oper,array &$error){
    if(empty($oper)){
        $error['oper'] = 'La operación es obligatoria.';
    }else if(!key_exists($oper,OPS)){    
        $error['oper'] = 'La operación no existe.';
    }
}

/**
 * Muestra los errores 
 * @param mixed $error
 * @return void
 */
function mostrar_errores(array $error){ 
    foreach($error as $elem => $mensaje){ ?>
        <h3>Error: <?= $mensaje ?></h3><?php
    }
}

/**
 * Dibuja el formulario
 * @param mixed $op1
 * @param mixed $op2
 * @param mixed $oper
 * @return void
 */
function dibujar_formulario(string $op1,string $op2,string $oper){
    ?>
    <form action="" method="get">  <!--Si se deja el action en vacío se entiende que el server se llama a sí mismo -->
        <label for="op1">Numero1: </label>
        <input  type="text"  name="op1" id="op1" value="<?= $op1 ?>">
        <br>

        <label for="op2" method="get">Numero2: </label>
        <input type="text" name="op2" id="op2" value= "<?= $op2 ?>">
        <br>

        <label for="oper" method="get">Operacion: </label>
        <select name="oper" id="oper">
            <?php foreach(OPS as $clave => $valor): ?>
                <option value="<?=$clave?>"<?= selected($oper,$clave)?>><?=$valor?> </option>
            <?php endforeach ?>
        </select>
        <br>

        <button type="submit">Calcular</button>
    </form>


<?php
}

function selected(string $oper,string $v){
    return $oper == $v ? 'selected':'';
}

function mostrar_resultado(string $op1,string $op2, string $oper,int|float $result){ ?>
    <h3>El resultado de <?= "$op1 $oper  $op2" ?> = <?= $result ?> </h3>
<?php }
