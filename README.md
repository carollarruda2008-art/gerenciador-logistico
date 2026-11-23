# Gerenciador Logístico

**Projeto acadêmico — UNIPAR EAD**  
**Aluna:** Caroline V S Arruda  
**Curso:** Engenharia de Software  
**Polo:** Toledo - PR  
**Disciplina:** Fundamentos de Programação para Internet

## Sobre o projeto

Aplicação web acadêmica para gerenciamento logístico. O sistema foi organizado para cadastrar produtos, endereços e transportadores, gerar fretes relacionando um transportador a vários produtos e consultar relatórios por data.

## Tecnologias

- PHP
- MySQL/MariaDB
- HTML5, CSS3 e JavaScript
- Bootstrap 5
- PDO
- XAMPP para execução local

## Funcionalidades previstas

- Painel inicial.
- Cadastro, edição, listagem e exclusão de produtos.
- Cadastro, edição, listagem e exclusão de endereços.
- Cadastro, edição, listagem e exclusão de transportadores.
- Geração de fretes com um transportador e vários produtos.
- Consulta dos fretes.
- Relatório de fretes por data com exportação CSV.

## Código-fonte

O pacote do projeto será adicionado ao repositório como `gerenciador-logistico-fonte.zip`. Ele contém os arquivos PHP, CSS, JavaScript, o script SQL e a documentação de apoio.

## Como executar localmente

1. Instale o XAMPP e inicie Apache e MySQL.
2. Extraia o pacote do projeto.
3. Copie a pasta `gerenciador-logistico` para `C:\\xampp\\htdocs\\`.
4. Abra o phpMyAdmin em `http://localhost/phpmyadmin`.
5. Importe `database.sql`, que está dentro da pasta do projeto.
6. Confira as configurações de conexão em `config/config.php`.
7. Acesse `http://localhost/gerenciador-logistico/`.

## Situação de validação

Os arquivos PHP foram verificados quanto à sintaxe no ambiente de preparação. A conexão real com o banco de dados, os formulários, a geração de fretes e a exportação CSV ainda precisam ser testados no XAMPP local antes de considerar a aplicação validada.

## Observação

Esta é uma versão acadêmica inicial. Não há autenticação de usuários. Os dados de demonstração, quando utilizados, são fictícios e devem ser identificados como tais.

