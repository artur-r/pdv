<?php

include_once '../function/conexao.php';

if (!empty($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT produto.*, categoria.nome AS categoria_nome FROM produto 
    INNER JOIN categoria ON produto.id_categoria = categoria.id 
    WHERE produto.id LIKE '%$search%' OR produto.nome LIKE '%$search%' OR categoria.nome LIKE '%$search%'
    ORDER BY id";

    $consulta = mysqli_query($conn, $sql);
}

//isso aqui faz com que se a variável existir vazia, busque tudo. Assim caso ela não exista. Ao abrir a página, não haverá busca
else if (isset($_GET['search'])) {
    $sql = "SELECT produto.*, categoria.nome AS categoria_nome
    FROM produto
    INNER JOIN categoria ON produto.id_categoria = categoria.id
    ORDER BY id";
    $consulta = mysqli_query($conn, $sql);
} else {
}

if (!empty($_GET['deletar'])) {
    $id = $_GET['deletar'];
    $sql = "DELETE FROM produto
    WHERE id = $id";
    $deletar = mysqli_query($conn, $sql);


    $sql = "SELECT produto.*, categoria.nome AS categoria_nome
    FROM produto
    INNER JOIN categoria ON produto.id_categoria = categoria.id
    ORDER BY id";
    $consulta = mysqli_query($conn, $sql);
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

        <div class="bg-light w-100  border rounded border-opacity-75 border-info">
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
                <table class="table table-striped -3 table-hover border ">
                    <thead class="table table-primary">
                        <tr>
                            <th>Número</th>
                            <th>Nome</th>
                            <th>Categoria</th>
                            <th>Preço custo</th>
                            <th>Preço venda</th>
                            <th>Saldo estoque</th>
                            <th>Ações</th>
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
                                        <td class='text-center'>
                                            <a class='btn btn-primary action-button' data-id='" . $result['id'] . "' href='atualizarProduto.php'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                                <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325'/></svg>
                                            </a> 
                                            <button class='btn btn-danger action-button' data-bs-target='#modalDeletar' data-bs-toggle='modal'data-id='" . $result['id'] . "'>
                                                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                                <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5'/></svg>
                                             </button> 
                                        </td>
                                     </tr>";
                            }
                        }



                        ?>
                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <div class="modal fade" id="modalDeletar" tabindex="-1" aria-labelledby="modalDeletarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <form action="" method="post">

                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalDeletarLabel">Deletar categoria</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        Confirme se deseja deletar o produto
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" id="deleteButton" onclick="deletarProduto()" class="btn btn-warning">Deletar</button>
                    </div>

                </form>
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
        window.location = 'produtos.php?search=';
    }

    function searchData() {
        window.location = 'produtos.php?search=' + search.value;
    }

    //Evento de clique que armazena o id dentro do input (para o conteúdo ir para a URL, deve estar dentro do input)
    document.querySelectorAll('.action-button').forEach(button => {
        button.addEventListener('click', function() {
            var id = this.getAttribute('data-id'); // Captura o ID correto
            document.getElementById('deleteButton').setAttribute('data-id', id); // Armazena o ID no botão de deletar
        });
    });


    function deletarProduto() {
        var id = document.getElementById('deleteButton').getAttribute('data-id'); // Recupera o ID salvo
        window.location = 'produtos.php?deletar=' + id;
    }

    
</script>

</html>