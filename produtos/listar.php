<?php
// produtos/listar.php
require_once "../src/produto_crud.php";
$produtos = buscarProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Produtos</h2>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Novo produto</a></div>
        <!-- Os registros serão carregados dinamicamente quando o back-end for implementado. -->
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Produtos</caption>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Preço</th>
                        <th scope="col">Quantidade</th>
                        <th scope="col">Fornecedor</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($produtos as $produto): ?>
                    <tr>
                        <td> <?= $produto['nome_produto'] ?> </td>
                        <td> <?= $produto['preco'] ?> </td>
                        <td> <?= $produto['quantidade'] ?> </td>
                        <td> <?= $produto['nome_fornecedor'] ?> </td>
                        <td>
                            <a href="editar.php?id=<?= $produto['id'] ?>">Editar</a>
                            <a href="excluir.php?id=<?= $produto['id'] ?>">Excluir</a>
                        </td>
                    </tr>
                <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </main>
</body>

</html>