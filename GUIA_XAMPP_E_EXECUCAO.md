# Guia rápido: instalar o projeto no XAMPP (Windows)

## 1. Instalar o XAMPP

1. Abra o arquivo instalador que foi baixado (`xampp-windows-x64-...-installer`).
2. Autorize a execução quando o Windows solicitar.
3. Mantenha os componentes **Apache**, **MySQL**, **PHP** e **phpMyAdmin** selecionados.
4. Instale em `C:\xampp`.
5. Ao terminar, abra `C:\xampp\xampp-control.exe`.

Se o computador reiniciou durante a instalação, procure primeiro a pasta `C:\xampp`. O painel costuma ser aberto pelo arquivo `xampp-control.exe`; talvez não exista atalho no menu Iniciar.

Se a pasta `C:\xampp` não existir, volte a Downloads, execute novamente o instalador como administrador e conclua as telas do assistente.

## 2. Iniciar os serviços

No XAMPP Control Panel, clique em **Start** para Apache e MySQL. Ambos devem mostrar que estão em execução.

Teste no navegador:

- `http://localhost/`
- `http://localhost/phpmyadmin/`

Se o Apache não iniciar, uma causa comum é outro programa já estar usando as portas HTTP. Anote a mensagem exibida no painel antes de alterar configurações.

## 3. Colocar o projeto no htdocs

1. Extraia o ZIP do projeto.
2. Copie a pasta `gerenciador-logistico` para `C:\xampp\htdocs\`.
3. Confirme que o arquivo `C:\xampp\htdocs\gerenciador-logistico\index.php` existe.

## 4. Criar o banco de dados

1. Abra `http://localhost/phpmyadmin/`.
2. Entre na opção **Importar**.
3. Selecione o arquivo `database.sql`, que fica na raiz da pasta `gerenciador-logistico`.
4. Execute a importação. O script cria o banco `gerenciador_logistico` e as tabelas.

A configuração inicial do projeto usa host `127.0.0.1`, banco `gerenciador_logistico`, usuário `root` e senha vazia. Caso sua instalação use outra senha, ajuste `config/config.php`.

## 5. Abrir o sistema

Acesse `http://localhost/gerenciador-logistico/`.

Se a pasta tiver outro nome, atualize a constante `BASE_URL` em `config/config.php`.
