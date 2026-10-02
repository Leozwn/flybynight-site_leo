<?php
// Lojas/excluir.php
require_once "../src/loja_crud.php";
$id = $_GET['id'];
excluirLoja($conexao, $id);
header("location:listar.php");
exit;
