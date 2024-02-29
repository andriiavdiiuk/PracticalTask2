<?php declare(strict_types=1);
require_once("Item.php");
require_once("DAO.php");
require_once("Database.php");

class ItemDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `items` (`name`, `price`) 
                VALUES ('{$obj->getName()}', '{$obj->getPrice()}');";
        $this->database->getPDO()->prepare($sql)->execute();
        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Item
    {
        $sql = "SELECT * FROM `items` WHERE item_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Item($data["item_id"],$data["name"],$data["price"]);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `items` SET `name`='{$obj->getName()}', `price`='{$obj->getPrice()}'
                WHERE `item_id` = '{$obj->getItemId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `items` WHERE `item_id` = '{$obj->getItemId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}