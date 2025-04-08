<?php

namespace SecretariaFiap\Src\Entities;

use Exception;

class Turma extends Entity
{
    protected string $table = 'turma';

    public function getAllOrderedByName(): array
    {
        $stmt = $this->query(
            "SELECT
                t.id,
                t.nome,
                t.descricao,
                COUNT(m.aluno_id) AS total_turma 
            FROM
                {$this->table} t
            LEFT JOIN matricula m ON m.turma_id = t.id
            GROUP BY t.id, t.nome, t.descricao
           ORDER BY nome ASC"
        );

        if ($stmt) {
            return $stmt->fetchAll();
        } else {
            throw new Exception("erro");
        }
    }
}