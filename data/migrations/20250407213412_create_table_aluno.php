<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableAluno extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('aluno')
        ->addColumn('nome', 'string', ['limit' => 255])
        ->addColumn('data_nascimento', 'date')
        ->addColumn('cpf', 'char', ['limit' => 11])
        ->addColumn('email', 'string', ['limit' => 255])
        ->addColumn('senha', 'string', ['limit' => 255])
        ->addIndex('cpf', ['unique' => true])
        ->addIndex('email', ['unique' => true])
        ->create();
    }
}
