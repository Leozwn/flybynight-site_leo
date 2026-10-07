<?php
// src/produto_crud.php

require_once "conecta.php";

function buscarProdutos(PDO $conexao):array 
{
    $sql = "SELECT 
                produtos.id, 
                produtos.nome AS nome_produto, 
                produtos.preco, 
                produtos.quantidade,
                fornecedores.nome AS nome_fornecedor
            FROM produtos JOIN fornecedores
            ON fornecedores.id = produtos.fornecedor_id
            ORDER BY nome_produto";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}


function inserirProduto(
    PDO $conexao, 
    string $nome, 
    string $descricao, 
    float $preco, 
    int $quantidade, 
    int $fornecedorId
    ):void
{
    $sql = "INSERT INTO produtos(nome, descricao, preco, quantidade, fornecedor_id)
            VALUES(:nome, :descricao, :preco, :quantidade, :fornecedor_id)";

    $consulta = $conexao->prepare($sql);

    // Atribuindo os valores recebidos pela função para cada parâmetro nomeado
    $consulta->bindValue(':nome', $nome);
    $consulta->bindValue(':descricao', $descricao);
    $consulta->bindValue(':preco', $preco);
    $consulta->bindValue(':quantidade', $quantidade);
    $consulta->bindValue(':fornecedor_id', $fornecedorId);

    $consulta->execute();
}