<?php
declare(strict_types=1);

require_once "Database.php";

abstract class DAO
{
    protected Database $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    abstract function create (object $obj) : ?int;
    abstract function read(int $id) : ?object;
    abstract function update(object $obj) : bool;
    abstract function delete (object $obj) : bool;
}