<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
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
                default: $result = null;
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

        function mostrar_error(){
            echo "<h3>El operador no es correcto </h3>";
        }
        
        function mostrar_resultado($op1,$op2,$oper,$result){
            echo "<h3>El resultado de $op1 $oper $op2 = $result</h3>";
        }

        $op1 = obtener_get('op1');
        $op2 = obtener_get('op2');
        $oper = obtener_get('oper');

        
    ?>

    <form action="" method="get">  <!--Si se deja el action en vacío se entiende que el server se llama a sí mismo -->
        <label for="op1">Numero1: </label>
        <input  type="text"  name="op1" id="op1">
        <br>

        <label for="op2" method="get">Numero2: </label>
        <input type="text" name="op2" id="op2">
        <br>

        <label for="oper" method="get">Operacion: </label>
        <select name="oper" id="oper">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
            <option value="/">División</option>
        </select>
        <br>

        <button type="submit">Calcular</button>
    </form>
    <?php 
        if(isset($op1,$op2,$oper)){ //Si no es la primera vez que entra
            $result = calcular_resultado($op1,$op2,$oper);
            if(!isset($result)){ //Si la operación es incorrecta
                mostrar_error();
            }else{
                mostrar_resultado($op1,$op2,$oper,$result);
            }
        }
    
    
    ?>
</body>
</html>
