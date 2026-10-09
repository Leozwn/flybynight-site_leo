<?php
// produtos/excluir.php
require_once "../src/produto_crud.php";

$id = $_GET['id'] ?? null;
$idValidado = is_scalar($id)
    ? filter_var($id, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]])
    : false;

if ($idValidado === false) {
    header("location:listar.php");
    exit;
}

excluirProduto($conexao, $idValidado);
header("location:listar.php");
exit;