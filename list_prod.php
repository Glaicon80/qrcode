<?php
include './config.php';
include './conexao.php';
session_start();
?>

session_start();
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Qrcode</title>
</head>
<body>
 
<a href="index.php">Cadastrar</a><br><br>

<?php

echo "<h1>Listar produtos</h1>";

if(isset($_SESSION['msg']) ){
    echo $_SESSION['msg'];
    unset($_SESSION['msg'] );
}

$query_prod = "SELECT * FROM produtos";

$resultado_prod = $conn->prepare($query_prod);

$resultado_prod->execute();

while($linha_prod = $resultado_prod->fetch(PDO::FETCH_ASSOC)){

    echo "ID: ".$linha_prod['id']."<br>";
    echo "nome do produto: ".$linha_prod['nome_prod']."<br>";
    echo "<img style='width:200px; height:200px;' src='".URL."imagensQrcode/".$linha_prod['nome_img_qr']." '><br><hr>";
}
?>
    
</body>
</html>