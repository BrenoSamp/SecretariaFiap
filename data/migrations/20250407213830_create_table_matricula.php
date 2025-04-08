<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTableMatricula extends AbstractMigration
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
        $this->table('matricula')
            ->addColumn('aluno_id', 'integer')
            ->addColumn('turma_id', 'integer')
            ->addColumn('data_matricula', 'timestamp', ['default' => 'CURRENT_TIMESTAMP', 'null' => true])
            ->addIndex(['aluno_id', 'turma_id'], ['unique' => true, 'name' => 'unique_matricula'])
            ->addIndex('turma_id', ['name' => 'fk_turma']) 
            ->addForeignKey('aluno_id', 'aluno', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addForeignKey('turma_id', 'turma', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE']) 
            ->create();
    }
}
