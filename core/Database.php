<?php

class Database
{
    public $pdo;
    public $stmt;
    public function __construct(array $config, string $user = 'root', string $pw = '')
    {
        $dsn = 'mysql:' . http_build_query($config, '', ';');
        $this->pdo = new PDO(
            $dsn,
            $user,
            $pw,
            [
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]
        );
    }
    public function query(string $sql, $params = [])
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute($params);
        return $this;
    }

    public function exists($record)
    {
        if (!$record) {
            abort(Response::NOT_FOUND);
        }
    }
    public function authorize($condition)
    {
        if ($condition) {
            abort(Response::FORBIDDEN);
        }
    }
    public function findAll()
    {
        return $this->stmt->fetchAll();
    }

    public function fetchAllOrAbort()
    {
        $rows = $this->findAll();
        $this->exists($rows);
        return $rows;
    }

    public function find()
    {
        return $this->stmt->fetch();
    }

    public function fetchOrAbort()
    {
        $row = $this->find();
        $this->exists($row);
        $this->authorize($row['user_id'] != 1);
        return $row;
    }

    public function findCol()
    {
        return $this->stmt->fetchColumn();
    }
    public function successPost()
    {
        // redirect_to(pathinfo($_SERVER['REQUEST_URI'], PATHINFO_BASENAME));
        echo "SUCESSFULLY POSTED CHECK DB";
        return true;
    }
}