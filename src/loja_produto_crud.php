<?php
// lojas_produtos/loja_produto_crud.php

require_once __DIR__ . '/../src/conecta.php';

function buscarLojasProdutos(PDO $conexao): array
{
    $sql = "SELECT lojas_produtos.loja_id,
                   lojas_produtos.produto_id,
                   lojas_produtos.estoque,
                   lojas.nome AS nome_loja,
                   produtos.nome AS nome_produto
            FROM lojas_produtos
            JOIN lojas ON lojas.id = lojas_produtos.loja_id
            JOIN produtos ON produtos.id = lojas_produtos.produto_id
            ORDER BY lojas.nome, produtos.nome";

    $consulta = $conexao->query($sql);

    return $consulta->fetchAll();
}

function inserirLojaProduto(
    PDO $conexao,
    int $lojaId,
    int $produtoId,
    int $estoque
): void {
    $sql = "INSERT INTO lojas_produtos (loja_id, produto_id, estoque)
            VALUES (:loja_id, :produto_id, :estoque)";

    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':loja_id', $lojaId, PDO::PARAM_INT);
    $consulta->bindValue(':produto_id', $produtoId, PDO::PARAM_INT);
    $consulta->bindValue(':estoque', $estoque, PDO::PARAM_INT);
    $consulta->execute();
}
