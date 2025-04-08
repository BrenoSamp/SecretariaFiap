<?php

require_once __DIR__ . '/vendor/autoload.php';

use SecretariaFiap\Src\Controller\Aluno\AtualizarAlunoController;
use SecretariaFiap\Src\Controller\Auth\LoginController;
use SecretariaFiap\Src\Controller\Aluno\CadastrarAlunoController;
use SecretariaFiap\Src\Controller\Aluno\DeletarAlunoController;
use SecretariaFiap\Src\Controller\Aluno\ListarAlunosController;
use SecretariaFiap\Src\Controller\Matricula\AlunosMatriculadosController;
use SecretariaFiap\Src\Controller\Matricula\MatricularAlunoController;
use SecretariaFiap\Src\Controller\Turma\AtualizarTurmaController;
use SecretariaFiap\Src\Controller\Turma\CadastrarTurmaController;
use SecretariaFiap\Src\Controller\Turma\DeletarTurmaController;
use SecretariaFiap\Src\Controller\Turma\ListarTurmasController;

// Carregando configurações
$config = require 'config/settings.php';
session_start();

// Definir o fuso horário
date_default_timezone_set($config['settings.timezone']);

// Função para carregar views
function renderView(string $viewName, array $data = [], bool $validarUsuarioLogado = false)
{
    extract($data); // Extrai as variáveis do array $data para o escopo
    $viewFile = __DIR__ . "/src/Views/{$viewName}.php";

    if (file_exists($viewFile)) {
        if ($validarUsuarioLogado && usuarioEstaLogado()) {
            include $viewFile;
        } else if ($validarUsuarioLogado && !usuarioEstaLogado()) {
            include __DIR__ . "/src/Views/SemAcesso.php";
        } else {
            include $viewFile;
        }
    } else {
        echo "View não encontrada: {$viewName}";
    }
}

function usuarioEstaLogado()
{
    if (isset($_SESSION['usuario_logado'])) {
        return true;
    }
    return false;
}

// Roteamento simples com base na URL
$requestUri = $_SERVER['REQUEST_URI'];

switch ($requestUri) {
    // rotas auth
    case '/':
        renderView('Login');
        break;
    case '/LoginController':
        $controller = new LoginController();
        return $controller->invoke();
        // rotas dash
    case '/Dashboard':
        renderView('Dashboard', [], true);
        break;

    // rotas aluno
    case '/Aluno/Listagem':
        renderView('AlunoListagem', [], true);
        break;
    case '/Aluno/ListarAlunosController':
        $controller = new ListarAlunosController();
        return $controller->invoke();
    case '/Aluno/CadastrarAlunoController':
        $controller = new CadastrarAlunoController();
        return $controller->invoke($_POST);
    case '/Aluno/DeletarAlunoController':
        $controller = new DeletarAlunoController();
        return $controller->invoke($_POST);
    case '/Aluno/AtualizarAlunoController':
        $controller = new AtualizarAlunoController();
        return $controller->invoke($_POST);

    // rotas turma
    case '/Turma/Listagem':
        renderView('TurmaListagem', [], true);
        break;
    case '/Turma/ListarTurmasController':
        $controller = new ListarTurmasController();
        return $controller->invoke();
    case '/Turma/CadastrarTurmaController':
        $controller = new CadastrarTurmaController();
        return $controller->invoke($_POST);
    case '/Turma/DeletarTurmaController':
        $controller = new DeletarTurmaController();
        return $controller->invoke($_POST);
    case '/Turma/AtualizarTurmaController':
        $controller = new AtualizarTurmaController();
        return $controller->invoke($_POST);
    
    // rotas matricula
    case '/Matricula/Listagem':
        renderView('MatriculaListagem', [], true);
        break;
    case '/Matricula/AlunosMatriculadosController':
        $controller = new AlunosMatriculadosController();
        return $controller->invoke($_POST);
        break;
    case '/Matricula/MatricularAlunoController':
        $controller = new MatricularAlunoController();
        return $controller->invoke($_POST);
        break;
    case '/Logout':
        $_SESSION['usuario_logado'] = false;
        session_destroy();
        renderView('Login');
        break;
    default:
        renderView('404');
        break;
}
