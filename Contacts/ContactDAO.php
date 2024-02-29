<?php
declare(strict_types=1);


require_once("DAO.php");
require_once("Database.php");
require_once("Contact.php");
class ContactDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `contacts` (`firstname`, `lastname`, `email`, `phone_number`) 
                VALUES ('{$obj->getFirstname()}', '{$obj->getLastname()}', '{$obj->getEmail()}', '{$obj->getPhoneNumber()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Contact
    {
        $sql = "SELECT * FROM `contacts` WHERE contact_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Contact($data["contact_id"],$data["firstname"],$data["lastname"],$data["email"], $data["phone_number"]);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `contacts` SET `firstname`='{$obj->getFirstname()}', `lastname`='{$obj->getLastname()}', 
                                      `email`='{$obj->getEmail()}', `phone_number`='{$obj->getPhoneNumber()}'
                WHERE `contact_id` = '{$obj->getContactId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `contacts` WHERE `contact_id` = '{$obj->getContactId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}