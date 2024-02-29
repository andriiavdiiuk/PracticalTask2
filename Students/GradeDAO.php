<?php declare(strict_types=1);
require_once("DAO.php");
require_once("Database.php");
require_once("Grade.php");
class GradeDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `grades` (`student_id`,`subject_id`,`grade`) 
                VALUES ('{$obj->getStudentId()}', '{$obj->getSubjectId()}', '{$obj->getGrade()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Grade
    {
        $sql = "SELECT * FROM `grades` WHERE `grade_id`='{$id}';";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Grade($data["grade_id"],$data["student_id"],$data["subject_id"],$data["grade"]);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `grades` SET `grade`='{$obj->getGrade()}'
                WHERE `grade_id` = '{$obj->getGradeId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `grades` WHERE `grade_id` = '{$obj->getGradeId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}