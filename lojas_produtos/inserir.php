<?php
require_once  "/../src/loja_crud.php";
require_once  "/../src/produto_crud.php";
require_once  "/loja_produto_crud.php";

$lojas = buscarLojas($conexao);
$produtos = buscarProdutos($conexao);
$erroFormulario = null;
$lojaSelecionada = '';
$produtoSelecionado = '';
$estoqueInformado = '';

// auxilio IA
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lojaId = filter_var($_POST['loja_id'] ?? '', FILTER_VALIDATE_INT);
    $produtoId = filter_var($_POST['produto_id'] ?? '', FILTER_VALIDATE_INT);
    $estoque = filter_var(
        $_POST['estoque'] ?? '',
        FILTER_VALIDATE_INT,
        ['options' => ['min_range' => 0]]
    );

    $lojaSelecionada = $lojaId === false ? '' : $lojaId;
    $produtoSelecionado = $produtoId === false ? '' : $produtoId;
    $estoqueInformado = (string) ($_POST['estoque'] ?? '');

    $idsLojas = array_map('intval', array_column($lojas, 'id'));
    $idsProdutos = array_map('intval', array_column($produtos, 'id'));

    if (
        $lojaId === false || $lojaId < 1 ||
        $produtoId === false || $produtoId < 1 ||
        $estoque === false ||
        !in_array($lojaId, $idsLojas, true) ||
        !in_array($produtoId, $idsProdutos, true)
    ) {
        $erroFormulario = 'Selecione uma loja, um produto e informe um estoque válido.';
    } else {
        try {
            inserirLojaProduto($conexao, $lojaId, $produtoId, $estoque);
            header('Location: listar.php');
            exit;
        } catch (PDOException $erro) {
            if (($erro->errorInfo[1] ?? null) !== 1062) {
                throw $erro;
            }

            $erroFormulario = 'Esse produto já está vinculado a essa loja.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto a uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Adicionar produto a uma loja</h2>
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja_id" id="loja" required>
                    <option value="">Selecione</option>
                    <?php foreach ($lojas as $loja): ?>
                        <option
                            value="<?= (int) $loja['id'] ?>"
                            <?= $lojaSelecionada === (int) $loja['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($loja['nome'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto_id" id="produto" required>
                    <option value="">Selecione</option>
                    <?php foreach ($produtos as $produto): ?>
                        <option
                            value="<?= (int) $produto['id'] ?>"
                            <?= $produtoSelecionado === (int) $produto['id'] ? 'selected' : '' ?>>
                            <?= htmlspecialchars($produto['nome_produto'], ENT_QUOTES, 'UTF-8') ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input
                    type="number"
                    name="estoque"
                    id="estoque"
                    min="0"
                    step="1"
                    value="<?= htmlspecialchars($estoqueInformado, ENT_QUOTES, 'UTF-8') ?>"
                    required>
            </div>
            <?php if ($erroFormulario !== null): ?>
                <p role="alert"><?= htmlspecialchars($erroFormulario, ENT_QUOTES, 'UTF-8') ?></p>
            <?php endif; ?>
            <?php if ($lojas === [] || $produtos === []): ?>
                <p role="status">Cadastre ao menos uma loja e um produto antes de criar o vínculo.</p>
            <?php endif; ?>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>