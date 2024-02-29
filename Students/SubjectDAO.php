<?php declare(strict_types=1);
require_once("DAO.php");
require_once("Database.php");
require_once("Student.php");
class SubjectDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `subjects` (`teacher`, `name`) 
                VALUES ('{$obj->getTeacher()}', '{$obj->getName()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Subject
    {
        $sql = "SELECT * FROM `subjects` WHERE `subject_id` = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Subject($data["subject_id"],$data["teacher"],$data["name"]);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `subjects` SET `teacher`='{$obj->getTeacher()}', `name`='{$obj->getName()}'
                WHERE `subject_id` = '{$obj->getSubjectId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `subjects` WHERE `subject_id` = '{$obj->getSubjectId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}