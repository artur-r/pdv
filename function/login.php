<?php 

include_once 'conexao.php';

$login = $_POST['login'];
$senha = $_POST['senha'];


$sql = "SELECT * FROM usuario WHERE login = '$login' AND senha = '$senha'";
$result = $conn->query($sql);

if ($result -> num_rows<1){
    echo "<script>
            alert('Usuário não encontrado');
            window.location.href='../index.php';
          </script>";
}

if ($result -> num_rows==1){
    $retorno = $result->fetch_assoc();
    if ($login == $retorno['login']) {
        $_SESSION['login'] = $retorno['login'];
        $_SESSION['nome'] = $retorno['nome'];
        header("location:../inicio.php");;
    }
}