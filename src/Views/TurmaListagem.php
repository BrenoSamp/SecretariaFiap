<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Turmas</title>
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
    <h2>Lista de Turmas</h2>

    <button class="btn btn-cadastrar" onclick="abrirModalCadastro()">Cadastrar Turma</button>

    <table id="turmasTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Quantidade de alunos matriculados</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div id="cadastroModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModalCadastro()">&times;</span>
            <h3>Cadastrar Turma</h3>
            <form id="cadastroForm">
                <label for="cadastroNome">Nome:</label>
                <input type="text" id="cadastroNome" name="nome" required><br><br>

                <label for="cadastroDescricao">Descrição:</label>
                <textarea id="cadastroDescricao" name="descricao" required></textarea><br><br>

                <button type="submit" class="btn btn-cadastrar">Cadastrar</button>
            </form>
        </div>
    </div>

    <div id="editModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="fecharModalEdit()">&times;</span>
            <h3>Editar Turma</h3>
            <form id="editForm">
                <input type="hidden" id="editId" name="id">
                <label for="editNome">Nome:</label>
                <input type="text" id="editNome" name="nome" required><br><br>

                <label for="editDescricao">Descrição:</label>
                <textarea id="editDescricao" name="descricao" required></textarea><br><br>

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
        function carregarTurmas() {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'ListarTurmasController', true);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        var turmas = response.data; 
                        var tabela = document.getElementById('turmasTable').getElementsByTagName('tbody')[0];

                        
                        tabela.innerHTML = '';

                        
                        turmas.forEach(function(turma) {
                            var tr = document.createElement('tr');
                            tr.innerHTML = `
                                <td>${turma.id}</td>
                                <td>${turma.nome}</td>
                                <td>${turma.descricao}</td>
                                <td>${turma.total_turma}</td>
                                <td>
                                    <button class="btn btn-edit" onclick="editarTurma(${turma.id}, '${turma.nome}', '${turma.descricao}')">Editar</button>
                                    <button class="btn btn-delete" onclick="excluirTurma(${turma.id})">Excluir</button>
                                </td>
                            `;
                            tabela.appendChild(tr);
                        });
                    } catch (e) {
                        console.error('Erro ao parsear o JSON:', e);
                        alert('Erro ao carregar os dados das turmas.');
                    }
                } else if (xhr.status === 400) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        showError(response.message); 
                    } catch (e) {
                        showError("Erro ao carregar a lista de turmas.");
                    }
                } else {
                    console.error('Erro na requisição', xhr.status, xhr.statusText);
                    alert('Não foi possível carregar a lista de turmas.');
                }
            };

            xhr.send();
        }

        
        function showError(message) {
            var errorModal = document.getElementById('errorModal');
            var errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message; 
            errorModal.style.display = "block"; 
        }

        
        function closeErrorModal() {
            var errorModal = document.getElementById('errorModal');
            errorModal.style.display = "none"; 
        }

        
        function editarTurma(id, nome, descricao) {
            
            document.getElementById('editId').value = id;
            document.getElementById('editNome').value = nome;
            document.getElementById('editDescricao').value = descricao;

            
            document.getElementById('editModal').style.display = "block";
        }

        
        function excluirTurma(id) {
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'DeletarTurmaController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    
                    carregarTurmas();
                } else {
                    alert('Erro ao excluir a turma.');
                }
            };
            xhr.send('id=' + id);
        }

        
        document.getElementById('editForm').onsubmit = function(event) {
            event.preventDefault(); 

            var id = document.getElementById('editId').value;
            var nome = document.getElementById('editNome').value;
            var descricao = document.getElementById('editDescricao').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'AtualizarTurmaController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    
                    carregarTurmas();
                    
                    document.getElementById('editModal').style.display = "none";
                } else if (xhr.status === 400) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        showError(response.message); 
                    } catch (e) {
                        showError("Erro ao editar a turma.");
                    }
                } else {
                    alert('Erro ao editar a turma.');
                }
            };
            xhr.send('id=' + id + '&nome=' + nome + '&descricao=' + descricao);
        }

        
        document.getElementById('cadastroForm').onsubmit = function(event) {
            event.preventDefault(); 

            var nome = document.getElementById('cadastroNome').value;
            var descricao = document.getElementById('cadastroDescricao').value;

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'CadastrarTurmaController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    
                    carregarTurmas();
                    
                    fecharModalCadastro();
                } else if (xhr.status === 400) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        showError(response.message); 
                    } catch (e) {
                        showError("Erro ao cadastrar a turma.");
                    }
                } else {
                    alert('Erro ao cadastrar a turma.');
                }
            };
            xhr.send('nome=' + nome + '&descricao=' + descricao);
        }

        
        function abrirModalCadastro() {
            document.getElementById('cadastroModal').style.display = "block";
        }

        function fecharModalCadastro() {
            document.getElementById('cadastroModal').style.display = "none";
        }

        function fecharModalEdit() {
            document.getElementById('editModal').style.display = "none";
        }

        
        window.onload = carregarTurmas;
    </script>
</body>

</html>