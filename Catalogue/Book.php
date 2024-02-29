<?php declare(strict_types=1);
require_once "Author.php";
class Book
{
    private int $book_id;
    private string $title;
    private DateTime $publication_year;
    private string $isbn;

    private ?array $authors;

    public function getBookId(): int
    {
        return $this->book_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPublicationYear(): DateTime
    {
        return $this->publication_year;
    }

    public function setPublicationYear(DateTime $publication_year): void
    {
        $this->publication_year = $publication_year;
    }

    public function getIsbn(): string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): void
    {
        $this->isbn = $isbn;
    }
    public function getAuthors(): array
    {
        return $this->authors;
    }
    public function __construct(int $book_id, string $title, DateTime $publication_year, string $isbn, array $authors=null)
    {
        $this->book_id = $book_id;
        $this->title = $title;
        $this->publication_year = $publication_year;
        $this->isbn = $isbn;
        $this->authors = $authors;
    }

}