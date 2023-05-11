<?php
class RecipeModel extends Model{
    public function getForSimpleRecipes(){
        $ramdomSimpleRecipes = [];
        $req = $this->getDB()->query('SELECT `id_recette`, `title`, `photo` FROM `recipes` WHERE `difficulty` = "easy" ORDER BY RAND() LIMIT 4');

        while($oneRamdomSimpleRecipe = $req->fetch(PDO::FETCH_ASSOC)){
            $ramdomSimpleRecipes[] = new Recipes($oneRamdomSimpleRecipe);
        }
        $req->closeCursor();
        return $ramdomSimpleRecipes;
  }

  public function getOneRecipe(int $id_recette){
    $req= $this->getDB()->prepare('SELECT `id_recette`, `title`, `duration`, `creation`, `user_id`, `description`, `difficulty` FROM `recipes` WHERE `id_recette` = :id_recette');

    $req->bindParam('id_recette', $id_recette, PDO::PARAM_INT);
    $req->execute();

    $recipte = $req->fetch(PDO::FETCH_ASSOC);
    $req->closeCursor();
    return $recipte;

  }
}