<?php

class UserController extends Controller
{
    public function connectionPage()
    {
        global $router;
        $link = $router->generate('connection');
        echo $this->getTwig()->render('connection.html.twig', ['link' => $link]);
    }

    public function connection()
    {
        session_start();
        if (isset($_POST['connection'])) {
            $pseudo = $_POST['pseudo'];
            $password = $_POST['password'];

            $model = new UserModel;
            $datas = $model->authentification($pseudo);
            
            if($datas->rowCount()==1){
                $user = $datas->fetch(PDO::FETCH_ASSOC);
                

                if($user['pseudo'] === $pseudo && $user['password']=== $password){
                    $_SESSION['id-user'] = $user['id_user'];
                    $_SESSION['pseudo'] = $user['pseudo'];
                    $_SESSION['mail'] = $user['mail'];
                    $_SESSION['connect'] = true;
                    // $passwordHash = $user['password'];
                    var_dump($user['pseudo']);
                    // if(password_verify($password, $passwordHash)){
                        
                    // }
                }
                
            }
        }
    }
}
