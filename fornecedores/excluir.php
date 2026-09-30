<?php
// Fornecedores/excluir.php
require_once "../src/fornecedor_crud.php";
$id = $_GET['id'];
excluirFornecedor($conexao, $id);
header("location:listar.php");
exit;
