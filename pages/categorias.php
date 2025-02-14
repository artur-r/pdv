<?php

include_once '../function/conexao.php';

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM categoria
    WHERE id LIKE '%$search%' OR nome LIKE '%$search%'
    ORDER BY id DESC";

    $consulta = mysqli_query($conn, $sql);
}

//isso aqui faz com que se a variável existir ele busque algo. Assim caso ela não exista. Ao abrir a página, não haverá busca
else if (isset($_GET['search'])) {
    $sql = "SELECT * FROM categoria";
    $consulta = mysqli_query($conn, $sql);
} else {
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

        <div class="bg-light w-100 vh-98 border rounded border-opacity-75 border-info">
            <div class="bg-body-secondary form-control box-search ">
                <input type="search" class="form-control w-50" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                    Pesquisar
                </button>
                <a href="cadastroProduto.php" class="btn btn-success">
                    Adicionar novo
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z" />
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                    </svg>
                </a>
            </div>
            <div class="p-3">
                <table class="table table-striped -3 table-hover border  ">
                    <thead class="table table-primary">
                        <tr>
                            <th>Código</th>
                            <th>Nome da categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($consulta)) {
                            while ($result = mysqli_fetch_assoc($consulta)) {
                                echo "<tr>
                                        <td>" . $result['id'] . "</td>
                                        <td>" . $result['nome'] . "</td>
                                     </tr>";
                            }
                        }



                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            searchData();
        }
    });

    function searchNull() {
        window.location = 'categorias.php?search=';
    }

    function searchData() {
        window.location = 'categorias.php?search=' + search.value;
    }
</script>

</html>