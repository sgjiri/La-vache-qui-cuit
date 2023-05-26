<?php

class InsertRecipeModel extends Model{

    public function InsertRecipe($title, $duration, $description, $photo, $difficulty, $id_user){

        //insert recette
        $req = $this->getDB()->prepare('INSERT INTO `recipes` (`title`,`duration`,`description`,`photo`, `difficulty`, `user_id`, `creation`) VALUE (:title, :duration, :description, :photo, :difficulty, :user_id, NOW() )');

        $req->bindParam('title', $title, PDO::PARAM_STR);
        $req->bindParam('duration', $duration, PDO::PARAM_INT);
        $req->bindParam('description', $description, PDO::PARAM_STR);
        $req->bindParam('photo', $photo, PDO::PARAM_STR);
        $req->bindParam('difficulty', $difficulty, PDO::PARAM_STR);
        $req->bindParam('user_id', $id_user, PDO::PARAM_STR);
        // $req->bindParam('quantity', $quantity, PDO::PARAM_STR);
        // $req->bindParam('unity', $unity, PDO::PARAM_STR);
        // $req->bindParam('$ingredient', $ingredient, PDO::PARAM_STR);
        $req->execute();


        //insert ingredien 
        //verifie si ingredien existe
        $reqIngredien = $this->getDB()->prepare("SELECT `id_ingredion` FROM `ingredion` WHERE `name` = :name");
        $reqIngredien->bindParam('name', $name, PDO::PARAM_STR);
        $reqIngredien-> execute();
        $ingredienExist = $reqIngredien->fetch(PDO::FETCH_ASSOC);

        if ($ingredienExist){
            $idIngerdien=$ingredienExist['id_ingredion '];
            $query = $this->getDB()->prepare("INSERT INTO `recipes_ingredion` (`recipe_id `,`ingredion_id`) VALUES(:recipe_id,:ingredion_id)");
            $query->bindParam('recipe_id', $, PDO::PARAM_INT);
            $query->bindParam('ingredion_id', $idIngerdien, PDO::PARAM_INT);
            $query->execute();
        }

    }
}
