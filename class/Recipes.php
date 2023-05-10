<?php
class Recipes{
    private $id_recette;
    private $title;
    private $duration;
    private $creation;
    private $user_id;
    private $description;
    private $photo;

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

    public function setIdRecette(int $id_recette){
        $this->id_recette = $id_recette;
    }
    public function setTitle (string $title){
        $this->title = $title;
    }
    public function setDuration (int $duration){
        $this->duration = $duration;
    }
    public function setCreation (string $creation){
        $this->creation = $creation;
    }
    public function setUserId (int $user_id){
        $this->user_id = $user_id;
    }
    public function description (string $description){
        $this->description = $description;
    }
    public function photo (string $photo){
        $this->photo = $photo;
    }





    public function getIdRecette(){
        return $this->id_recette;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getDuration(){
        return $this->duration;
    }
    public function getCreation(){
        return $this->creation;
    }
    public function getUserId(){
        return $this->user_id;
    }
    public function getDescription(){
        return $this->description;
    }
    public function getPhoto(){
        return $this->photo;
    }
}