<?php declare(strict_types=1);
require_once("DAO.php");
require_once("Database.php");
require_once("Book.php");
class BookDAO extends DAO
{
    public function create($obj) : ?int
    {
        $date = $obj->getPublicationYear()->format("Y-m-d H:i:s");
        $sql = "INSERT INTO `books` (`title`, `publication_year`, `isbn`) 
                VALUES ('{$obj->getTitle()}', '$date', '{$obj->getIsbn()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Book
    {
        $sql = "SELECT * FROM `books` WHERE book_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            $authors = $this->getAuthors($id);
            return new Book($data["book_id"],$data["title"],new DateTime($data["publication_year"]),$data["isbn"],$authors);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $date = $obj->getPublicationYear()->format("Y-m-d H:i:s");
        $sql = "UPDATE `books` SET `title`='{$obj->getTitle()}', `publication_year`='$date', 
                                    `isbn`='{$obj->getIsbn()}'
                WHERE `book_id` = '{$obj->getBookId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `books` WHERE `book_id` = '{$obj->getBookId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function linkBookToAuthor(Author $author, Book $book) : bool
    {
        $sql = "INSERT IGNORE INTO `authorbooks` (`author_id`,`book_id`) VALUES ('{$author->getAuthorId()}','{$book->getBookId()}');";
        $result = $this->database->getPDO()->prepare($sql)->execute();
        return $result;
    }
    public function  unlinkBookToAuthor(Author $author, Book $book) : bool
    {
        $sql = "DELETE FROM `authorbooks` WHERE `author_id` = '{$author->getAuthorId()}' 
                        AND `book_id` = '{$book->getBookId()}';";
        $result = $this->database->getPDO()->prepare($sql)->execute();
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function getAuthors(int $book_id) : array
    {
        $sql = "SELECT `authors`.*
               FROM `authors` 
               INNER JOIN `authorbooks` ON `authorbooks`.`author_id`  =`authors`.`author_id` 
               WHERE `authorbooks`.`book_id` = '{$book_id}';";
        $query = $this->database->getPDO()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        $authors = array();
        foreach ($result as $author)
        {
            $authors[] = new Author($author["author_id"],$author["firstname"],$author["lastname"],$author["book"]);
        }
        return $authors;
    }
}