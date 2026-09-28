<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto a uma loja - Fly By Night</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>

<body>
    <?php
    $caminhoBase = '../';
    $secaoAtual = 'lojas_produtos';
    require '../componentes/cabecalho.php';
    ?>
    <main>
        <h2>Adicionar produto a uma loja</h2>
        <!-- Modelo visual: os campos não são enviados nem persistidos. -->
        <form action="" method="post">

            <div>
                <label for="loja">Loja:</label>
                <select name="loja_id" id="loja" required>
                    <option value="">Selecione</option>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>

            <div>
                <label for="produto">Produto:</label>
                <select name="produto_id" id="produto" required>
                    <option value="">Selecione</option>
                    <!-- As opções serão preenchidas com os registros do banco de dados. -->
                </select>
            </div>
            <div>
                <label for="estoque">Estoque:</label>
                <input type="number" name="estoque" id="estoque" min="0" step="1" required>
            </div>
            <button type="submit">Salvar</button>
        </form>
        <a href="listar.php">← Voltar</a>
    </main>
</body>

</html>