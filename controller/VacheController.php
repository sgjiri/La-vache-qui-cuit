<?php
class VacheController extends Controller
{
    public function homePage()
    {
        session_start();
        global $router;
        $model = new RecipeModel();
        $datas = $model->getForSimpleRecipes();
       
        echo self::getRender('homePage.html.twig', ['ramdomSimpleRecipes' => $datas]);
    }

    public function getOne($id_recette)
    {
        $model = new RecipeModel();
        $recipe = $model->getOneRecipe($id_recette);

        echo self::getRender('OneRecipe.html.twig', ['recipe' => $recipe]);
    }

    public function addRecipe()
    {
        session_start();
        global $router;
        echo self::getRender('newrecipe.html.twig', []);
        
    }

    public function addMyRecipe()
    {
        session_start();
        if (isset($_POST['submit'])) {
            $title = addslashes($_POST['title']);
            $duration = addslashes($_POST['duration']);
            $description = addslashes($_POST['description']);
            $photo = addslashes($_POST['photo']);
            $difficulty = addslashes($_POST['difficulty']);
            $id_user = $_SESSION['id-user'];
            var_dump($id_user);
            $model = new InsertRecipeModel;
            $model->InsertRecipe($title, $duration, $description, $photo, $difficulty, $id_user);//$name
        }
    }

    // public function homePage(){
    //     $model = new RecipeModel();
    //     $datas = $model->getForSimpleRecipes();
    //     echo self::getTwig()->render('homePage.html.twig',['ramdomSimpleRecipes' => $datas]);
    // }

}
