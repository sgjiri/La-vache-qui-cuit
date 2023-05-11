<?php
class VacheController extends Controller
{
    public function homePage()
    {
        global $router;
        $model = new RecipeModel();
        $datas = $model->getForSimpleRecipes();
        $twig = $this->getTwig();
        $link = $router->generate('detaileRecipe');
        echo $twig->render('homePage.html.twig', ['ramdomSimpleRecipes' => $datas, 'link' => $link]);
    }

    public function getOne($id_recette){
        $model = new RecipeModel();
        $recipe = $model->getOneRecipe($id_recette);
        $twig = $this->getTwig();

        echo $twig->render('OneRecipe.html.twig', ['recipe' => $recipe]);
    }

    // public function homePage(){
    //     $model = new RecipeModel();
    //     $datas = $model->getForSimpleRecipes();
    //     echo self::getTwig()->render('homePage.html.twig',['ramdomSimpleRecipes' => $datas]);
    // }
    
}
