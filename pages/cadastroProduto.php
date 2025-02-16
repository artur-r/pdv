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

    include_once '../function/conexao.php';

    $sql = "SELECT * FROM categoria";
    $consulta = mysqli_query($conn, $sql);




    ?>

    <div class="w-100 p-2">

        <div class="bg-light w-100 vh-98 border rounded border-opacity-75 border-info">
            <div class="bg-body-secondary form-control mb-3">
                <h2 class="font-h2">Cadastro de produto</h2>
            </div>
            <div class="m-3">
                <form action="../function/cadastraProduto.php" method="post" class="row">
                    <div class="col-4 mb-4">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" name="nome" id="" class="form-control" required>
                        
                    </div>
                    <div class="col-4 mb-4">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select name ="categoria" class="form-select  form-control " aria-label="Default select example" required>
                            <option></option>

                            <?php
                            while ($result = mysqli_fetch_assoc($consulta)) {
                                $value++;
                                echo " <option value=" . $result['id'] . ">" . $result['nome'] . "</option>";
                            }
                            ?>

                        </select>
                    </div>
                    <div class="col-4 mb-4">
                        <label for="custo" class="form-label" >Preço de custo</label>
                        <input type="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="custo" id="" class="form-control" required>
                    </div>
                    <div class="col-4 mb-4">
                        <label for="venda" class="form-label">Preço de venda</label>
                        <input type="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="venda" id="" class="form-control" required>
                    </div>
                    <div class="col-4 mb-4">
                        <label for="tipo" class="form-label" >Tipo venda</label>
                        <select name="tipo" class="form-select  form-control " aria-label="Default select example required">
                        <option></option>
                            <option value="unidade">Unidade</option>
                            <option value="real">Real</option>
                        </select>
                    </div>
                    <div class="col-4 mb-4">
                        <label for="estoque" class="form-label">Estoque</label>
                        <input ttype="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="estoque" id="" class="form-control">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="cod" class="form-label">Cód. De barra</label>
                        <input type="text" name="cod" id="" class="form-control">
                    </div><br>
                    <div class="">
                        <button type="submit" name="cadastrar" id="" class="btn btn-success ">

                            Cadastrar
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        
    </script>

</body>

</html>