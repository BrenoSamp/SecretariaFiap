<?php

namespace SecretariaFiap\Src\Controller\Turma;

use SecretariaFiap\Src\Model\TurmaOperations;
use Throwable;

class ListarTurmasController
{
  private TurmaOperations $turmaOperations;

  public function __construct()
  {
    $this->turmaOperations = new TurmaOperations();
  }

  public function invoke()
  {
    try {
      $data = $this->turmaOperations->listarTurmasOrdemAlfabetica();
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
