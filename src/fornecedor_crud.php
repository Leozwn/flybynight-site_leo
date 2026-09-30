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

// Usada em fornecedores/inserir.php
function inserirFornecedor(PDO $conexao, string $nome):void {
    $sql = "INSERT INTO fornecedores (nome) VALUES(:nome)";
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(":nome", $nome);
    $consulta->execute();
};

// Usada em fornecedores/editar.php
function buscarFornecedorPorId(PDO $conexao, int $id):array
{
    $sql = "SELECT * FROM fornecedores WHERE id = :id;";

    $consulta = $conexao->prepare($sql);

    $consulta->bindValue(":id", $id);

    $consulta->execute();

    return $consulta->fetch();
};

// Usada em fornecedores/editar.php
function atualizarFornecedor(PDO $conexao, int $id, string $nome):void{
    $sql = "UPDATE fornecedores SET nome = :nome WHERE id = :id";
    
    $consulta = $conexao->prepare($sql);
    
    $consulta->bindValue(":nome", $nome);
    $consulta->bindValue(":id", $id);

    $consulta->execute();
};
