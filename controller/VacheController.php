<?php
class VacheController extends Controller
{
    public function homePage()
    {
        session_start();
        global $router;
        $model = new RecipeModel();
        $datas = $model->getForSimpleRecipes();
        $twig = $this->getTwig();
        $link = $router->generate('detaileRecipe');
        $linkNewRecipe = $router->generate('addNewRecipe');
        $linkConnection = $router->generate('connection');
        $linkInscription = $router->generate('inscription');
        echo $twig->render('homePage.html.twig', ['ramdomSimpleRecipes' => $datas, 'link' => $link, 'linkNewRecipe' => $linkNewRecipe, 'linkConnection' => $linkConnection, 'linkInscription' => $linkInscription]);
    }

    public function getOne($id_recette)
    {
        $model = new RecipeModel();
        $recipe = $model->getOneRecipe($id_recette);
        $twig = $this->getTwig();

        echo $twig->render('OneRecipe.html.twig', ['recipe' => $recipe]);
    }

    public function addRecipe()
    {
        session_start();
        global $router;
        $link = $router->generate('addMyRecipe');
        var_dump($link);
        echo $this->getTwig()->render('newrecipe.html.twig', ['link' => $link]);
        
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
            $model = new InsertRecipeModel;
            $model->InsertRecipe($title, $duration, $description, $photo, $difficulty);
        }
    }

    // public function homePage(){
    //     $model = new RecipeModel();
    //     $datas = $model->getForSimpleRecipes();
    //     echo self::getTwig()->render('homePage.html.twig',['ramdomSimpleRecipes' => $datas]);
    // }

}
