<?php declare(strict_types=1);

require_once("Post.php");

require_once("DAO.php");
require_once("Database.php");
class PostDAO extends DAO
{
    public function create($obj) : ?int
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "INSERT INTO `posts` (`title`, `text`,`date`) 
                VALUES ('{$obj->getTitle()}', '{$obj->getText()}','$date');";
        $this->database->getPDO()->prepare($sql)->execute();
        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;

    }
    public function read(int $id) : ?Post
    {
        $sql = "SELECT * FROM `posts` WHERE post_id = $id";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Post($data["post_id"],$data["title"],$data["text"],new DateTime($data["date"]));
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "UPDATE `posts` SET `title`='{$obj->getTitle()}', `text`='{$obj->getText()}',`date`='$date'
                WHERE `post_id` = '{$obj->getPostId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `posts` WHERE `post_id` = '{$obj->getPostId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }

    public function getComments($obj) : array
    {
       $sql = "SELECT *
                FROM `comments`
                INNER JOIN `posts` ON `posts`.`post_id` = `comments`.`post_id`
                WHERE `comments`.`post_id` = '{$obj->getPostId()}';";
        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        $comments = array();
        foreach($data as $comment)
        {
            $comments[] = new Comment($data["comment_id"],$obj,$data["text"],$data["author"],new DateTime($data["date"]));
        }

       return $comments;
    }
}