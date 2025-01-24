<?php

namespace Core;
use PDO;
// connet to the database, and execute a query
class Database
{

    public $connection;
    public $statement;

    function __construct($config, $username = 'root', $password = '')
    {

        $dsn = 'mysql:' . http_build_query($config, '', ';');

        $this->connection = new PDO($dsn, $username, $password, [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    
    public function query($query, $params = [])
    {

        $this->statement = $this->connection->prepare($query);
        $this->statement->execute($params);

        return $this;
        // return $statement->fetchAll(PDO::FETCH_ASSOC);
        //  :: is call the scope resolution operator to access const value
    }

    function fetchAll()
    {
        return $this->statement->fetchAll();
    
    }

    function fetch()
    {
        return $this->statement->fetch();
    }

    function findOrFial(){

        $results = $this->statement->fetch();
            if (!$results) {
            abort();
        }
        return $results;
    }
}
