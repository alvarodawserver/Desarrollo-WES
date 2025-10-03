<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora</title>
</head>
<body>
    <?php
        require_once 'auxiliar.php';

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
            if(empty($op1)){
                $error['op1'] = 'El primer operando es obligatorio.';
            }else if(!is_numeric($op1)){    
                $error['op1'] = 'El primer operando no es número válido.';
            }

            if(empty($op2)){
                $error['op2'] = 'El segundo operando es obligatorio.';
            }else if(!is_numeric($op2)){    
                $error['op2'] = 'El segundo operando no es número válido.';
            }


            if(empty($oper)){
                $error['oper'] = 'La operación es obligatoria.';
            }else if(!in_array($ooper,OPS)){
                $error['oper'] = 'La operación no existe';
            }
            
            if(empty($error)){
                $result = calcular_resultado($op1,$op2,$oper);
                mostrar_resultado($op1,$op2,$oper,$result);
            }else{
                mostrar_error($error);
            }
    
        }
    ?>
</body>
</html>
