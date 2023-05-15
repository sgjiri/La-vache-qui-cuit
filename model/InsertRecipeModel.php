<?php

class InsertRecipeModel extends Model{

    public function InsertRecipe($title, $duration, $description, $photo, $difficulty){
        $req = $this->getDB()->prepare('INSERT INTO `recipes` (`title`,`duration`,`description`,`photo`, `difficulty`) VALUE (:title, :duration, :description, :photo, :difficulty)');

        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('duration', $duration, PDO::PARAM_INT);
        $req->bindParam('description', $description, PDO::PARAM_STR);
        $req->bindParam('photo', $photo, PDO::PARAM_STR);
        $req->bindParam('difficulty', $difficulty, PDO::PARAM_STR);
        $req->execute();
    }
}
