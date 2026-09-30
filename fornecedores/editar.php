<?php
// Forncedores/editar.php
require_once "../src/fornecedor_crud.php";
// Acessar a URL e "pegar" o valor do parâmentro (id) existente nela
$id = $_GET['id'];

// chamar função, ao termino , função devolve um array com os dados do fornecedor
$fornecedor = buscarFornecedorPorId($conexao, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Capturamos o nome digitado no formulário
    $nome = $_POST['nome'];

    // Chamamos a função de UPDATE (passando os dados pra ela)
    atualizarFornecedor($conexao, $id, $nome);

    // Redirecionamos para a página que mostra todos os fornecedores
    header("location:listar.php");

    // Encerramos/interropemos qualquer outro processo
    // SEMPRE use exit após o redirecionamento com header()
    exit;
}
?>  
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar fornecedor - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'fornecedores';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar fornecedor</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?= $fornecedor['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input value="<?= $fornecedor['nome'] ?>" type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>