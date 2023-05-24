<?php

class UserController extends Controller
{




    public function connection()
    {
        if (isset($_POST['connection'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $model = new UserModel;
            $datas = $model->authentification($pseudo);

            if ($datas) {

                $passwordHash = $datas->getPassword();
                if (password_verify($password, $passwordHash)) {
                    var_dump($datas);
                    $_SESSION['id-user'] = $datas->getId_user();
                    $_SESSION['pseudo'] = $datas->getPseudo();
                    $_SESSION['mail'] = $datas->getMail();
                    $_SESSION['connect'] = true;
                }
            }
        } else {
            echo self::getRender('connection.html.twig', []);
        }
    }

    public function inscription()
    {
        if (isset($_POST['inscription'])) {
            $pseudo = $_POST['pseudo'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];
            $password2 = $_POST['password2'];
            $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
            if ($password === $password2) {
                $model = new UserModel;
                $datas = $model->inscription($pseudo, $mail, $passwordHashed);
                echo 'Inscription reusit';
            } else {
                echo 'Les mots de passes ne sont pas identique';
            }
        } else {
            echo self::getRender('inscription.html.twig', []);
        }
    }

    public function deconnection()
    {
        $_SESSION['connect'] = false;
        session_destroy();
    }
}
