<header class="cabecalho">
    <div class="conteudo-cabecalho">
        <h1 class="marca"><a href="<?= $caminhoBase ?>index.php">Fly By Night</a></h1>
        <nav class="navegacao-principal">
            <ul>
                <li>
                    <a
                        class="<?= $secaoAtual === 'inicio' ? 'ativo' : '' ?>"
                        href="<?= $caminhoBase ?>index.php">
                        Início
                    </a>
                </li>

                <li>
                    <a
                        class="<?= $secaoAtual === 'fornecedores' ? 'ativo' : '' ?>"
                        href="<?= $caminhoBase ?>fornecedores/listar.php">
                        Fornecedores
                    </a>
                </li>

                <li>
                    <a
                        class="<?= $secaoAtual === 'produtos' ? 'ativo' : '' ?>"
                        href="<?= $caminhoBase ?>produtos/listar.php">
                        Produtos
                    </a>
                </li>

                <li>
                    <a
                        class="<?= $secaoAtual === 'lojas' ? 'ativo' : '' ?>"
                        href="<?= $caminhoBase ?>lojas/listar.php">
                        Lojas
                    </a>
                </li>

                <li>
                    <a class="<?= $secaoAtual === 'lojas_produtos' ? 'ativo' : '' ?>"
                        href="<?= $caminhoBase ?>lojas_produtos/listar.php">
                        Produtos por loja
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</header>