<?php declare(strict_types=1);

class Subject
{
    private int $subject_id;
    private string $teacher;
    private string $name;

    public function getSubjectId(): int
    {
        return $this->subject_id;
    }

    public function getTeacher(): string
    {
        return $this->teacher;
    }

    public function setTeacher(string $teacher): void
    {
        $this->teacher = $teacher;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function __construct(int $subject_id, string $teacher, string $name)
    {
        $this->subject_id = $subject_id;
        $this->teacher = $teacher;
        $this->name = $name;
    }
}