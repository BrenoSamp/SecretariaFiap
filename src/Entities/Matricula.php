<?php

namespace SecretariaFiap\Src\Entities;

use Exception;

class Matricula extends Entity
{
    protected string $table = 'matricula';

    public function findAlunosMatriculadosByIdTurma(int $turmaId): array
    {
        $stmt = $this->query(
            "SELECT
                a.id,
                a.nome,
                a.data_nascimento,
                a.cpf,
                a.email
            FROM aluno a
            JOIN matricula m on m.aluno_id = a.id
            where m.turma_id = ?
           ORDER BY a.nome ASC",
           [$turmaId]
        );

        if ($stmt) {
            return $stmt->fetchAll();
        } else {
            throw new Exception("erro");
        }
    }

    public function findOneByTurmaIdAndAlunoId(int $turmaId, int $alunoId): array|bool
    {
        $stmt = $this->query(
            "SELECT
              *
            FROM {$this->table}
            where turma_id = ? and aluno_id = ?
           LIMIT 1",
           [$turmaId, $alunoId]
        );

        if ($stmt) {
            return $stmt->fetch();
        } else {
            throw new Exception("erro");
        }
    }
}