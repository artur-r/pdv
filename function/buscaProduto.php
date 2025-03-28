<?php 

include_once "conexao.php";
$produto = $_REQUEST['produto'];

$sql = "SELECT * FROM produto WHERE nome = '$produto' ORDER BY id";
$consulta = mysqli_query($conn, $sql);
$result = array ();

//joga os dados (que geralmente é meu result = tabela sql. Dentro do array result.)
while($dados = mysqli_fetch_assoc($consulta)){
    $result [] = $dados;
};

echo json_encode($result);