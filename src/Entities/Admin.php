<?php

namespace SecretariaFiap\Src\Entities;

use Exception;

class Admin extends Entity
{
    protected string $table = 'admin';

    public function getAdminByEmailAndSenha(string $email, string $senha): array|bool
    {
        $stmt = $this->query(
            "SELECT
                *
            FROM
                {$this->table}
            WHERE email = ? and senha = ?",
            [$email, $senha]
        );

        if ($stmt) {
            return $stmt->fetch();
        } else {
            throw new Exception("erro");
        }
    }
}