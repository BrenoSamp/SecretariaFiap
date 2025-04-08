<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matricular Aluno</title>
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
            /* Espaço entre os itens */
        }

        /* Estilo para quando a tela for pequena, a navbar colapsa */
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

        .btn-matricular {
            background-color: #008CBA;
            color: white;
            margin-top: 20px;
        }

        .table-title {
            font-size: 24px;
            font-weight: bold;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        /* Estilos do popup */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
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

        #alunoSelect {
            width: 100%;
            padding: 8px;
            margin-top: 10px;
        }

        /* Estilos para o popup de erro */
        .error-modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            padding-top: 60px;
        }

        .error-modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
        }

        .error-close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .error-close:hover,
        .error-close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
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
    <h2>Selecionar Turma e Matricular Aluno</h2>

    <label for="turmaSelect">Escolha uma Turma:</label>
    <select id="turmaSelect" onchange="carregarAlunosDaTurma()">
        <option value="">Selecione uma turma</option>
    </select>

    <div class="table-title">Alunos Matriculados</div>

    <table id="alunosTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Nascimento</th>
                <th>CPF</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <button id="matricularBtn" class="btn btn-matricular" onclick="exibirPopupMatricula()">Matricular Aluno</button>

    <div id="matriculaModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharPopupMatricula()">&times;</span>
            <h2>Selecione o Aluno</h2>
            <select id="alunoSelect">
                <option value="">Selecione um aluno</option>
            </select>
            <button class="btn btn-matricular" onclick="matricularAluno()">Matricular</button>
        </div>
    </div>

    <div id="errorModal" class="error-modal">
        <div class="error-modal-content">
            <span class="error-close" onclick="fecharErrorPopup()">&times;</span>
            <h2>Erro</h2>
            <p id="errorMessage"></p>
        </div>
    </div>

    <script>
        function exibirErrorPopup(message) {
            document.getElementById('errorMessage').textContent = message;
            document.getElementById('errorModal').style.display = 'block';
        }

        function fecharErrorPopup() {
            document.getElementById('errorModal').style.display = 'none';
        }

        function carregarTurmas() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Turma/ListarTurmasController', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        var turmas = response.data;
                        var turmaSelect = document.getElementById('turmaSelect');

                        turmaSelect.innerHTML = '<option value="">Selecione uma turma</option>';

                        turmas.forEach(function(turma) {
                            var option = document.createElement('option');
                            option.value = turma.id;
                            option.textContent = turma.nome + ' - ' + turma.descricao;
                            turmaSelect.appendChild(option);
                        });
                    } catch (e) {
                        console.error('Erro ao parsear o JSON:', e);
                    }
                } else if (xhr.status === 400) {
                    exibirErrorPopup('Erro ao carregar as turmas: ' + xhr.responseText);
                } else {
                    alert('Erro ao carregar as turmas.');
                }
            };
            xhr.send();
        }

        function carregarAlunos() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', '../Aluno/ListarAlunosController', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        var alunos = response.data;
                        var alunoSelect = document.getElementById('alunoSelect');

                        alunoSelect.innerHTML = '<option value="">Selecione um aluno</option>';

                        alunos.forEach(function(aluno) {
                            var option = document.createElement('option');
                            option.value = aluno.id;
                            option.textContent = aluno.nome;
                            alunoSelect.appendChild(option);
                        });
                    } catch (e) {
                        console.error('Erro ao parsear o JSON:', e);
                    }
                } else if (xhr.status === 400) {
                    exibirErrorPopup('Erro ao carregar os alunos: ' + xhr.responseText);
                } else {
                    alert('Erro ao carregar os alunos.');
                }
            };
            xhr.send();
        }
        function carregarAlunosDaTurma() {
            var turmaId = document.getElementById('turmaSelect').value;
            if (!turmaId) {
                alert('Selecione uma turma.');
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'AlunosMatriculadosController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        var alunos = response.data; 
                        var tabela = document.getElementById('alunosTable').getElementsByTagName('tbody')[0];


                        tabela.innerHTML = '';

                        alunos.forEach(function(aluno) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${aluno.id}</td>
                                <td>${aluno.nome}</td>
                                <td>${aluno.data_nascimento}</td>
                                <td>${aluno.cpf}</td>
                                <td>${aluno.email}</td>
                            `;
                            tabela.appendChild(tr);
                        });

                        document.getElementById('matricularBtn').style.display = 'inline-block';
                    } catch (e) {
                        console.error('Erro ao parsear o JSON:', e);
                        alert('Erro ao carregar os alunos.');
                    }
                } else if (xhr.status === 400) {
                    exibirErrorPopup('Erro ao carregar os alunos: ' + xhr.responseText);
                } else {
                    alert('Erro ao carregar os alunos.');
                }
            };
            xhr.send('turma_id=' + turmaId);
        }

        function matricularAluno() {
            var turmaId = document.getElementById('turmaSelect').value;
            if (!turmaId) {
                alert('Selecione uma turma.');
                return;
            }

            var alunoId = document.getElementById('alunoSelect').value;
            if (!alunoId) {
                alert('Selecione um aluno.');
                return;
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'MatricularAlunoController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    alert('Aluno matriculado com sucesso!');

                    carregarAlunosDaTurma();

                    fecharPopupMatricula();
                } else if (xhr.status === 400) {
                    exibirErrorPopup('Erro ao matricular aluno: ' + xhr.responseText);
                } else {
                    alert('Erro ao matricular o aluno.');
                }
            };
            xhr.send('aluno_id=' + alunoId + '&turma_id=' + turmaId);
        }

        function exibirPopupMatricula() {
            document.getElementById('matriculaModal').style.display = 'block';
            carregarAlunos();
        }

        function fecharPopupMatricula() {
            document.getElementById('matriculaModal').style.display = 'none';
        }

        window.onload = carregarTurmas;
    </script>
</body>

</html>