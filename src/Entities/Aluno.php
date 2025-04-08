<?php

namespace SecretariaFiap\Src\Entities;

use Exception;

class Aluno extends Entity
{
    protected string $table = 'aluno';

    public function getAllOrderedByName(): array
    {
        $stmt = $this->query(
            "SELECT
                id,
                nome,
                data_nascimento,
                cpf,
                email,
                senha
            FROM
                {$this->table}
           ORDER BY nome ASC"
        );

        if ($stmt) {
            return $stmt->fetchAll();
        } else {
            throw new Exception("erro");
        }
    }

    public function findOneByCpfOrEmail(string $cpf, string $email): array|bool
    {
        $stmt = $this->query(
            "SELECT
                id
            FROM
                {$this->table}
           where cpf = ? or email = ?",
           [$cpf, $email]
        );

        if ($stmt) {
            return $stmt->fetch();
        } else {
            throw new Exception("erro");
        }
    }
}