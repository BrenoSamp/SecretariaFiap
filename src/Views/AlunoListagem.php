<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        .navbar {
            background-color: #007bff;
            padding: 10px 20px;
        }

        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.5rem;
        }

        .navbar-toggler {
            border-color: white;
        }

        .navbar-nav .nav-item .nav-link {
            color: white !important;
            font-weight: bold;
            padding: 10px 15px;
        }

        .navbar-nav .nav-item .nav-link:hover {
            background-color: #0056b3;
            border-radius: 5px;
        }

        .navbar-nav .nav-item:last-child .nav-link {
            color: #dc3545 !important;
            font-weight: bold;
        }

        .navbar-nav .nav-item:last-child .nav-link:hover {
            background-color: #c82333;
        }

        .navbar-nav {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .navbar-nav .nav-item {
            margin-left: 15px;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                justify-content: space-between;
                width: 100%;
            }
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .btn {
            padding: 5px 10px;
            margin-right: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
        }

        .btn-cadastrar {
            background-color: #008CBA;
            color: white;
            margin-bottom: 20px;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 10px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-error {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-error-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 300px;
            border-radius: 10px;
        }

        .error-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="/../Dashboard">Secretaria FIAP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/../Aluno/Listagem">👩‍🏫 Alunos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/../Turma/Listagem">📚 Turmas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/../Matricula/Listagem">🏫 Matrículas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/../Logout">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <h2>Lista de Alunos</h2>

    <button class="btn btn-cadastrar" onclick="abrirModalCadastro()">Cadastrar Aluno</button>

    <table id="alunosTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Senha</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div id="cadastroModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModalCadastro()">&times;</span>
            <h3>Cadastrar Aluno</h3>
            <form id="cadastroForm">
                <label for="cadastroNome">Nome:</label>
                <input type="text" id="cadastroNome" name="nome" required><br><br>

                <label for="cadastroDataNascimento">Data de Nascimento:</label>
                <input type="date" id="cadastroDataNascimento" name="data_nascimento" required><br><br>

                <label for="cadastroCpf">CPF:</label>
                <input type="text" id="cadastroCpf" name="cpf" required><br><br>

                <label for="cadastroEmail">E-mail:</label>
                <input type="email" id="cadastroEmail" name="email" required><br><br>

                <label for="cadastroSenha">Senha:</label>
                <input type="password" id="cadastroSenha" name="senha" required><br><br>

                <p id="senhaError" style="color: red; display: none;">A senha deve ter pelo menos 8 caracteres, incluindo letras maiúsculas, minúsculas e símbolos.</p>

                <button type="submit" class="btn btn-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModalEdit()">&times;</span>
            <h3>Editar Aluno</h3>
            <form id="editForm">
                <input type="hidden" id="editId" name="id">
                <label for="editNome">Nome:</label>
                <input type="text" id="editNome" name="nome" required><br><br>

                <label for="editDataNascimento">Data de Nascimento:</label>
                <input type="date" id="editDataNascimento" name="data_nascimento" required><br><br>

                <label for="editCpf">CPF:</label>
                <input type="text" id="editCpf" name="cpf" required><br><br>

                <label for="editEmail">E-mail:</label>
                <input type="email" id="editEmail" name="email" required><br><br>

                <label for="editSenha">Senha:</label>
                <input type="password" id="editSenha" name="senha" required><br><br>

                <button type="submit" class="btn btn-edit">Salvar Alterações</button>
            </form>
        </div>
    </div>

    <div id="errorModal" class="modal-error">
        <div class="modal-error-content">
            <span class="error-close" onclick="closeErrorModal()">&times;</span>
            <p id="errorMessage"></p>
        </div>
    </div>

    <script>
        function validarSenha(senha) {
            const regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/;
            return regex.test(senha);
        }

        document.getElementById('cadastroForm').onsubmit = function(event) {
            event.preventDefault(); 
            var nome = document.getElementById('cadastroNome').value;
            var data_nascimento = document.getElementById('cadastroDataNascimento').value;
            var cpf = document.getElementById('cadastroCpf').value;
            var email = document.getElementById('cadastroEmail').value;
            var senha = document.getElementById('cadastroSenha').value;
            var senhaError = document.getElementById('senhaError');

            if (!validarSenha(senha)) {
                senhaError.style.display = "block"; 
                return; 
            } else {
                senhaError.style.display = "none"; 
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'CadastrarAlunoController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    carregarAlunos();
                    fecharModalCadastro();
                } else if (xhr.status === 400) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        showError(response.message); 
                    } catch (e) {
                        showError("Erro ao cadastrar o aluno.");
                    }
                } else {
                    alert('Erro ao cadastrar o aluno.');
                }
            };
            xhr.send('nome=' + nome + '&data_nascimento=' + data_nascimento + '&cpf=' + cpf + '&email=' + email + '&senha=' + senha);
        }

        function abrirModalCadastro() {
            document.getElementById('cadastroModal').style.display = "block";
        }

        function fecharModalCadastro() {
            document.getElementById('cadastroModal').style.display = "none";
        }

        function showError(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorModal').style.display = "block";
        }

        function closeErrorModal() {
            document.getElementById('errorModal').style.display = "none";
        }

        window.onload = carregarAlunos;

        function carregarAlunos() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'ListarAlunosController', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    var alunos = response.data;
                    var tableBody = document.getElementById('alunosTable').getElementsByTagName('tbody')[0];
                    tableBody.innerHTML = "";

                    alunos.forEach(function(aluno) {
                        var row = tableBody.insertRow();
                        row.insertCell(0).textContent = aluno.id;
                        row.insertCell(1).textContent = aluno.nome;
                        row.insertCell(2).textContent = aluno.data_nascimento;
                        row.insertCell(3).textContent = aluno.cpf;
                        row.insertCell(4).textContent = aluno.email;
                        row.insertCell(5).textContent = aluno.senha;

                        var actionsCell = row.insertCell(6);
                        actionsCell.innerHTML = `
                            <button class="btn btn-edit" onclick="editarAluno(${aluno.id})">Editar</button>
                            <button class="btn btn-delete" onclick="deletarAluno(${aluno.id})">Excluir</button>
                        `;
                    });
                } else {
                    alert('Erro ao carregar os alunos.');
                }
            };
            xhr.send();
        }
    </script>
</body>

</html>
