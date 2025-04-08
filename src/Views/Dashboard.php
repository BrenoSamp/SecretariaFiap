<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Secretaria FIAP</title>

    <link rel="stylesheet" href="./css/navbar.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6Hh0I2wEXz9r5G2dQp7P45Owh2gZkd6Q2k1Kvz3X9o2z7eFb6In5Q0IhXg" crossorigin="anonymous">

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

        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
            margin-top: 60px;
        }

        .dashboard-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 30px;
        }

        h1 {
            font-size: 36px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 20px;
        }

        p {
            font-size: 18px;
            text-align: center;
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
    </style>
</head>
<body>
  <!-- Navbar -->
  <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Secretaria FIAP</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Aluno/Listagem">👩‍🏫 Alunos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Turma/Listagem">📚 Turmas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Matricula/Listagem">🏫 Matrículas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Logout">Sair</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="dashboard-container">
        <h1>Bem-vindo ao Dashboard</h1>
        <p>Escolha uma das opções no menu acima para gerenciar Alunos, Turmas ou Matrículas.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybYg6AZxv3t4zgdv3MFLQ9pFmATb2Vu4Zm6J00v9fPdxmXK6A" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0W9pFcs/pIn0n6wB5e3kPzdpdeUsIHFf4z4Q6Xz6Vb1JW2CZ" crossorigin="anonymous"></script>
</body>
</html>
