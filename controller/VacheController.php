<?php
class VacheController
{

    private static function getTwig()
    {
        $loader = new \Twig\Loader\FilesystemLoader("./view");

        $twigNoRepeat = new \Twig\Environment($loader, [
            "cache" => false
        ]);

        return $twigNoRepeat;
    }


    public function homePage()
    {
    }
}
