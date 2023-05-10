<?php
class User{
    private $id_user;
    private $pseudo;
    private $mail;

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

    public function setIdUser(int $id_user){
        $this->id_user = $id_user;
    }
    public function setPseudo(string $pseudo){
        $this->pseudo = $pseudo;
    }
    public function setMail(string $mail){
        $this->mail = $mail;
    }

    public function getIdUser(){
        return $this->id_user;
    }
    public function getPseudo(){
        return $this->pseudo;
    }
    public function getMail(){
        return $this->mail;
    }
}