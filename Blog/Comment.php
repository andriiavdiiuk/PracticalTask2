<?php declare(strict_types=1);

require_once("Post.php");
class Comment
{
    private int $comment_id;
    private Post $post;
    private string $text;
    private string $author;
    private DateTime $date;

    public function getCommentId(): int
    {
        return $this->comment_id;
    }

    public function getPost(): Post
    {
        return $this->post;
    }

    public function setPost(Post $post): void
    {
        $this->post = $post;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }

    public function getDate(): DateTime
    {
        return $this->date;
    }

    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }
    public function __construct(int $comment_id, Post $post, string $text, string $author, DateTime $date)
    {
        $this->comment_id = $comment_id;
        $this->post = $post;
        $this->text = $text;
        $this->author = $author;
        $this->date = $date;
    }
}