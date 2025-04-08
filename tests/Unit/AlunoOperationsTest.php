<?php

use PHPUnit\Framework\TestCase;
use SecretariaFiap\Src\Model\AlunoOperations;
use SecretariaFiap\Src\Entities\Aluno;
use Exception;

class AlunoOperationsTest extends TestCase
{
    private $alunoOperations;
    private $alunoMock;

    protected function setUp(): void
    {
        $this->alunoMock = $this->createMock(Aluno::class);
        $this->alunoOperations = new AlunoOperations($this->alunoMock);
    }

    public function testCadastrarAlunoThrowsExceptionCasoALunoJaCadastrado()
    {
        $this->alunoMock
            ->method('findOneByCpfOrEmail')
            ->with(
                '12345678900',
                'john.doe@example.com'
            )
            ->willReturn(true);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Aluno já cadastrado");

        $this->alunoOperations->cadastrarAluno('John Doe', '1990-01-01', '12345678900', 'john.doe@example.com', 'password123');
    }

    public function testCadastrarAlunoSuccess()
    {
        $this->alunoMock
            ->method('findOneByCpfOrEmail')
            ->willReturn(false);
        $this->alunoMock
            ->expects($this->once())
            ->method('save');

        $this->alunoOperations->cadastrarAluno('John Doe', '1990-01-01', '12345678920', 'john.doe@example.com', 'password123');
    }

    public function testEditarAlunoThrowsExceptioCasoNaoExiste()
    {
        $this->alunoMock
        ->method('findOneById')
        ->willReturn(false);

        $this->expectException(Exception::class);
        $this->expectExceptionMessage("Usuário não encontrado");

        $this->alunoOperations->editarAluno(1, 'John Doe', '1990-01-01', '12345678900', 'john.doe@example.com', 'newpassword123');
    }

    public function testEditarAlunoSuccess()
    {
        $this->alunoMock
            ->method('findOneById')
            ->willReturn(['id' => 1]);
        $this->alunoMock
            ->expects($this->once())
            ->method('update');

        $this->alunoOperations->editarAluno(1, 'John Doe', '1990-01-01', '12345678900', 'john.doe@example.com', 'newpassword123');
    }
}
