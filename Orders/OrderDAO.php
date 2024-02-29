<?php
require_once("Order.php");
require_once("DAO.php");
require_once("Database.php");
class OrderDAO extends DAO
{
    public function create($obj) : ?int
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "INSERT INTO `orders` (`date`,`item_id`) 
                VALUES ('$date','{$obj->getItem()->getItemId()}');";
        $this->database->getPDO()->prepare($sql)->execute();
        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Order
    {
        $sql = "SELECT * FROM `orders`
                INNER JOIN `items` ON `orders`.`item_id` = `items`.`item_id` 
                WHERE `orders`.`order_id` = '$id';";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Order($data["order_id"] , new Item($data["item_id"],$data["name"],$data["price"]),new DateTime($data["date"]));
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "UPDATE `orders` SET `item_id`='{$obj->getItem()->getItemId()}', `date`='{$date}'
                WHERE `order_id` = '{$obj->getOrderId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `orders` WHERE `order_id` = '{$obj->getOrderId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}