<?php
    require_once "../src/loja_crud.php";
    $lojas = buscarLojas($conexao);
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lojas - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Lojas</h2>
        <p>Ao excluir uma loja, seus vínculos e estoques por produto também serão removidos. Os produtos continuarão cadastrados.</p>
        <div class="barra-acoes"><a class="botao" href="inserir.php">+ Nova loja</a></div>
        <!-- Os registros serão carregados dinamicamente quando o back-end for implementado. -->
        <div class="area-tabela" tabindex="0">
            <table>
                <caption>Relação de Lojas</caption>
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aqui serão geradas as linhas com os dados e as ações Editar e Excluir de cada registro. -->
                    <?php foreach ($lojas as $loja): ?>
                        <tr>
                            <td>
                                <?= $loja['id'] ?>
                            </td>

                            <td>
                                <?= $loja['nome'] ?>
                            </td>
                            <td>
                                <a href="editar.php?id=<?= $loja['id'] ?>">
                                    Editar
                                </a>

                                <a class="excluir" href="excluir.php?id=<?= $loja['id'] ?>">
                                    Excluir
                                </a>
                            </td>
                                

                        </tr>

                    <?php endforeach; ?>           
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>