<?php

include_once 'conexao.php';

$nome = $_POST['nome'];
$categoria = $_POST['categoria'];
$custo = str_replace(',', '.', $_POST['custo']);
$venda = str_replace(',', '.', $_POST['venda']);
$tipo = $_POST['tipo'];
$estoque = str_replace(',','.',$_POST['estoque']);
$codBarra = $_POST['cod'];



$sql = "INSERT INTO produto (nome,id_categoria,preco_custo,preco_venda,unidade_de_medida,saldo_estoque,codigo_de_barra) 
            VALUES ('$nome','$categoria','$custo','$venda','$tipo','$estoque','$codBarra')";

$insert = mysqli_query($conn, $sql);

header("location:../pages/produtos.php?search=");
