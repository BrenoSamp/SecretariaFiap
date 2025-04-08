<?php

namespace SecretariaFiap\Src\Controller\Turma;

use Exception;
use SecretariaFiap\Src\Model\TurmaOperations;
use Throwable;

class CadastrarTurmaController
{
  private TurmaOperations $turmaOperations;

  public function __construct()
  {
    $this->turmaOperations = new TurmaOperations();
  }

  public function invoke(array $params)
  {
    try {
      $this->validarParametros($params);
      $data = $this->turmaOperations->cadastrarTurma(
        $params['nome'],
        $params['descricao']
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

  private function validarParametros(array $params): void
  {
    if (!isset($params['nome'])) {
      throw new Exception("Campo nome obrigatorio");
    }

    if (strlen($params['nome']) < 3) {
      throw new Exception("Nome deve possuir no mínimo 3 caracteres");
    }

    if (!isset($params['descricao'])) {
      throw new Exception("Campo Descrição obrigatorio");
    }
  }
}
