<?php
// 
require_once "/loja_produto_crud.php";
$lojasProdutos = buscarLojasProdutos($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos por loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Produtos por loja</h2>
        <p>Gerencie os vínculos e o estoque de cada produto nas lojas. A exclusão remove somente o vínculo.</p>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Novo vínculo</a></div>
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Produtos por loja</caption>
                <thead>
                    <tr>
                        <th scope="col">Loja</th>
                        <th scope="col">Produto</th>
                        <th scope="col">Estoque</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($lojasProdutos === []): ?>
                        <tr>
                            <td colspan="3">Nenhum produto vinculado a uma loja.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($lojasProdutos as $vinculo): ?>
                            <tr>
                                <td><?= htmlspecialchars($vinculo['nome_loja'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= htmlspecialchars($vinculo['nome_produto'], ENT_QUOTES, 'UTF-8') ?></td>
                                <td><?= (int) $vinculo['estoque'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>