<?php

namespace SecretariaFiap\Src\Entities;

use Exception;
use PDO;

class Entity
{
    public mixed $db;
    protected string $table;

    public function __construct()
    {
        $this->db = $this->getDb();
    }

    private function getDb(): mixed
    {

        $settings = require 'config/settings.php';
        $host = $settings['db.host'] . ':' . $settings['db.db_port']; 
        $dbname = $settings['db.db_name'];  
        $username =  $settings['db.db_user'];  
        $password = $settings['db.db_pass'];       
        
        return new PDO(
        "mysql:host=$host;dbname=$dbname",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
        );
    }

    public function delete(int $id): bool
    {
        $query = "DELETE FROM {$this->table} WHERE id = ?";

        $stmt = $this->query($query, [$id]);

        return $stmt->rowCount() > 0;
    }

    public function save(array $data): void
    {
        if (empty($data)) {
            throw new Exception('Dados não fornecidos.');
        }

        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $query = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";

        $this->query($query, array_values($data));
    }

    public function findOneById(int $id): array|bool
    {
        $stmt = $this->query(
            "SELECT
                *
            FROM
                {$this->table}
            WHERE id = ?",
            [$id]
        );

        if ($stmt) {
            return $stmt->fetch();
        } else {
            throw new Exception("erro");
        }
    }

    public function update(int $id, array $data): bool
    {
        if (empty($data)) {
            throw new Exception('Dados não fornecidos.');
        }

        $setClauses = [];
        foreach (array_keys($data) as $column) {
            $setClauses[] = "$column = ?";
        }

        $setQuery = implode(", ", $setClauses);

        $query = "UPDATE {$this->table} SET $setQuery WHERE id = ?";

        $params = array_values($data);
        $params[] = $id;
        $stmt = $this->query($query, $params);

        return $stmt->rowCount() > 0;
    }

    public function query(
        string $query,
        array  $params = []
    ): mixed
    {
        $stmt = $this->db->prepare("$query");

        for ($i = 1; $i <= count($params); $i++) {
            $stmt->bindValue($i, $params[$i - 1]);
        }

        $stmt->execute();

        return $stmt;
    }
}