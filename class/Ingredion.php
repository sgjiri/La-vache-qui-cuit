<?php
class Ingredion{
    private $id_ingredion;
    private $name;

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

    public function setIdIngredion(int $id_ingredion){
        $this->id_ingredion = $id_ingredion;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getIdIngredion(){
       return $this-> id_ingredion;
    }
    public function getName(){
        return $this->name;
    }
}