<?php

use Phinx\Seed\AbstractSeed;

class CriaMatriculaTeste extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run()
    {
        $data = [];

        $turmas = $this->fetchAll('SELECT id FROM turma');
        $alunos = $this->fetchAll('SELECT id FROM aluno');

        for ($i = 1; $i <= 50; $i++) {
            do {
                $turma_id = $turmas[array_rand($turmas)]['id'];
                $aluno_id = $alunos[array_rand($alunos)]['id'];
            } while (isset($matriculasExistentes[$aluno_id][$turma_id]));

            $matriculasExistentes[$aluno_id][$turma_id] = true;

            $data[] = [
                'turma_id' => $turma_id,
                'aluno_id' => $aluno_id,
            ];
        }

        $this->table('matricula')
            ->insert($data)
            ->saveData();
    }
}
