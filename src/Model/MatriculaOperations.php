<?php

namespace SecretariaFiap\Src\Model;

use Exception;
use SecretariaFiap\Src\Entities\Aluno;
use SecretariaFiap\Src\Entities\Matricula;
use SecretariaFiap\Src\Entities\Turma;

class MatriculaOperations
{
    private Matricula $matricula;
    private Aluno $aluno;
    private Turma $turma;

    public function __construct()
    {
        $this->matricula = new Matricula();
        $this->aluno = new Aluno();
        $this->turma = new Turma();
    }

    public function getAlunosMatriculadosPorTurma(int $turmaId): array
    {
        return $this->matricula->findAlunosMatriculadosByIdTurma($turmaId);
    }

    public function matricularAlunoTurma(int $turmaId, int $alunoId): void
    {
        $turma = $this->turma->findOneById($turmaId);
        if (!$turma) {
            throw new Exception("Turma não existe");
        }

        $aluno = $this->aluno->findOneById($alunoId);
        if (!$aluno) {
            throw new Exception("Aluno não existe");
        }

        if ($this->matricula->findOneByTurmaIdAndAlunoId($turmaId, $alunoId)) {
            throw new Exception("Aluno {$aluno['nome']} já matriculado na turma {$turma['nome']}");
        }

        $this->matricula->save([
            'turma_id' => $turmaId,
            'aluno_id' => $alunoId
        ]);
    }
}
