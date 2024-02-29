<?php declare(strict_types=1);
class Student
{
    private int $student_id;
    private string $firstname;
    private string $lastname;
    private string $student_group;
    private ?array $grades;
    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    public function getStudentGroup(): string
    {
        return $this->student_group;
    }

    public function setStudentGroup(string $student_group): void
    {
        $this->student_group = $student_group;
    }
    public function getGrades(): ?array
    {
        return $this->grades;
    }
    public function __construct(int $student_id, string $firstname, string $lastname, string $student_group,array $grades=null)
    {
        $this->student_id = $student_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->student_group = $student_group;
        $this->grades = $grades;
    }
}