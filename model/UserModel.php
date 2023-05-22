<?php
class UserModel extends Model{
    public function authentification($pseudo){
        $req = $this->getDB()->prepare("SELECT `id_user`, `mail`, `pseudo`, `password` FROM `user` WHERE `pseudo` = :pseudo");
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        return $req->rowCount() == 1 ? new User($req->fetch(PDO::FETCH_ASSOC)) : false;

    }

    public function inscription($pseudo, $mail, $passwordHashed){
        $req = $this->getDB()->prepare("INSERT INTO `user` (`pseudo`, `mail`,`password`) VALUE (:pseudo, :mail, :password)");
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->bindParam('mail', $mail, PDO::PARAM_STR);
        $req->bindParam('password', $passwordHashed, PDO::PARAM_STR);
        $req->execute();

    }
}