# Gerenciador Logístico

**Projeto acadêmico — UNIPAR EAD**  
**Aluna:** Caroline V S Arruda  
**Curso:** Engenharia de Software  
**Polo:** Toledo - PR  
**Disciplina:** Fundamentos de Programação para Internet

## Sobre o projeto

Aplicação web acadêmica para gerenciamento logístico. O sistema foi organizado para cadastrar produtos, endereços e transportadores, gerar fretes relacionando um transportador a vários produtos e consultar relatórios por data.

## Código-fonte

O código-fonte completo está no arquivo [gerenciador-logistico-fonte.zip](./gerenciador-logistico-fonte.zip). Baixe e extraia o arquivo para acessar a pasta do projeto, incluindo os arquivos PHP, CSS, JavaScript, scripts SQL e documentação.

## Tecnologias previstas

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

## Como executar localmente

1. Instale o XAMPP e inicie Apache e MySQL.
2. Extraia o código-fonte do arquivo ZIP.
3. Copie a pasta `gerenciador-logistico` para `C:\\xampp\\htdocs\\`.
4. Abra o phpMyAdmin em `http://localhost/phpmyadmin`.
5. Importe `database.sql`, que está dentro da pasta do projeto.
6. Confira as configurações de conexão em `config/config.php`.
7. Acesse `http://localhost/gerenciador-logistico/`.

O arquivo `database_dados_exemplo.sql` contém registros fictícios opcionais para facilitar testes locais.

## Situação de validação

Os arquivos PHP foram verificados quanto à sintaxe no ambiente de preparação. A conexão real com o banco de dados, os formulários, a geração de fretes e a exportação CSV ainda precisam ser testados no XAMPP local antes de considerar a aplicação validada.

## Observação

Este repositório faz parte de uma atividade acadêmica. Os dados de exemplo são fictícios. Não há autenticação de usuários na versão inicial.
