<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pdv</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
</head>

<body class="bg-light-subtle d-flex align-items-center justify-content-center vh-100">

    <div class="caixa.php">
        <button type="button" class="btn btn-lg btn-info" data-bs-toggle="modal" data-bs-target="#modalAbertura">
            Abrir caixa
        </button>
        <a href="" class="btn btn-lg btn-info">Produtos</a>
        <a href="" class="btn btn-lg btn-info">Estoque</a>
        <a href="" class="btn btn-lg btn-info">Relatórios</a>


        <!-- Modal -->
        <div class="modal fade" id="modalAbertura" tabindex="-1" aria-labelledby="modalAberturaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">

                    <form action="caixa.php" method="post">

                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="modalAberturaLabel">Abertura de caixa</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            Saldo inicial:
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" name="saldoInicial" class="form-control input-group">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Abrir caixa</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>