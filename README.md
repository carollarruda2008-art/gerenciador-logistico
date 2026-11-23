# Gerenciador Logístico

**Projeto acadêmico — UNIPAR EAD**  
**Aluna:** Caroline V S Arruda  
**Curso:** Engenharia de Software  
**Polo:** Toledo - PR  
**Disciplina:** Fundamentos de Programação para Internet

## Sobre o projeto

Aplicação web acadêmica para gerenciamento logístico. O sistema contempla cadastros de produtos, endereços e transportadores, geração de fretes relacionando um transportador a vários produtos e consulta de relatórios por data.

## Código-fonte completo

O projeto está disponível no arquivo compactado [Gerenciador_Logistico_Projeto_GitHub.zip](./Gerenciador_Logistico_Projeto_GitHub.zip). **Baixe e extraia esse ZIP** para manter a estrutura de pastas necessária ao funcionamento dos arquivos PHP.

O arquivo contém a pasta `gerenciador-logistico`, com:
- `index.php` e módulos `produtos/`, `enderecos/`, `transportadores/`, `fretes/` e `relatorios/`;
- configuração e conexão em `config/`;
- componentes compartilhados em `includes/`;
- recursos CSS e JavaScript em `assets/`;
- `database.sql` e `database_dados_exemplo.sql`;
- documentação de instalação, testes e apresentação em `documentacao/`.

## Tecnologias

- PHP
- MySQL/MariaDB
- HTML5, CSS3 e JavaScript
- Bootstrap 5
- PDO
- XAMPP para execução local

## Funcionalidades

- Painel inicial.
- Cadastro, edição, listagem e exclusão de produtos.
- Cadastro, edição, listagem e exclusão de endereços.
- Cadastro, edição, listagem e exclusão de transportadores.
- Geração de fretes com um transportador e vários produtos.
- Consulta dos fretes.
- Relatório de fretes por data com exportação CSV.

## Como executar localmente

1. Instale o XAMPP e inicie Apache e MySQL.
2. Extraia `Gerenciador_Logistico_Projeto_GitHub.zip`.
3. Copie a pasta `gerenciador-logistico` extraída para `C:\\xampp\\htdocs\\`.
4. Abra o phpMyAdmin em `http://localhost/phpmyadmin`.
5. Importe `database.sql`, que está dentro da pasta do projeto.
6. Confira as configurações de conexão em `config/config.php`.
7. Acesse `http://localhost/gerenciador-logistico/`.

O arquivo `database_dados_exemplo.sql` contém registros fictícios opcionais para facilitar testes locais.

## Situação de validação

Os arquivos PHP foram verificados quanto à sintaxe no ambiente de preparação. A conexão real com o banco de dados, os formulários, a geração de fretes e a exportação CSV ainda precisam ser testados no XAMPP local antes de considerar a aplicação validada.

## Observações

Esta é uma versão acadêmica inicial e não inclui autenticação de usuários. Utilize apenas dados fictícios nos testes. Os dados pessoais acadêmicos não devem ser adicionados a dados operacionais ou exemplos públicos.
