# Sistema de Gestão de Biblioteca

Este projeto é um sistema de gestão de biblioteca desenvolvido em PHP, oferecendo funcionalidades para cadastro de usuários, autenticação e registro de livros.

## 📋 Visão Geral

O sistema permite que usuários se cadastrem, façam login e registrem livros em uma biblioteca digital. Com uma interface moderna e responsiva, o sistema oferece uma experiência de usuário agradável e intuitiva.

## ✨ Funcionalidades

- **Cadastro de Usuários**: Registro de novos usuários com validação de dados
- **Autenticação**: Sistema de login seguro com verificação de credenciais
- **Cadastro de Livros**: Adição de novos livros ao acervo da biblioteca
- **Feedback Visual**: Notificações de sucesso e erro para interações do usuário
- **Proteção contra SQL Injection**: Utilização de prepared statements para segurança

## 🛠️ Tecnologias Utilizadas

- **PHP**: Linguagem de programação server-side para processamento de formulários e lógica de negócio
- **MySQL**: Sistema de gerenciamento de banco de dados para armazenamento de informações
- **HTML5**: Estruturação do conteúdo das páginas
- **TailwindCSS**: Framework CSS para estilização moderna e responsiva
- **Sessions**: Gerenciamento de estado e mensagens entre requisições
- **Password Hashing**: Armazenamento seguro de senhas com funções de hash nativas do PHP

## 🔐 Segurança

O sistema implementa diversas práticas de segurança:

- Proteção contra SQL Injection através de prepared statements
- Sanitização de inputs com `htmlspecialchars`
- Armazenamento seguro de senhas utilizando o algoritmo `PASSWORD_DEFAULT` do PHP
- Validação de dados do formulário tanto no cliente quanto no servidor
- Feedback genérico para falhas de login, evitando vazamento de informações

## 📁 Estrutura do Projeto

```
.
├── cadastrarlivro.php    # Formulário e processamento para cadastro de livros
├── conexao.php           # Configuração de conexão com o banco de dados
├── dashboard.php         # Página principal após autenticação
├── index.php             # Página de cadastro de usuários
├── login.php             # Página de autenticação de usuários
└── README.md             # Documentação do projeto
```

## 💻 Pré-requisitos

- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache, Nginx, etc.)

## 🚀 Instalação

1. Clone o repositório para o seu servidor web
2. Configure o arquivo `conexao.php` com suas credenciais de banco de dados
3. Crie as tabelas necessárias no banco de dados:

```sql
CREATE TABLE usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    email VARCHAR(200) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE livro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(200) NOT NULL,
    autor VARCHAR(200) NOT NULL,
    paginas INT NOT NULL
);
```

4. Acesse o sistema pelo navegador

## 🎨 Interface

O sistema utiliza uma combinação de TailwindCSS com design moderno, apresentando:

- Paleta de cores baseada em tons de verde esmeralda e turquesa
- Interface responsiva adaptável a diferentes dispositivos
- Formulários com validação e feedback visual
- Elementos com efeitos sutis de transição e hover
- Notificações coloridas para sucesso e erro

## 🤝 Contribuição

Contribuições são bem-vindas! Para contribuir:

1. Faça um fork do projeto
2. Crie uma branch para sua feature (`git checkout -b feature/nova-funcionalidade`)
3. Commit suas mudanças (`git commit -m 'Adiciona nova funcionalidade'`)
4. Push para a branch (`git push origin feature/nova-funcionalidade`)
5. Abra um Pull Request

## 👤 Autor

Desenvolvido por Rafael de Sá