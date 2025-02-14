<?php

include_once '../function/conexao.php';

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT produto.*, categoria.nome AS categoria_nome FROM produto 
    INNER JOIN categoria ON produto.id_categoria = categoria.id 
    WHERE produto.id LIKE '%$search%' OR produto.nome LIKE '%$search%' OR categoria.nome LIKE '%$search%'
    ORDER BY id DESC";

    $consulta = mysqli_query($conn, $sql);
}

//isso aqui faz com que se a variável existir ele busque algo. Assim caso ela não exista. Ao abrir a página, não haverá busca
else if(isset($_GET['search'])){
    $sql = "SELECT produto.*, categoria.nome AS categoria_nome
    FROM produto
    INNER JOIN categoria ON produto.id_categoria = categoria.id;";
    $consulta = mysqli_query($conn, $sql);
}else{

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
                <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
                <button onclick="searchData()" class="btn btn-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                    </svg>
                    Pesquisar
                </button>
            </div>
            <div class="p-3">
                <table class="table table-striped -3 table-hover border ">
                    <thead class="table table-primary">
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço custo</th>
                            <th>Preço venda</th>
                            <th>Saldo estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($consulta)) {
                            while ($result = mysqli_fetch_assoc($consulta)) {
                                echo "<tr>
                                        <td>" . $result['id'] . "</td>
                                        <td>" . $result['nome'] . "</td>
                                        <td>" . $result['categoria_nome'] . "</td>
                                        <td>" . $result['preco_custo'] . "</td>
                                        <td>" . $result['preco_venda'] . "</td>
                                        <td>" . $result['saldo_estoque'] . "</td> 
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
        if (event.key === "enter") {
            searchNull();
        }
    });

    function searchNull() {
        window.location = 'produtos.php?search=';
    }

    function searchData() {
        window.location = 'produtos.php?search=' + search.value;
    }
</script>

</html>