<?php
$config = require_once('config/config.php');
class Database
{
    public $pdo;
    public function __construct(array $config, string $user, string $pw)
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
    function query(string $sql)
    {

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt;
    }
}