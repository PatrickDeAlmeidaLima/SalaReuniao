# Sistema de Gerenciamento de Pessoas e Salas

Este projeto foi desenvolvido para gerenciar pessoas, salas e espaços de café em um evento. Permite registrar pessoas, associá-las a salas e espaços de café, e acompanhar suas alocações durante o evento.

## Tecnologias Utilizadas

- **Laravel** (Backend)  
- **PHP** (Backend)  
- **MySQL** (Banco de Dados)  
- **Blade** (Template Engine)  
- **CSS** (Estilização)  
- **Font Awesome** (Ícones)
  
## Requisitos

- **PHP** >= 7.4  
- **Composer** (gerenciador de dependências PHP)  
- **MySQL** ou **MariaDB**  
- **Node.js** (caso deseje rodar o frontend com Laravel Mix)

## Instalação

### Passo 1: Clonar o repositório

```bash
git clone https://github.com/PatrickDeAlmeidaLima/seu-repositorio.git
cd seu-repositorio
```

### Passo 2: Instalar as dependências PHP

Dentro do diretório do projeto, execute o seguinte comando para instalar as dependências do Laravel:

```bash
composer install
```

### Passo 3: Configurar o Banco de Dados

1. Renomeie o arquivo `.env.example` para `.env`.
2. Configure as credenciais do banco de dados no arquivo `.env`. Exemplo:

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### Passo 4: Gerar a chave de aplicação

Execute o comando abaixo para gerar a chave de aplicação do Laravel:

```bash
php artisan key:generate
```

### Passo 5: Rodar as migrações

Execute as migrações para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

### Passo 6: Rodar o Servidor de Desenvolvimento

Agora, você pode rodar o servidor local:

```bash
php artisan serve
```

O projeto estará disponível em `http://localhost:8000`.

## Funcionalidades

- **Cadastro de Pessoas**: Permite cadastrar novas pessoas no sistema.  
- **Cadastro de Salas**: Permite cadastrar novas salas para eventos.  
- **Atribuição de Salas e Café**: Atribui salas e espaços de café a pessoas, com informações sobre a etapa e capacidade das salas.  
- **Busca de Pessoas e Salas**: Funcionalidade de busca por nome de pessoa e sala.
  
## Estrutura do Projeto

/app /Models /Http /Controllers /database /migrations /resources /views /routes /web.php

### Models

- **Pessoa**: Representa uma pessoa no sistema. Relacionada com **Sala** e **EspacoCafe**.
- **Sala**: Representa uma sala no evento. Relacionada com **Pessoa** e **EspacoCafe**.
- **EspacoCafe**: Representa um espaço de café associado a uma sala e etapa.
  
### Controllers

- **PessoaController**: Controlador para gerenciar as pessoas no sistema.
- **SalaController**: Controlador para gerenciar as salas de evento.

### Routes

- **/pessoas**: Exibe a lista de pessoas e permite cadastrar, editar e excluir.
- **/salas**: Exibe a lista de salas e permite cadastrar, editar e excluir.

## Contribuição

1. Faça o fork do repositório.
2. Crie uma branch para sua feature (`git checkout -b minha-feature`).
3. Comite suas mudanças (`git commit -am 'Adicionando nova feature'`).
4. Push para a branch (`git push origin minha-feature`).
5. Abra um Pull Request.

## Licença

Este projeto é licenciado sob a MIT License - consulte o arquivo [LICENSE](LICENSE) para mais detalhes.

---

**Nota**: Esse é um template básico e pode ser adaptado conforme as especificidades do seu projeto.
