# Fly By Night: versão Front-End

Versão inicial do site/projeto de exemplo apenas com HTML e CSS. 

As tabelas e os formulários estão sem dados de exemplo, com comentários indicando onde os dados dinâmicos serão inseridos. 

Os botões dos formulários são apenas elementos visuais: não há persistência, conexão com banco, SQL e JavaScript na aplicação.

O PHP permanece somente para reutilizar `componentes/cabecalho.php` e destacar a seção atual. Execute o servidor na raiz com:

```sh
php -S localhost:PORTA
```

A porta pode ser 80 ou qualquer outra que não esteja em uso.

Abra `http://localhost:PORTA` no navegador para visualizar o projeto.

**Atenção:** neste projeto, vamos seguir utilizando o banco de dados flybynight criado nas aulas anteriores. Mas caso você não tenha este banco, na pasta **dump** deixei um arquivo de backup (**flybynight_completo**) que você pode importar em seu phpMyAdmin.
