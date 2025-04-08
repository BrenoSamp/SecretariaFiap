<?php

namespace SecretariaFiap\Src\Model;

use Exception;
use SecretariaFiap\Src\Entities\Turma;

class TurmaOperations
{
    private Turma $turma;

    public function __construct() 
    {
        $this->turma = new Turma();
    }

    public function listarTurmasOrdemAlfabetica(): array
    {
        $turmas = $this->turma->getAllOrderedByName();

        if (empty($turmas)) {
            throw new Exception("Não foram encontrados registros");
        }

        return $turmas;
    }

    public function cadastrarTurma(
        string $nome,
        string $descricao
    ): void {
        $aluno = [
            'nome' => $nome,
            'descricao' => $descricao
        ];

        $this->turma->save($aluno);
    }

    public function removerTurmaById(int $id): void
    {
        $this->turma->delete($id);
    }

    public function editarTurma(
        int $id,
        string $nome,
        string $descricao
    ): void {
        $aluno = $this->turma->findOneById($id);

        if (!$aluno) {
            throw new \Exception("Usuário não encontrado");
        }

        $aluno = [
            'nome' => $nome,
            'descricao' => $descricao
        ];

        $this->turma->update($id, $aluno);
    }
}
