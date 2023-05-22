<?php
class User{
    private $id_user;
    private $pseudo;
    private $mail;
    private $password;

    public function __construct(array $datas){
        $this->hydrate($datas);
    }

    private function hydrate(array $datas){
        foreach($datas as $key => $value){
            $method = 'set' .ucfirst($key);

            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function setId_user(int $id_user){
        $this->id_user = $id_user;
    }
    public function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
    }
    public function setMail(string $mail){
        $this->mail = $mail;
    }
    public function setPassword(string $password){
        $this->password = $password;
    }





    public function getId_user(){
        return $this->id_user;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function getMail(){
        return $this->mail;
    }
    public function getPassword(){
        return $this->password;
    }
}