<?php 
include_once "conexao.php";

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$cep = $_POST['cep'];
$endereco = $_POST['endereco'];
$bairro = $_POST['bairro'];
$cidade = $_POST['cidade'];
// $estado = $_POST['estado'];
$contato = $_POST['contato'];

$sql = "INSERT INTO cliente (nome,cpf,cep,endereço,bairro,cidade,contato) 
        VALUES ('$nome','$cpf','$cep','$endereco','$bairro','$cidade','$contato')";

$cadastro = mysqli_query($conn,$sql);
