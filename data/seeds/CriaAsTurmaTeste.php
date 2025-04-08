<?php


use Phinx\Seed\AbstractSeed;

class CriaAsTurmaTeste extends AbstractSeed
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

        for ($i = 1; $i <= 50; $i++) {
            $nome = "Turma $i"; 
            $descricao = "Descrição da Turma $i - Detalhes importantes sobre a turma $i. Algumas informações sobre o curso, objetivos e conteúdo programático."; 
        
            $data[] = [
                'nome' => $nome,
                'descricao' => $descricao,
            ];
        }

        $this->table('turma')
            ->insert($data)
            ->saveData();
    }
}
