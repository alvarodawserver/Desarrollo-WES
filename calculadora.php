<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $op1 = trim($_GET['op1']);
        $op2 = trim($_GET['op2']);
        $oper = trim($_GET['oper']);
        $result = "";
        if($op2 != 0){
            switch ($oper) {
                case '+': $result = $op1 + $op2; break;
                case '-': $result = $op1 - $op2; break;
                case '*': $result = $op1 * $op2; break;
                case '/': $result = $op1 / $op2; break;
            }
        }
    ?>
    <?php if(isset($result)): ?>
        <h3>El resultado de <?= "$op1 $oper $op2 " ?> es <?= $result ?></h3>
    <?php else: ?>
        <h3>El símbolo "<?= $oper ?>" no existe</h3>
    <?php endif ?>
</body>
</html>