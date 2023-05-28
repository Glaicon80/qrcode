<?php

use chillerlan\QRCode\{QRCode, QROptions};

session_start();

include './vendor/autoload.php';
include './config.php';
include './conexao.php';



$nome_prod = filter_input(INPUT_POST, 'nome_prod', FILTER_SANITIZE_STRING);
$slug = filter_input(INPUT_POST,'slug', FILTER_SANITIZE_STRING);


$url = URL.$slug;

echo $url;


$myOptions = [
	'version'    => 5,
	'outputType' => QRCode::OUTPUT_MARKUP_SVG,
	'eccLevel'   => QRCode::ECC_L,
];

$options = new QROptions($myOptions);


$qrcode = new QRCode($options);

$nome_img = $slug.'.svg';

$qrcode->render($url,'imagensQrcode/'.$nome_img);

$query_prod = 'INSERT INTO produtos (nome_prod,slug,nome_img_qr) VALUES (:nome_prod,:slug,:nome_img_qr)';

$cadastrar =  $conn->prepare($query_prod);

$cadastrar -> bindParam(':nome_prod',$nome_prod, PDO::PARAM_STR);
$cadastrar -> bindParam(':slug',$slug, PDO::PARAM_STR);
$cadastrar -> bindParam(':nome_img_qr',$nome_img, PDO::PARAM_STR);

if($cadastrar->execute()){
    $_SESSION['msg'] ="<p style='color: blue;'>Produto foi cadastrado com sucesso!!</p>";
    header('Location: list_prod.php');
}else{
    $_SESSION['msg'] ="<p style='color: red;'>Erro: produto não foi cadastrado com sucesso!!</p>";
    header('Location: index.php');
}
