<?php

namespace Models;

class DB
{
    private $pdo;

    // Pass database credentials as parameters to the constructor
    public function __construct($dsn, $user, $password)
    {
        $this->pdo = new \PDO($dsn, $user, $password);
    }

    public function select($sql, $params = [])
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll();
    }

   /**
     * Execute a SQL statement with parameters
     *
     * @param string $sql
     * @param array $params
     * @return int The number of affected rows
     */
    public function executeStatement(string $sql, array $params = []): int
    {
        $sth = $this->pdo->prepare($sql);
        $sth->execute($params);

        return $sth->rowCount();
    }
}

