<?php

namespace SecretariaFiap\Src\Controller\Aluno;

use SecretariaFiap\Src\Entities\Aluno;
use SecretariaFiap\Src\Model\AlunoOperations;
use Throwable;

class AtualizarAlunoController
{
  private AlunoOperations $alunoOperations;

  public function __construct()
  {
    $this->alunoOperations = new AlunoOperations(new Aluno());
  }

  public function invoke(array $params)
  {
    try {
      $this->alunoOperations->editarAluno(
        $params['id'],
        $params['nome'],
        $params['data_nascimento'],
        $params['cpf'],
        $params['email'],
        $params['senha'],
    );
      echo json_encode([
        'status' => 204,
        'message' => 'ok',
        'data' => []
      ]);
    } catch (Throwable $e) {
      echo json_encode([
        'status' => 400,
        'data' => [],
        'message' => $e->getMessage()
      ]);
    }
  }
}
