<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fly By Night - Gerenciamento</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '';
    $secaoAtual = 'inicio';
    require 'componentes/cabecalho.php';
    ?>
    <main>
        <h2>Gerenciamento</h2>
        <h3>Gerenciar</h3>
        <ul class="menu">
            <li><a href="fornecedores/listar.php">Fornecedores</a></li>
            <li><a href="produtos/listar.php">Produtos</a></li>
            <li><a href="lojas/listar.php">Lojas</a></li>
            <li><a href="lojas_produtos/listar.php">Produtos por loja</a></li>
        </ul>
    </main>
</body>

</html>