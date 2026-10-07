<?php
// produto/editar.php

/* Exrcicios */
// 1) importar os arquivos de função de forcedores e produtos

// 2) capturar e guardar o id do produto que será carregado/atualizado

// 3) chamar a função buscarFornecedores e receber a lista de forncedores

// 4) chamar a função buscarProdutoPorId e receber os dados do produto(guarde em uma variável )

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Editar produto</h2>
        // Parte 1
        <!-- 5) Exibir os dados do produto em cada campo do formulário
         No caso dos campos input, use o atributo value.
         No caso do campo textarea, coloque o valor dentro da tag.-->
        <form action="" method="post">
            <div>
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="nome" maxlength="100" required>
            </div>
            <div>
                <label for="descricao">Descrição:</label>
                <textarea name="descricao" id="descricao" rows="5"></textarea>
            </div>
            <div>
                <label for="preco">Preço:</label>
                <input type="number" name="preco" id="preco" min="0" step="0.01" required>
            </div>
            <div>
                <label for="quantidade">Quantidade:</label>
                <input type="number" name="quantidade" id="quantidade" min="0" step="1" required>
            </div>
            <div>
                <label for="fornecedor">Fornecedor:</label>
                <select name="fornecedor" id="fornecedor" required>
                    <option value="">Selecione</option>
                    
                    // PARTE 1
                    <!-- 6) DESAFIO
                     
                    6.1) Usando foreach, acessa os $fornecedores
                    e mostre ba tag <option> os nomes de cada fornecedor.
                    No atribute value, coloque o id de cada fornecedor.
                    
                    6.2) O forncedor daquele produto que está sendo exibido, já DEVE VIR SELECIONADO.
                    Programe os recursos para isso acontecer.-->
                </select>
            </div>
            <button type="submit">Atualizar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>