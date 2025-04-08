<?php


use Phinx\Seed\AbstractSeed;

class CriaAdministradorSecretariaFiap extends AbstractSeed
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
        $data = [
            [
                'email'    => 'testebreno@email.com',
                'senha' => 'teste',
            ]
        ];

        $this->table('admin')
            ->insert($data)
            ->saveData();
    }
}
