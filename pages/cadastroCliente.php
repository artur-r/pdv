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
    include_once '../function/viaCep.php';


    ?>

    <div class="w-100 p-2">

        <div class="bg-light w-100 vh-98 border rounded border-opacity-75 border-info">
            <div class="bg-body-secondary form-control mb-3">
                <h2 class="font-h2">Cadastro de cliente</h2>
            </div>
            
            <!-- <form action="cadastroCliente.php" method="post">
            <label for="cep">Cep</label>
            <input type="text" name="cep">
            <input type="submit">
            


            <label for="rua">Rua</label>
            <input type="text" value="<?php echo $endereco->logradouro ?>">
           

            </form>  -->

            <div class="m-3">

                <!-- Caso seja atualização será criado um formulário para atualizar. E se for cadastro será para cadastrar -->
                <?php if (empty($_GET)) {
                    echo " <form action='' method='post' class='row needs-validation' novalidate>";
                } else {
                    echo " <form action='../function/AtualizaCliente.php?id=".$id."' method='post' class='row needs-validation' novalidate>";
                }
                ?>
                <form action="../function/cadastraProduto.php" method="post" class="row needs-validation" novalidate>
                    <div class="col-4 mb-4">
                        <label for="nome" class="form-label" id="validationCustom03">Nome</label>
                        <input type="text" name="nome" id="" class="form-control"  value="">
                        <!-- <div class="invalid-feedback">
                            Insira o nome do cliente
                        </div> -->
                    </div>
                    <div class="col-4 mb-4">
                        <label for="cpf" class="form-label">CPF</label>
                        <input type="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="cpf" id="" class="form-control" value="">
                    </div>
                    <!-- <div class="col-4 mb-4">
                        <label for="categoria" class="form-label"></label>
                        <select name="categoria" class="form-select  form-control " aria-label="Default select example" required>
                            <option selected value="">
                        </select>
                        <div class="invalid-feedback">
                            Selecione uma categoria válida
                        </div>
                    </div> -->
                    <div class="col-4 mb-4">
                        <label for="endereco" class="form-label" id="validationCustom03">Endereço</label>
                        <input type="text" name="endereco" id="" class="form-control" value="<?php echo "$endereco->logradouro";?>">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="bairro" class="form-label" id="">Bairro</label>
                        <input type="text" name="bairro" id="" class="form-control"  value="<?php echo "$endereco->bairro";?>">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="contato" class="form-label" id="">Contato</label>
                        <input type="text" name="contato" id="" class="form-control" value="">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="cep" id="" class="form-control" value="">
                        <input type="submit" value="Consultar">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="cidade" class="form-label" id="">Cidade</label>
                        <input type="text" name="cidade" id="" class="form-control" value="<?php echo "$endereco->localidade";?>">
                    </div>
                    <div class="col-4 mb-4">
                        <label for="NumeroEndereco" class="form-label">Número do endereço</label>
                        <input type="text" inputmode="decimal" pattern="^\d+([.,]\d{1,2})?$" name="NumeroEndereco" id="" class="form-control"  value="">
                    </div>
                    <!-- <div class="col-4 mb-4">
                        <label for="tipo" class="form-label">Tipo venda</label>
                        <select name="tipo" class="form-select  form-control " aria-label="Default select example" required>
                            <option selected value="<?php if (!empty($_GET)) {
                                                        echo $idTipoVenda;
                                                    } ?>"><?php if (!empty($_GET)) {
                                                                                                            echo $tipoVenda;
                                                                                                        } ?></option>
                            <option value="1">UNITÁRIA</option>
                            <option value="2">FRACIONADA</option>
                        </select>
                        <div class="invalid-feedback">
                            Selecione um tipo
                        </div>
                    </div> -->
                    <br>
                    <div class="">
                        <?php if (!empty($_GET)) {
                            echo "<button type='submit' name='atualizar' id='' class='btn btn-primary '>

                            Atualizar
                           <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/></svg>
                        </button>";
                        } else {
                            echo "<button type='submit' name='cadastrar' id='' class='btn btn-success '>

                            Cadastrar
                            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus-square' viewBox='0 0 16 16'>
                                <path d='M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z' />
                                <path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4' />
                            </svg>
                        </button>";
                        }




                        ?>

                    </div>
                </form>
            </div>
            </div>
        </div>


    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>
        (() => {
            'use strict'

            // aplicar validação de formulário bootstrap
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()
    </script>

</body>

</html>