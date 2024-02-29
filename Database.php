<?php
declare(strict_types=1);

class Database
{

    private PDO $PDO;

    function getPDO() : PDO
    {
        return $this->PDO;
    }
    function __construct()
    {
        $this->connect();
    }
    private static function getCredentials() : array
    {
        return parse_ini_file('db_params.ini');
    }
    private function connect() : void
    {
        try
        {
            $db_params = self::getCredentials();
            $this->PDO = new PDO("mysql:host={$db_params['host']};dbname={$db_params['dbname']}", $db_params['user'], $db_params['password']);
        }
        catch (PDOException $e)
        {
            die("Connection failed: " . $e);
        }

    }
}