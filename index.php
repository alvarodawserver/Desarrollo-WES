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
    
        
        dibujar_formulario($op1,$op2,$oper);



        if(isset($op1,$op2,$oper)){ //Si no es la primera vez que entra
            validar_op1($op1,$error);
            validar_op2($op2,$error);
            validar_oper($oper,$error);
            if(empty($error)){
                $result = calcular_resultado($op1,$op2,$oper);
                mostrar_resultado($op1,$op2,$oper,$result);
            }else{
                mostrar_errores($error);
            }
    
        }
    ?>
</body>
</html>
