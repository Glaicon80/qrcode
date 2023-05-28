<?php


try{

    $opcoes = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", //aqui é uma configuração caso o banco do servidor não estiver configurado para utf8, ele vai configurar
        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING // vai retornar os erros
        ); 

    $conn = new PDO('mysql:host='.SERVER.';dbname='.BANCO,USER,SENHA, $opcoes);

}catch(Exception $ex){

$echo = $ex;
}