# Processo do desenvolvimento

## O que precisei entender

### contexto geral
  - primeiramente precisei entender de uma forma um pouco mais detalhada sobre o que é um convênio e como funciona. Entendi que um banco pode ter, por exemplo, um convênio de saúde e esse convênio pode ter vários serviços relacionados a ele, como por exemplo serviços de consulta médica e exames de laboratório. Os contratos são as informações de cada serviço fornecido pelo convênio
### objetivo da aplicação
  - depois de ter uma noção sobre o funcionamento do convênio em si, precisei entender qual seria o objetivo do sistema, e pelo que entendi, é um sistema de gerenciamento que pode servir principalmente para fazer análises, como no exemplo abaixo, que no caso mostra uma análise de quanto de verba cada banco forneceu, quanto já foi gasto e quanto de verba ainda resta:
  - ![alt text](image.png)

## Como desenvolvi

### Modelagem de dados
- depois de ter entendido as regras de negócio, o processo de modelagem ficou mais simples. Basicamente foi só eu ler o que tinha anotado sobre o que era um convênio e pude entender e definir os relacionamentos
  - ![alt text](image-1.png)
  `imagem do diagrama ER`

- obs: utilizei os campos `codigo` como chave primária para todas as tabelas

### sistema PHP
- para criar a lógica do script, eu utilizei uma mistura de código procedural para definir o fluxo do código junto com orientação a objetos para acessar os dados
- criei um arquivo separado para fazer a conexão com o banco de dados utilizando PDO, achei que seria melhor principalmente por questões de organização, já que a lógica da aplicação não fica misturada com a de conexão
- utilizei a biblioteca `phpdotenv` para permitir a aplicação usar arquivos de variáveis de ambiente (`.env`) para não deixar as credencias fixas no código. Optei por essa forma pois acredito que é a forma mais eficiente de lidar com variáveis de ambiente
- criei um teste automatizado de funcionalidade para validar a lógica do ``cli.php`` nos seguintes casos de uso:
  - quando existem dados, o teste verifica se o nome de cada campo da tabela foi retornado
  - quando não existem dados o teste verifica se a mensagem "nenhum registro encontrado" foi exibida
  
# Requisitos
- PHP 
- Composer
# Como rodar 
1. selecione o diretório ``/teste-php``
   
2. para instalar as dependências execute o comando:
    ```bash
    composer install
    ```

3. configure as variáveis de ambiente
    - execute o comando
        ```bash 
        cp .env.example .env
        ```
    - e depois configure as credenciais do banco de dados, que inicialmente vão estar assim:
        ```bash
        DB_HOST=localhost
        DB_NAME=faciltecDB
        DB_USER=root
        DB_PASS=password
        ```
4. para rodar o comando de listar:
   
    - **importante: o diretório `/teste-php` tem que estar selecionado**
    - com o diretório selecionado, execute:
        ```bash
        php cli.php listar
        ```
    - se tudo der certo, o comando deve exibir a listagem ou uma mensagem informando que não existe nenhum registro na tabela