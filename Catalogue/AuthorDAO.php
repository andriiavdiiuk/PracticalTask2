<?php declare(strict_types=1);
require_once("DAO.php");
require_once("Database.php");
require_once("Author.php");
require_once("Book.php");
class AuthorDAO extends DAO
{
    public function create($obj) : ?int
    {
        $sql = "INSERT INTO `authors` (`firstname`, `lastname`) 
                VALUES ('{$obj->getFirstname()}', '{$obj->getLastname()}');";
        $this->database->getPDO()->prepare($sql)->execute();

        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Author
    {
        $sql = "SELECT * FROM `authors` WHERE author_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            $books = $this->getBooks($id);
            return new Author($data["author_id"],$data["firstname"],$data["lastname"],$books);
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $sql = "UPDATE `authors` SET `firstname`='{$obj->getFirstname()}', `lastname`='{$obj->getLastname()}'                              
                WHERE `author_id` = '{$obj->getAuthorId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `authors` WHERE `author_id` = '{$obj->getAuthorId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function linkAuthorToBook(Author $author, Book $book) : bool
    {
        $sql = "INSERT IGNORE INTO `authorbooks` (`author_id`,`book_id`) VALUES ('{$author->getAuthorId()}','{$book->getBookId()}');";
        $result = $this->database->getPDO()->prepare($sql)->execute();
        return $result;
    }
    public function unlinkAuthorToBook(Author $author, Book $book) : bool
    {
        $sql = "DELETE FROM `authorbooks` WHERE `author_id` = '{$author->getAuthorId()}' 
                        AND `book_id` = '{$book->getBookId()}';";
        $result = $this->database->getPDO()->prepare($sql)->execute();
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function getBooks(int $author_id) : array
    {
        $sql = "SELECT `books`.*
               FROM `books`
               INNER JOIN `authorbooks` ON `authorbooks`.`book_id` = `books`.`book_id` 
               WHERE `authorbooks`.`author_id` = '{$author_id}';";
        $query = $this->database->getPDO()->prepare($sql);
        $query->execute();
        $result = $query->fetchAll();
        $books = array();
        foreach ($result as $book)
        {
            $books[] = new Book($book["book_id"],$book["title"],new DateTime($book["publication_year"]),$book["isbn"]);
        }
        return $books;
    }
}