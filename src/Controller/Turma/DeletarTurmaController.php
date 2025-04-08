<?php

namespace SecretariaFiap\Src\Controller\Turma;

use SecretariaFiap\Src\Model\TurmaOperations;
use Throwable;

class DeletarTurmaController
{
  private TurmaOperations $turmaOperations;

  public function __construct()
  {
    $this->turmaOperations = new TurmaOperations();
  }

  public function invoke(array $params)
  {
    try {
      $data = $this->turmaOperations->removerTurmaById(
        $params['id']
    );

      echo json_encode([
        'status' => 204,
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
