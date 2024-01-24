<h1 align="center">Sistema para Gerenciamento de Banco de Horas</h1>

<p align="center">Esse Sistema foi desenvolvido em</p>

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

## Sobre o Projeto

O sistema de banco de horas desenvolvido em Laravel proporciona uma solução flexível para atender às necessidades diversas de empresas. O sistema multiusuário permite que organizações de diferentes setores personalizem e gerenciem de forma eficiente o controle de horas extras trabalhadas pelos funcionários. <br>
Banco de horas é um acordo entre empregador e empregado que busca flexibilizar o horário de trabalho do empregado em troca de compensação futura.
O Sistema Banco de Horas busca facilitar o gerenciamento das horas trabalhadas pelos funcionários de uma empresa, por meio de um sistema simples de ser utilizado.


### Features

- [x] Cadastro de Usuário
- [x] Cadastro de Administrador
- [x] Cadastro de Supervisor
- [x] Cadastro de Setores
- [x] Lancamento de horas
- [x] Relatório

### 🛠 Tecnologias

As seguintes ferramentas foram usadas na construção do projeto:

- [laravel](https://laravel.com)
- [bootstrap](https://getbootstrap.com/)

## Screenshots

<img src="/z_screenshots/login.png"><br>
<img src="/z_screenshots/01.png"><br>
<img src="/z_screenshots/02.png"><br>
<img src="/z_screenshots/03.png"><br>
<img src="/z_screenshots/04.png"><br>
<img src="/z_screenshots/05.png"><br>
<img src="/z_screenshots/06.png"><br>
<br><br>
<p>Relatório em pdf</p>
<img src="/z_screenshots/07.png">

### Pré-requisitos

Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:
[Git](https://git-scm.com). 
[composer](https://getcomposer.org/)
Além disto é bom ter um editor para trabalhar com o código como [VSCode](https://code.visualstudio.com/)


### 🎲 Rodando o Sistema (servidor local)

```bash
# Clone este repositório ou faça o download
$ git clone <https://github.com/fabiosalum/bcohoras>

# utilizando o xampp insira os arquivos na pasta htdocs

# Utilizando o Vscode abra o terminal e navegue até a pasta do diretório

# Utilize o composer para instalar as dependências

$ composer update

# Crie um Banco de Dados MySql com o nome de sua preferência e altere o arquivo .ENV da aplicação insira o nome do banco, usuário e senha

# Execute o comando para rodar as migrações
$ php artisan migrate

# Execute o comando para rodar as Seeders
$ php artisan db:seed

# Execute o servidor do Laravel utilizando o comando
$ php artisan serve

# O sistema está pronto para rodar no servidor local
```


### Usuários

Para acessar o sistema utilize os usuários abaixo

Administrador<br><br>
login -> admin@gmail.com <br>
senha -> 12345

Supervisor<br><br>
login -> supervior@gmail.com<br>
senha -> 12345

Usuário<br><br>
login -> user@gmail.com<br>
senha -> 12345



### Autor
---

<a href="https://fabiosalum.com.br">
 <img style="border-radius: 50%;" src="/z_screenshots/foto-fabio.jpg" width="100px;" alt="Fábio Salum"/>
 <br />
 <sub><b>Fábio Melo Salum</b></sub></a> <a href="https://fabiosalum.com.br" title="Fabio Salum">🚀</a>


Feito por Fábio Melo Salum 👋🏽 Entre em contato!

[![Linkedin Badge](https://img.shields.io/badge/-Fabio-blue?style=flat-square&logo=Linkedin&logoColor=white&link=https://www.linkedin.com/in/fabio-melo-salum-32b7a026/)](https://www.linkedin.com/in/fabio-melo-salum-32b7a026//) 
[![Gmail Badge](https://img.shields.io/badge/-fabiomelosalum@gmail.com-c14438?style=flat-square&logo=Gmail&logoColor=white&link=mailto:fabiomelosalum@gmail.com)](mailto:fabiomelosalum@gmail.com) <br>
[![Instagram](https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white)](instagram.com/fabiomelosalum)
