# Sistema de agendamento de ususarios e tarefas via crud.


### 📋 Objetivo: ajudar empresas a gerenciarem os agendamentos de tarefas e cadastro de usuarios em uma plataforma com crud integrado

## 💻 Tecnologias utilizadas: 
PHP (logica com banco de dados), HTML, CSS, JS, MySql (uso moderado de ia para correções de bugs e criação do front-end)

 
### 🗂️ Estrutura do Projeto

```text
crud-agendamento-tarefas/
│
├── index.php
│
├── sistema/
│   ├── conexao.php
│   ├── validar.php
│   ├── login.php
│   ├── logout.php
│   └── dashboard.php
│
├── usuarios/
│   ├── cadastrar_usuario.php
│   ├── editar_usuario.php
│   └── excluir_usuario.php
│
└── tarefas/
    ├── cadastrar_tarefa.php
    ├── editar_tarefa.php
    └── excluir_tarefa.php
```
# 🪛 Instalação: 
  - ## Configurar banco de dados:
  1. Verifique se Xampp está instalado na sua maquina.
  2. Abre o xampp e ative as opções 'Apache' e 'MySql'.
  3. Em um navegador acesse 'localhost' e entre no 'phpMyadmin'.
  4. Copie o codigo sql a baixo e crie o banco de dados na aba sql no 'phpMyadmin':
  
   Codigo Sql:
  
    ``` text
    CREATE DATABASE empresa_agendamento;
    
    USE empresa_agendamento;
    
    CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100),
    email VARCHAR(100),
    senha VARCHAR(100)
    );
    
    CREATE TABLE tarefas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    descricao TEXT,
    data_tarefa DATE,
    status VARCHAR(50)
    );
    ```
  
  - ## Git clone via Visual Studio Code:
  1. Verifique se git está instalado na sua maquina.
  2. Crie uma nova pasta na pasta htdocs dentro do xampp encontrado no disco local C.
  3. Copie o url desse repositorio 'https://github.com/RloanBRG/crud-agendamento-tarefas'
  4. Abre um novo terminal e digite git clone 'repositorio' e aperte enter
  5. Uma pasta sera gerada contendo os arquivos .php e suas pastas
  6. o camanho final deve ser parecido com isso "C:/xampp/htdocs/nova_pasta/crud-agendamento-tarefas"
  
  - ## Teste do sistema:
  1. Acesse 'localhost/nova_pasta/crud-agendamento-tarefas', uma tela de login deve aparecer.
  2. O sistema deve funcionar de imediato, basta registrar um novo usuario/funcionario para acessar o dashboard.
  3. Em caso de erros:
  4. Verificar se o nome do banco de dados esta igual ao que o arquivo conexao.php requere "empresa_agendamento".
  5. Verificar se o Xampp esta ativado durante o uso do sistema. 

## 📷 Prints:
 
- Tela de login
<img width="1366" height="768" title="Tela de login" alt="tela de login" src="https://github.com/user-attachments/assets/c3179dff-95f4-427b-a02f-b61758670482" /> <br></br>
 
- Tela de login (registro)
<img width="1366" height="768" title="Tela de login (registro)" alt="campo para registro" src="https://github.com/user-attachments/assets/19e34fcc-03ce-4372-ae36-52f95cb97c51" /> <br></br>
 
- Dashboard
<img width="1366" height="768" title="Dashboard" alt="Dashboard funcionarios" src="https://github.com/user-attachments/assets/39f45dac-9ea4-43bd-a4cb-88ca749dac15" /> <br></br>
 
- Dashboard (aba de tarefas)
<img width="1366" height="768" title="Dashboard aba tarefas" alt="Dashboard Tarefas" src="https://github.com/user-attachments/assets/2eeddb15-56a0-4f75-978f-6b3d5192413d" /> <br></br>
 
- Cadastro de Funcionarios
<img width="1366" height="768" title="Cadastro de funcionarios" alt="Cadastro funcionarios" src="https://github.com/user-attachments/assets/5d4e20e3-8b27-4c41-bade-80c25abd0aa9" /> <br></br>

- Cadastro confirmado
<img width="1366" height="768" tittle="cadastro confirmado" alt="Cadastro confirmado" src="https://github.com/user-attachments/assets/a25bb59d-2850-424d-b728-2d801536139e" /> <br></br>
 
- Cadastro de Tarefas
<img width="1366" height="768" title="Cadastro de tarefas" alt="Cadastro Tarefas" src="https://github.com/user-attachments/assets/f23e31c8-c4fa-4fbf-8c34-d75de53e63a4" /> <br></br>
 
- Cadastro confirmado de Tarefas
<img width="1366" height="768" tittle="cadastro tarefas confirmado" alt="Cadastro tarefas confirmado" src="https://github.com/user-attachments/assets/6b256e3d-ef46-4e96-9f6b-fd03f69b11e8" /> <br></br>
 
- Editar Funcionario
<img width="1366" height="768" tittle="Editar funcionario" alt="Editar funcionario" src="https://github.com/user-attachments/assets/6137a55e-902d-46a6-803b-4fd008d82e07" /> <br></br>
 
- Edição de funcionario confirmado
<img width="1366" height="768" tittle="Editar funcionario confirmado" alt="Editar funcionario confirmado" src="https://github.com/user-attachments/assets/1b6ba30e-dbd9-4890-ac9a-42e5146f7b32" /> <br></br>
 
- Editar Tarefa
<img width="1366" height="768" tittle="Editar Tarefa" alt="Editar Tarefa" src="https://github.com/user-attachments/assets/76dc2dbc-2435-4375-9053-42568d020726" /> <br></br>
 
- Edição de Tarefa confirmado
<img width="1366" height="768" tittle="Editar tarefa confirmado" alt="Editar tarefa confirmado" src="https://github.com/user-attachments/assets/7cde851b-ed29-422a-b411-a04d64732882" /> <br></br>
 
- Excluir Funcionario
<img width="1366" height="768" tittle="Excluir Funcionario" alt="Excluir Funcionario" src="https://github.com/user-attachments/assets/69b069ac-cf0e-4a54-b450-5e95bf02331b" /> <br></br>
 
- Excluir Funcionario confirmado
<img width="1366" height="768" tittle="Excluir Funcionario confirmado" alt="Excluir Funcionario confirmado" src="https://github.com/user-attachments/assets/1066cf8b-b6ab-4991-98a8-b017b2295f50" /> <br></br>
 
- Excluir Tarefa 
<img width="1366" height="768" tittle="Excluir Tarefa" alt="Excluir Tarefa" src="https://github.com/user-attachments/assets/bb20ccd3-2305-4141-8c98-ab22e4a9f08f" /> <br></br>
 
- Excluir Tarefa confirmado
<img width="1366" height="768" tittle="Excluir Tarefa confirmado" alt="Excluir Tarefa confirmado" src="https://github.com/user-attachments/assets/4e15c21e-9a5b-4862-a87c-bfb8145846bf" />
