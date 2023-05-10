<?php
class Recipes_ingredion{
    private $quantity;
    private $unity;

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

    public function setQuantity(int $quantity){
        $this->quantity = $quantity;
    }
    public function setUnity(string $unity){
        $this->unity = $unity;
    }
    public function getQuantity(){
        return $this->quantity;
    }
    public function getUnity(){
        return $this->unity;
    }
}