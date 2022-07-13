<?php
require_once "DBModel.php";
require_once "Model.php";




class commentsModel extends Model
{


    function InsertComentario($comments, $tier, $id_player)
    {

        $query=$this->getDb()->prepare("INSERT INTO comments (comments, tier, id_player) VALUES (?,?,?)");
        $query->execute(array($comments, $tier, $id_player));
        return $this->getDb()->lastInsertId();
    }

    function GetComentarioforPlayer($id)
    {
        $query = $this->getDb()->prepare('SELECT comments,tier,id from comments WHERE id_player=?');
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
    public function GetComentarios($id)
    {
        $query = $this->getDb()->prepare("SELECT * FROM comments WHERE id=?");
        $query->execute(array($id));
        return $query->fetch(PDO::FETCH_OBJ);
    }

    function DeleteComentario($id)
    {
        $query = $this->getDb()->prepare("DELETE FROM comments WHERE id=?");
        $query->execute([$id]);
        return $query;
    }
}
