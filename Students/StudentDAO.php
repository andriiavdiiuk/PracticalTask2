<?php declare(strict_types=1);
require_once("DAO.php");
require_once("Database.php");
require_once("Student.php");
class StudentDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `students` (`firstname`, `lastname`, `student_group`) 
                VALUES ('{$obj->getFirstname()}', '{$obj->getLastname()}', '{$obj->getStudentGroup()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Student
    {
        $sql = "SELECT * FROM `students` WHERE student_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            $grades = $this->getGrades($id);
            return new Student($data["student_id"],$data["firstname"],$data["lastname"],$data["student_group"],$grades);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `students` SET `firstname`='{$obj->getFirstname()}', `lastname`='{$obj->getLastname()}', 
                                      `student_group`='{$obj->getStudentGroup()}'
                WHERE `student_id` = '{$obj->getStudentId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `students` WHERE `student_id` = '{$obj->getStudentId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public  function getGrades(int $id) : array
    {
        $sql = "SELECT `grades`.*
                FROM `grades` 
                INNER JOIN `students` ON `students`.`student_id` = `grades`.`student_id` 
                WHERE `grades`.`student_id` = '{$id}';";
        $result = $this->database->getPDO()->prepare($sql);
        $result->execute();
        $result = $result->fetchAll();
        $grades = array();
        foreach ($result as $grade)
        {
            $grades[] = new Grade($grade["grade_id"],$grade["student_id"],$grade["subject_id"],$grade["grade"]);
        }
        return $grades;
    }
}