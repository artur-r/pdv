<?php

include_once 'conexao.php';

$id = $_GET['id'];
$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$custo = str_replace(',', '.', $_POST['custo']);
$venda = str_replace(',', '.', $_POST['venda']);
$tipo = $_POST['tipo'];
$estoque = str_replace(',','.',$_POST['estoque']);
$codBarra = $_POST['cod'];




$sql = "UPDATE produto 
SET 
    nome = '$nome',
    id_categoria = '$categoria',
    preco_custo = '$custo',
    preco_venda = '$venda',
    id_tipo_venda = '$tipo',
    saldo_estoque = '$estoque',
    codigo_de_barra = '$codBarra'
WHERE id = $id;";

$atualiza = mysqli_query($conn, $sql);

header("location:../pages/produtos.php?search=");
