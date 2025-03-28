<?php

include_once '../function/conexao.php';

date_default_timezone_set('America/Sao_Paulo');

$saldoInicial = $_POST["saldoInicial"];
$dataAbertura =  date('Y-m-d H:i:s'); //forma que fica no mysql
$dataAberturaConvertida = date('d/m/Y H:i:s',); //convertida para melhor visualização

$sql = "SELECT id FROM registro WHERE data_fechamento = '0000-00-00' LIMIT 1";
$consulta = mysqli_query($conn, $sql);
$idCaixaAberto = mysqli_fetch_assoc($consulta);

//Caso não exista um caixa aberto, abrirá por aqui
if (!$idCaixaAberto) {
    $sql = "INSERT INTO registro (saldo_inicial,data_abertura) 
        VALUES ('$saldoInicial','$dataAbertura')";
    $insert = mysqli_query($conn, $sql);
}



?>


<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../custom.css">

</head>

<body>

    <div class="d-flex justify-content w-100 p-2">

        <div class="bg-light w-100 vh-98 border rounded border-opacity-75 border-info d-flex flex-column">
            <div class="bg-body-secondary form-control ">

                <a href="produtos.php" class="btn btn-lg btn-info">Produtos</a>
                <a href="" class="btn btn-lg btn-info">Estoque</a>
                <a href="" class="btn btn-lg btn-info">Relatórios</a>
                <a href="" class="btn btn-lg btn-warning">Fechar Caixa</a>
                <a href="inicio.php" class="btn btn-lg btn-secondary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                </a>



            </div>

            <div class="border rounded border-opacity-75 border-dark-subtle w-50 h-100 m-2 p-2">

                <form>
                    <div class="col-8">
                        <label for="nomeProduto" class="form-label">PRODUTO</label>
                        <input type="text" list="listaProdutos" name="nomeProduto" id="nomeProduto" class="form-control" value="">
                        <datalist id="listaProdutos">
                            <?php


                            $sql = "SELECT * FROM produto ORDER BY id";
                            $consulta = mysqli_query($conn, $sql);
                            while ($result = mysqli_fetch_assoc($consulta)) {
                                echo "<option value='" . $result["nome"] . "'>";
                            };
                            ?>
                        </datalist>
                        <button class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2" />
                            </svg></button>
                            <input type="text" name="preco" id="preco" class="form-control">
                    </div>
                </form>

            </div>

        </div>



    </div>

    <div class="form-control">

    </div>






    <?php

    include_once '../function/conexao.php';



    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>



  <script type="text/javascript" src="../function/scriptCaixa.js"></script>

</body>

</html>