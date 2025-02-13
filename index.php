<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-4">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="custom.css">
</head>

<body class="bg-light-subtle d-flex align-items-center justify-content-center vh-100">

    <div class="border border-color-custom rounded bg-light p-3">

        <form action="function/login.php" method="post">

            <div class="mb-3">
                <h2 class="font-h2">Login</h2>
            </div>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Usuário" name="login">
            </div>
            <div class="mb-3 input-group input-group-lg">
                <input type="password" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Senha" name="senha">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Lembre de mim</label>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>

        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>