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


    <?php

    include_once 'conexao.php';

    $nome = $_GET['nome'];
    $estoque = $_GET['estoque'];
    $nome = $_GET['nome'];
    $nome = $_GET['nome'];
    $nome = $_GET['nome'];



    // $sql = "INSERT INTO produto ('nome','saldo_estoque','id_categoria','preco_custo','preco_venda','unidade_medida','codigo_de_barra',) 
    //         VALUES '','','','','',";
    // $consulta = mysqli_query($conn, $sql);




    ?>

    <div class="w-100 p-2">

        <div class="bg-light w-100 vh-98 border rounded border-opacity-75 border-info">
            <div class="bg-body-secondary form-control mb-3">
                <h2 class="font-h2">Cadastro de produto</h2>
            </div>
            <div class="m-3">
                
            </div>
        </div>


    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>