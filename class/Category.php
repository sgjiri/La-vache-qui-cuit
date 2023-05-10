<?php
class Category{
    private $id_category;
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

    public function setIdCategory(int $id_category){
        $this->id_category = $id_category;
    }
    public function setName(string $name){
        $this->name = $name;
    }
    public function getIdCategory(){
        return $this->id_category;
    }
    public function getName(){
        return $this->name;
}}