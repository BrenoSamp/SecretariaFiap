<?php

namespace SecretariaFiap\Src\Controller\Aluno;

use SecretariaFiap\Src\Entities\Aluno;
use SecretariaFiap\Src\Model\AlunoOperations;
use Throwable;

class ListarAlunosController
{
  private AlunoOperations $alunoOperations;

  public function __construct()
  {
    $this->alunoOperations = new AlunoOperations(new Aluno());
  }

  public function invoke()
  {
    try {
      $data = $this->alunoOperations->listarAlunosOrdemAlfabetica();
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
