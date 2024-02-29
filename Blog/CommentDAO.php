<?php

require_once("Comment.php");
require_once("DAO.php");
require_once("Database.php");
class CommentDAO extends DAO
{
    public function create($obj) : ?int
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "INSERT INTO `comments` (`post_id`,`text`,`author`,`date`) 
                VALUES ('{$obj->getPost()->getPostId()}','{$obj->getText()}','{$obj->getAuthor()}','$date');";
        $this->database->getPDO()->prepare($sql)->execute();
        $id = $this->database->getPDO()->lastInsertId();
        if (gettype($id) == "string")
        {
            return intval($id);
        }
        return null;
    }
    public function read(int $id) : ?Comment
    {
        $sql = "SELECT `comments`.`comment_id`, `comments`.`text` as `c_text`,
                `comments`.`date` as `c_date`,`comments`.`author`, `posts`.`post_id`,
                `posts`.`text` as `p_text`,`posts`.`title`, `posts`.`date` as `p_date`
                FROM `comments`
                INNER JOIN `posts` ON `posts`.`post_id` = `comments`.`post_id`
                WHERE `comments`.`comment_id` = '$id';";

        $result= $this->database->getPDO()->prepare($sql);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        if ($data)
        {
            return new Comment($data["comment_id"], new Post($data["post_id"],$data["title"],$data["p_text"],new DateTime($data["p_date"])),
                               $data["c_text"], $data["author"],new DateTime($data["c_date"]));
        }
        return Null;
    }
    public function update($obj) : bool
    {
        $date = $obj->getDate()->format("Y-m-d H:i:s");
        $sql = "UPDATE `comments` SET `post_id`='{$obj->getPost()->getPostId()}',`text`='{$obj->getText()}',`author`='{$obj->getAuthor()}', `date`='{$date}'
                WHERE `comment_id` = '{$obj->getCommentId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
    public function delete($obj) : bool
    {
        $sql = "DELETE FROM `comments` WHERE `comment_id` = '{$obj->getCommentId()}'";
        return $this->database->getPDO()->prepare($sql)->execute();
    }
}