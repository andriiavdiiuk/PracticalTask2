<?php declare(strict_types=1);
class Author
{
    private int $author_id;
    private string $firstname;
    private string $lastname;

    private ?array $books;

    public function getAuthorId(): int
    {
        return $this->author_id;
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
    public function getBooks(): array
    {
        return $this->books;
    }
    public function __construct(int $author_id, string $firstname, string $lastname, array $books=null)
    {
        $this->author_id = $author_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->books= $books;
    }

}