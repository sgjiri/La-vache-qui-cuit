<?php

class UserController extends Controller
{




    public function connection()
    {
        if (isset($_POST['connection'])) {
            session_start();

            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $model = new UserModel;
            $datas = $model->authentification($pseudo);

            if ($datas->rowCount() == 1) {
                $user = $datas->fetch(PDO::FETCH_ASSOC);
                
                    $_SESSION['id-user'] = $user['id_user'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['connect'] = true;
                    $passwordHash = $user['password'];                
                    if(password_verify($password, $passwordHash)){
                        var_dump($user['pseudo']);
                    }
                
            }
        } else {
            global $router;
            $link = $router->generate('connection');
            echo $this->getTwig()->render('connection.html.twig', ['link' => $link]);
        }
    }

    public function inscription()
    {
        session_start();
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
            var_dump($_SESSION['pseudo']);
            echo $this->getTwig()->render('inscription.html.twig');
        }
    }
}
