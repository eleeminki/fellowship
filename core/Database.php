<?php

class Database
{
    public $pdo;
   private $stmt;
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
        $this->stmt = $this->stmt->execute($params);

        return $this;
    }

    public function fetch()
    {
        $this->stmt->fetch();
        if (!$this->stmt) {
            abort(Response::NOT_FOUND);
        } elseif ($this->stmt['user_id'] !== $_GET['user']) {
            abort(Response::FORBIDDEN);
        }
    }
}