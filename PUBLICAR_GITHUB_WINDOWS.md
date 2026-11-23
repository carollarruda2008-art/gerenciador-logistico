# Publicar o projeto no GitHub (Windows)

Este roteiro publica a pasta `gerenciador-logistico` em um repositório público. Não coloque senhas, tokens ou dados pessoais reais no repositório.

## Opção recomendada: GitHub Desktop

1. Crie ou acesse sua conta em https://github.com/.
2. Instale o GitHub Desktop em https://desktop.github.com/ e entre com sua conta.
3. No GitHub, clique em **New repository**.
4. Nome sugerido: `gerenciador-logistico`.
5. Marque **Public**.
6. Para evitar conflitos na primeira publicação, deixe desmarcadas as opções de criar README, `.gitignore` e licença, pois esses arquivos já estão no projeto.
7. No GitHub Desktop, escolha **File > Add local repository** e selecione a pasta `gerenciador-logistico` extraída do ZIP.
8. Se o aplicativo disser que a pasta ainda não é um repositório Git, escolha a opção de criar/inicializar o repositório.
9. Faça um commit inicial com a mensagem `Versão inicial do Gerenciador Logístico`.
10. Clique em **Publish repository** e confirme que a opção **Keep this code private** está desmarcada.
11. Abra a página do repositório no navegador e confira se está público e se aparecem `README.md`, `database.sql` e as pastas PHP.

## Alternativa: terminal com Git instalado

Abra o Prompt de Comando na pasta do projeto e execute:

```bash
git init
git add .
git commit -m "Versao inicial do Gerenciador Logistico"
git branch -M main
git remote add origin https://github.com/SEU-USUARIO/gerenciador-logistico.git
git push -u origin main
```

Substitua `SEU-USUARIO` pelo seu nome de usuário do GitHub. Se o Git pedir identificação, configure seu nome e e-mail com os dados da sua própria conta:

```bash
git config --global user.name "Seu Nome"
git config --global user.email "seu-email-da-conta"
```

## Antes de entregar o link

- Abra o repositório em uma janela anônima ou saia da conta e confirme que ele é público.
- Confira se o README explica o objetivo, as tecnologias e como instalar.
- Não inclua senha de banco, tokens ou arquivos privados.
- O código ainda precisa ser executado e testado no XAMPP local antes de afirmar que a aplicação foi validada.
