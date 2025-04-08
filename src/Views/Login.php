<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEJ6Hh0I2wEXz9r5G2dQp7P45Owh2gZkd6Q2k1Kvz3X9o2z7eFb6In5Q0IhXg" crossorigin="anonymous">
    
    <style>
        body {
            background-color: #f4f6f8;
            font-family: Arial, sans-serif;
        }

        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        h2 {
            font-size: 36px;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: bold;
        }

        .btn-login {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-login:hover {
            background-color: #218838;
        }

        .btn-register {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-register:hover {
            background-color: #0056b3;
        }

        #error-message {
            color: red;
            margin-top: 10px;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Secretaria FIAP</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" required>
            </div>
            <button type="button" id="loginButton" class="btn-login">Entrar</button>
        </form>
        <div id="error-message"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybYg6AZxv3t4zgdv3MFLQ9pFmATb2Vu4Zm6J00v9fPdxmXK6A" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0W9pFcs/pIn0n6wB5e3kPzdpdeUsIHFf4z4Q6Xz6Vb1JW2CZ" crossorigin="anonymous"></script>
    

<script>
        document.getElementById('loginButton').addEventListener('click', function(event) {
            event.preventDefault();

            var email = document.getElementById('email').value;
            var senha = document.getElementById('senha').value;

            var formData = new FormData();
            formData.append('email', email);
            formData.append('senha', senha);
            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'LoginController', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            xhr.onload = function() {
                if (xhr.status === 200) {
                    try {
                    var response = JSON.parse(xhr.responseText);

                     if (response.status === 200) {
                         window.location.href = 'Dashboard';
                     } else {
                         document.getElementById('error-message').textContent = response.message;
                     }
                    } catch (e) {
                        console.error('Erro ao parsear o JSON:', e);
                        console.error('Resposta recebida:', xhr.responseText);
                    }
                } else {
                    var response = JSON.parse(xhr.responseText);
                    errorMessageElement.textContent = response.message;
                    console.error('Erro na requisição', xhr.status, xhr.statusText);  
                }
            };

            xhr.send(new URLSearchParams(formData).toString());
        });
    </script>