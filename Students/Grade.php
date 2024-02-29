<?php declare(strict_types=1);

class Grade
{
    private int $grade_id;
    private int $student_id;
    private int $subject_id;
    private int $grade;

    public function getGradeId(): int
    {
        return $this->grade_id;
    }

    public function getStudentId(): int
    {
        return $this->student_id;
    }

    public function getSubjectId(): int
    {
        return $this->subject_id;
    }

    public function getGrade(): int
    {
        return $this->grade;
    }

    public function setGrade(int $grade): void
    {
        $this->grade = $grade;
    }

    public function __construct(int $grade_id, int $student_id, int $subject_id, int $grade)
    {
        $this->grade_id = $grade_id;
        $this->student_id = $student_id;
        $this->subject_id = $subject_id;
        $this->grade = $grade;
    }
}