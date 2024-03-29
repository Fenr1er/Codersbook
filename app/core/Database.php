<?php

namespace App\Core;

use PDO;
use PDOStatement;

class Database
{
    private PDO|null $pdo = null;
    private PDOStatement $statement;

    public function __construct()
    {
        $config = config("database");
        $dsn = $config['db'] . ":" . http_build_query($config, '', ';');

        try {
            $this->pdo = new PDO($dsn, options: [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
        } catch (\PDOException $e) {
            dd($e->getMessage());
        }
    }

    public function query(string $query, $params = [])
    {
        if ($this->pdo != null) {
            $this->statement = $this->pdo->prepare($query);
            $this->statement->execute($params);
            return $this;
        }
    }

    public function find()
    {
        $data = $this->statement->fetch();
        $this->close();
        return $data;
    }

    public function all()
    {
        $data = $this->statement->fetchAll();
        $this->close();
        return $data;
    }

    public function lastInsertId()
    {
        $data = $this->pdo->lastInsertId();
        $this->close();
        return $data;
    }

    public function close(){
        if( $this->pdo != null ) {
            $this->pdo = null;
        }
    }
}
