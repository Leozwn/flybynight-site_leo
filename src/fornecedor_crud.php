<?php
// src/fornecedor_crud.php

// Todas as funções criadas neste arquivo precisarão do script de conexão
require_once "conecta.php";

// Aba de Fornecedores/listar.php
function buscarFornecedores(PDO $conexao): array {
    
    // comando SQL p/ consulta
    $sql = "SELECT * FROM fornecedores ORDER BY nome";

    // Executando o comando e guardando o resultado da consulta/query/smtmt
    $consulta = $conexao->query($sql);

    // Retornando o resultado como um array associativo
    return $consulta->fetchAll();
};
