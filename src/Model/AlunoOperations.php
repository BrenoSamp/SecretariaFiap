<?php

namespace SecretariaFiap\Src\Model;

use Exception;
use SecretariaFiap\Src\Entities\Aluno;

class AlunoOperations
{
    public function __construct( private Aluno $aluno) 
    { 
    }

    public function listarAlunosOrdemAlfabetica(): array
    {
        $alunos = $this->aluno->getAllOrderedByName();

        if (empty($alunos)) {
            throw new Exception("Não foram encontrados registros");
        }

        return $alunos;
    }

    public function cadastrarAluno(
        string $nome,
        string $dataNascimento,
        string $cpf,
        string $email,
        string $senha
    ): void {
        if($this->aluno->findOneByCpfOrEmail($cpf, $email))
        {
            throw new Exception("Aluno já cadastrado");
        }

        $aluno = [
            'nome' => $nome,
            'data_nascimento' => $dataNascimento,
            'cpf' => $cpf,
            'email' => $email,
            'senha' => password_hash($senha, PASSWORD_BCRYPT)
        ];

        $this->aluno->save($aluno);
    }

    public function removerAlunoById(int $id): void
    {
        $this->aluno->delete($id);
    }

    public function editarAluno(
        int $id,
        string $nome,
        string $dataNascimento,
        string $cpf,
        string $email,
        string $senha
    ): void {
        $aluno = $this->aluno->findOneById($id);

        if (!$aluno) {
            throw new \Exception("Usuário não encontrado");
        }

        $aluno = [
            'nome' => $nome,
            'data_nascimento' => $dataNascimento,
            'cpf' => $cpf,
            'email' => $email,
            'senha' => $senha
        ];

        $this->aluno->update($id, $aluno);
    }
}
