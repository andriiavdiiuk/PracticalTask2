<?php declare(strict_types=1);
class Post
{
    private int $post_id;
    private string $title;
    private string $text;
    private DateTime $date;

    public function getPostId(): int
    {
        return $this->post_id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    public function __construct(int $post_id, string $title, string $text, DateTime $date)
    {
        $this->post_id = $post_id;
        $this->title = $title;
        $this->text = $text;
        $this->date = $date;
    }

}