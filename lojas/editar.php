<?php
// Forncedores/editar.php
require_once "../src/loja_crud.php";
// Acessar a URL e "pegar" o valor do parâmentro (id) existente nela
$id = $_GET['id'];

$loja= buscarLojaPorId($conexao, $id);

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nome = $_POST['nome'];
    atualizarLoja($conexao, $id, $nome);
    header("location:listar.php");
    exit;
}
?>  
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <!-- Os campos serão preenchidos com os dados do registro selecionado. -->
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=  $loja['id'] ?>">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>