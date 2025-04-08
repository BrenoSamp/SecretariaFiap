<?php


use Phinx\Seed\AbstractSeed;

class CriaAlunoTeste extends AbstractSeed
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
            $nome = "Nome do Usuário $i";
            $data_nascimento = date('Y-m-d', strtotime('-' . rand(18, 50) . ' years')); // Idade entre 18 e 50 anos
            $email = "usuario$i@email.com"; // Email único para cada usuário
            $cpf = str_pad(rand(100000000, 999999999), 11, '0', STR_PAD_LEFT); // Gera um CPF fictício
            $senha = $this->gerarSenhaSegura(); // Função que gera a senha segura

            $data[] = [
                'nome' => $nome,
                'data_nascimento' => $data_nascimento,
                'email' => $email,
                'cpf' => $cpf,
                'senha' => $senha,
            ];
        }

        $this->table('aluno')
            ->insert($data)
            ->saveData();
    }

    private function gerarSenhaSegura(): string
    {
        $comprimento = 8;
        $letras_maiusculas = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $letras_minusculas = 'abcdefghijklmnopqrstuvwxyz';
        $numeros = '0123456789';
        $simbolos = '!@#$%^&*()_+{}[]:;<>,.?/';
        
        $todos_caracteres = $letras_maiusculas . $letras_minusculas . $numeros . $simbolos;
        $senha = '';
        
        $senha .= $letras_maiusculas[rand(0, strlen($letras_maiusculas) - 1)]; // Pelo menos uma letra maiúscula
        $senha .= $letras_minusculas[rand(0, strlen($letras_minusculas) - 1)]; // Pelo menos uma letra minúscula
        $senha .= $simbolos[rand(0, strlen($simbolos) - 1)]; // Pelo menos um símbolo
        
        // Preenche o restante da senha com caracteres aleatórios
        for ($i = strlen($senha); $i < $comprimento; $i++) {
            $senha .= $todos_caracteres[rand(0, strlen($todos_caracteres) - 1)];
        }
        
        // Embaralha a senha para garantir que os caracteres não fiquem fixos nas primeiras posições
        return str_shuffle($senha);
    }
}
