<?php
class UserModel extends Model{
    public function authentification($pseudo){
        $req = $this->getDB()->prepare("SELECT `id_user`, `mail`, `pseudo`, `password` FROM `user` WHERE `pseudo` = :pseudo");
        $req->bindParam('pseudo', $pseudo, PDO::PARAM_STR);
        $req->execute();

        return $req;

    }
}