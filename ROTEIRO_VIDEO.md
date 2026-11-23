# Roteiro de apresentação do Gerenciador Logístico

**Duração exigida pela APO:** mínimo de 5 minutos e máximo de 10 minutos.

> Personalize os campos entre colchetes com seus próprios dados. O roteiro é um apoio para a sua apresentação; demonstre o sistema realmente em execução e explique com suas palavras.

## 1. Apresentação pessoal — 30 a 60 segundos

“Olá, meu nome é **[SEU NOME]**, meu RA é **[SEU RA]**, sou do curso **[SEU CURSO]**, do polo **[SEU POLO]**, e sou aluno(a) da UNIPAR EAD. Neste vídeo vou apresentar meu projeto prático da disciplina Fundamentos de Programação para Internet: um Gerenciador Logístico.”

## 2. Objetivo do sistema — 40 a 60 segundos

“Este sistema foi desenvolvido para organizar informações básicas de uma operação logística. Ele permite cadastrar produtos, endereços e transportadores; depois, esses dados são relacionados na geração de um frete. Também é possível consultar os fretes e gerar um relatório de uma data específica.”

## 3. Demonstração dos cadastros — 1 a 2 minutos

- Abra **Produtos** e cadastre um produto durante a gravação. Explique os campos principais.
- Abra **Endereços** e mostre/cadastre um endereço de origem e outro de destino.
- Abra **Transportadores** e mostre/cadastre um transportador.
- Explique que os dados ficam registrados no banco de dados.

## 4. Demonstração da geração de frete — 1 a 2 minutos

- Abra **Fretes** e escolha **Gerar frete**.
- Selecione um transportador, origem, destino e data.
- Adicione pelo menos um produto; para demonstrar o relacionamento, adicione dois produtos diferentes.
- Informe as quantidades e gere o frete.
- Abra os detalhes do frete criado e mostre os itens relacionados.

## 5. Consulta e relatório — 45 a 75 segundos

- Volte à listagem de fretes e mostre o registro criado.
- Abra **Relatórios**, selecione a mesma data do frete e consulte.
- Clique em **Baixar CSV** e mostre que o arquivo foi gerado.

## 6. Comparação com os esboços e apresentação do código — 45 a 75 segundos

- Mostre o PDF da Etapa 1 e compare rapidamente o planejamento com as telas implementadas.
- Mostre a estrutura das pastas no editor de código.
- Aponte, por exemplo, `produtos/`, `enderecos/`, `transportadores/`, `fretes/`, `relatorios/`, `config/` e `database.sql`.
- Explique que PHP processa os formulários e acessa o banco por PDO; HTML/Bootstrap compõem a interface; JavaScript adiciona linhas de produtos dinamicamente na tela de geração de frete.

## 7. Encerramento — 15 a 30 segundos

“Com isso, demonstrei os cadastros, a geração de um frete com mais de um produto, a consulta e o relatório por data. Obrigado(a) por assistir.”

## Antes de gravar

- [ ] Conferir os dados pessoais que serão falados no início.
- [ ] Deixar o XAMPP com Apache e MySQL iniciados.
- [ ] Abrir o sistema no navegador e confirmar que as páginas carregam.
- [ ] Cadastrar os dados de demonstração antes de gravar, para não perder tempo.
- [ ] Ainda assim, preencher ao menos um formulário durante o vídeo, conforme a orientação da APO.
- [ ] Deixar o PDF da Etapa 1 e o código prontos para mostrar.
- [ ] Gravar entre 5 e 10 minutos.
- [ ] Publicar no YouTube como **Não listado** e copiar o link para o ambiente virtual.
