<?php

namespace SecretariaFiap\Src\Controller\Matricula;

use SecretariaFiap\Src\Model\MatriculaOperations;
use Throwable;

class AlunosMatriculadosController
{
  private MatriculaOperations $matriculaOperations;

  public function __construct()
  {
    $this->matriculaOperations = new MatriculaOperations();
  }

  public function invoke(array $params)
  {
    try {
      $data = $this->matriculaOperations->getAlunosMatriculadosPorTurma($params['turma_id']);
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
