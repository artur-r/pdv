<?php

$endereco = (object)[
    'cep' => '',
    'logradouro' => '',
    'bairro' => '',
    'uf' => '',
    'localidade' => '',
];


if (isset($_POST['cep'])) {

    $cep = $_POST['cep'];
    $url = "https://viacep.com.br/ws/{$cep}/json/";

    $endereco = json_decode(file_get_contents($url));
}




?>
