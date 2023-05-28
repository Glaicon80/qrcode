<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qrcode</title>
</head>
<body>
    <a href="list_prod.php">Listar</a><br><br>
    <h1>Cadastrar produto</h1>
    <?php
    if(isset($_SESSION['msg']) ){
    echo $_SESSION['msg'];
    unset($_SESSION['msg'] );
    }
    ?>
    <form action="proc_prod.php" method="POST">
    <label for="">Nome do produto</label>
    <input type="text" name="nome_prod" id="" placeholder="nome do produto"><br><br>
    <label for="">Slug</label>
    <input type="text" name="slug" id="" placeholder="nome do produto sem caracteres especiais"><br><br>
    <input type="submit" value="Cadastrar">

    </form>
    
</body>
</html>