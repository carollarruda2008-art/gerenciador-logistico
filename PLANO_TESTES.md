# Plano de testes do Gerenciador Logístico

Este documento registra o que deve ser verificado quando o projeto for executado localmente com XAMPP e MySQL/MariaDB.

| ID | Teste | Resultado esperado | Status |
|---|---|---|---|
| T01 | Abrir o painel inicial | Dashboard carrega sem erro | Pendente de execução no XAMPP |
| T02 | Cadastrar produto | Produto aparece na listagem | Pendente de execução no XAMPP |
| T03 | Editar produto | Alterações aparecem na listagem | Pendente de execução no XAMPP |
| T04 | Excluir produto sem vínculo | Produto é removido | Pendente de execução no XAMPP |
| T05 | Cadastrar endereço de origem | Endereço fica disponível como origem | Pendente de execução no XAMPP |
| T06 | Cadastrar endereço de destino | Endereço fica disponível como destino | Pendente de execução no XAMPP |
| T07 | Cadastrar transportador | Transportador aparece na listagem | Pendente de execução no XAMPP |
| T08 | Gerar frete com dois produtos | Frete e dois vínculos são gravados | Pendente de execução no XAMPP |
| T09 | Consultar detalhes do frete | Transportador, endereços e produtos aparecem | Pendente de execução no XAMPP |
| T10 | Filtrar relatório por data | Fretes daquela data aparecem | Pendente de execução no XAMPP |
| T11 | Exportar CSV | Arquivo CSV é baixado e abre corretamente | Pendente de execução no XAMPP |
| T12 | Enviar formulário sem campos obrigatórios | Sistema mostra validação e não grava dados | Pendente de execução no XAMPP |

## Verificações já realizadas no ambiente de preparação

- Verificação de sintaxe (`php -l`) de todos os arquivos PHP: sem erros de sintaxe.
- Ambiente de preparação não possui o driver `pdo_mysql`; portanto, não foi possível confirmar aqui a conexão com MySQL/MariaDB nem executar os fluxos integrados.
- Os testes acima devem ser marcados como concluídos somente após execução real no XAMPP.
