<?php

namespace SecretariaFiap\Src\Controller\Auth;

use SecretariaFiap\Src\Entities\Admin;
use SecretariaFiap\Src\Model\LoginOperations;
use Throwable;

class LoginController
{
  private LoginOperations $loginOperations;

  public function __construct()
  {
    $this->loginOperations = new LoginOperations(new Admin());
  }

  public function invoke()
  {
    try {
      $data = $this->loginOperations->login($_POST['email'] ?? '', $_POST['senha'] ?? '');
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
