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
        <input  type="text"  name="op1" id="op1" value="<?= $op1 ?>">
        <br>

        <label for="op2" method="get">Numero2: </label>
        <input type="text" name="op2" id="op2" value= "<?= $op2 ?>">
        <br>

        <label for="oper" method="get">Operacion: </label>
        <select name="oper" id="oper">
            <option value="+" <?= $oper == '+'? 'selected': ''?>>Suma</option>
            <option value="-"<?= $oper == '-'? 'selected': ''?>>Resta</option>
            <option value="*"<?= $oper == '*'? 'selected': ''?>>Multiplicación</option>
            <option value="/"<?= $oper == '/'? 'selected': ''?>>División</option>
        </select>
        <br>

        <button type="submit">Calcular</button>
    </form>
    <?php 
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
