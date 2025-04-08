<?php

namespace SecretariaFiap\Src\Controller\Aluno;

use Exception;
use SecretariaFiap\Src\Entities\Aluno;
use SecretariaFiap\Src\Model\AlunoOperations;
use Throwable;

class CadastrarAlunoController
{
  private AlunoOperations $alunoOperations;

  public function __construct()
  {
    $this->alunoOperations = new AlunoOperations(new Aluno());
  }

  public function invoke(array $params)
  {
    try {
      $this->validarParametros($params);
      $this->alunoOperations->cadastrarAluno(
        $params['nome'],
        $params['data_nascimento'],
        $params['cpf'],
        $params['email'],
        $params['senha'],
    );
      echo json_encode([
        'status' => 204,
        'message' => 'ok'
      ]);
    } catch (Throwable $e) {
      echo json_encode([
        'status' => 400,
        'data' => [],
        'message' => $e->getMessage()
      ]);
    }
  }

  private function validarParametros(array $params): void
  {
    if (!isset($params['nome'])) {
      throw new Exception("Campo nome obrigatorio");
    }

    if (strlen($params['nome']) < 3) {
      throw new Exception("Nome deve possuir no mínimo 3 caracteres");
    }

    if (!isset($params['data_nascimento'])) {
      throw new Exception("Campo Data de nascimento obrigatorio");
    }
    if (!isset($params['cpf'])) {
      throw new Exception("Campo CPF obrigatorio");
    }
    if (!isset($params['email'])) {
      throw new Exception("Campo email obrigatorio");
    }
    if (!isset($params['senha'])) {
      throw new Exception("Campo senha obrigatorio");
    }
    $senha = $params['senha'];
    if (strlen($senha) < 8) {
        throw new Exception("A senha deve ter pelo menos 8 caracteres.");
    }
    
    if (!preg_match('/[A-Z]/', $senha)) {
        throw new Exception("A senha deve conter pelo menos uma letra maiúscula.");
    }
    
    if (!preg_match('/[a-z]/', $senha)) {
        throw new Exception("A senha deve conter pelo menos uma letra minúscula.");
    }
    
    if (!preg_match('/[!@#$%^&*(),.?":{}|<>]/', $senha)) {
        throw new Exception("A senha deve conter pelo menos um símbolo especial.");
    }
  }
}
