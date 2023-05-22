<?php

abstract class Controller{

    private static $loader;
    private static $twig;
    private static $render;

    private static function setLoader(){
        self::$loader = new \Twig\Loader\FilesystemLoader('./view');
    }

    private static function setTwig(){
        self::$twig = new \Twig\Environment(self::getLoader(),['cache' => false]);
    }

    private static function setRender (string $template, $datas){
        global $router;
        $link = $router->generate('detaileRecipe');
        $linkNewRecipe = $router->generate('addNewRecipe');
        $linkConnection = $router->generate('connection');
        $linkInscription = $router->generate('inscription');

        $new = [
            'link' => $link,
            'linkNewRecipe' => $linkNewRecipe,
            'linkConnection' => $linkConnection,
            'linkInscription' => $linkInscription
        ] + $datas;
        echo self::getTwig()->render($template, $new);     
    }

    protected static function getRender($template, $datas)
    {
        if (self::$render === null) {
            self::setRender($template, $datas);
        }
        return self::$render;
    }
    protected static function getLoader()
    {
        if (self::$loader === null){
            self::setLoader();
        }
        return self::$loader;
    }

    protected static function getTwig(){
        if(self::$twig === null){
            self::setTwig();
        }
        return self::$twig;
    }
    
    // protected static function getTwig()
    // {
    //     $loader = new \Twig\Loader\FilesystemLoader("./view");

    //     $twig = new \Twig\Environment($loader, [
    //         "cache" => false
    //     ]);

    //     return $twig;
    // } 
}