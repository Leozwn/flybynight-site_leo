<?php
// src/produto_crud.php

require_once "conecta.php";

function buscarProdutos(PDO $conexao):array
{
    $sql = "SELECT * FROM produtos";
    $consulta = $conexao->query($sql);
    return $consulta->fetchAll();
}