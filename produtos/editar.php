<?php
// produtos/editar.php
// ex 1
require_once "../src/fornecedor_crud.php";
require_once "../src/produto_crud.php";

/* Exercícios:
PARTE 1 (feito)
1) importar os arquivos de função de fornecedores e produtos
2) capturar e guardar o id do produto que será carregado/atualizado
3) chamar a função buscarFornecedores e receber a lista de fornecedores
4) chamar a função buscarProdutoPorId e receber os dados do produto (guarde em uma variável)
5) exibir os dados do produto em cada campo do formulário
6) desafio
   6.1) usando foreach, acesse os $fornecedores e mostre a tag <option> com os nomes de cada fornecedor
   6.2) o fornecedor daquele produto que está sendo exibido deve vir selecionado

PARTE 2 (feito)
 1) Dectectar o acionamento do formulário de atualização

 2) Capturar os dados do formulário

 3) Chamar a função atualizarProduto e passar os dados pra ela

 4) Redirecionar para a página listar produtos

 5) Testar: tente atualizar dados de pelo menos 3 produtos
*/
// ex 2 peguei algumas na IA dessa tambem
$id = $_GET['id'] ?? null;

if ($id === null || !is_numeric($id)) {
    header("location:listar.php");
    exit;
}

// ex 3
$fornecedores = buscarFornecedores($conexao);
$produto = buscarProdutoPorId($conexao, (int) $id);

// ex 4
if (!$produto) {
    header("location:listar.php");
    exit;
}

// outra forma que a IA me ajudou passo a passo
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $descricao = $_POST['descricao'] ?? '';
    $preco = (float) ($_POST['preco'] ?? 0);
    $quantidade = (int) ($_POST['quantidade'] ?? 0);
    $fornecedor = (int) ($_POST['fornecedor'] ?? 0);

    atualizarProduto($conexao, (int) $id, $nome, $descricao, $preco, $quantidade, $fornecedor);
    header("location:listar.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto</h2>
        <form action="" method="post">
            // ex 5
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" value="<?= htmlspecialchars($produto['nome']) ?>" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"><?= htmlspecialchars($produto['descricao'] ?? '') ?></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" step="0.01" value="<?= htmlspecialchars((string) $produto['preco']) ?>" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" step="1" value="<?= htmlspecialchars((string) $produto['quantidade']) ?>" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value="">Selecione</option>

                    // Peguei algumas info da IA nessa 
                    // ex 6
                    <?php foreach ($fornecedores as $fornecedor): ?>
                        <option value="<?= $fornecedor['id'] ?>" <?= (int) $fornecedor['id'] === (int) ($produto['fornecedor_id'] ?? 0) ? 'selected' : '' ?>>
                            <?= htmlspecialchars($fornecedor['nome']) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>