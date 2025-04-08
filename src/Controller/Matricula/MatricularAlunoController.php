<?php

namespace SecretariaFiap\Src\Controller\Matricula;

use SecretariaFiap\Src\Model\MatriculaOperations;
use Throwable;

class MatricularAlunoController
{
  private MatriculaOperations $matriculaOperations;

  public function __construct()
  {
    $this->matriculaOperations = new MatriculaOperations();
  }

  public function invoke($params)
  {
    try {
      $data = $this->matriculaOperations->matricularAlunoTurma($params['turma_id'], $params['aluno_id']);
      echo json_encode([
        'status' => 200,
        'message' => 'ok',
        'data' => $data
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
