<?php

namespace SecretariaFiap\Src\Model;

use Exception;
use SecretariaFiap\Src\Entities\Admin;

class LoginOperations
{
    public function __construct(private Admin $admin)
    {
        
    }

    public function login(string $email, string $senha)
    {
          $admin = $this->admin->getAdminByEmailAndSenha($email, $senha);

            if ($admin) {
                $_SESSION['usuario_logado'] = true;
                
                return [];
            } else {
                throw new Exception("E-mail ou senha incorreto(s).");
            }
    }
}
