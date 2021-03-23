<?php


class pokemon
{
    private $id;
    private $name;
    private $sprite;



    public function __construct ($id, $name, $sprite) {
        $this->id = $id;
        $this->name = $name;
        $this->sprite = $sprite;
    }

    public function __get ($prop) {
        if (property_exists($this, $prop)) {
            return $this->$prop;
        }
    }

    public function __set ($prop, $value) {
        if(property_exists($this, $prop)) {
            $this->$prop = $value;
        }
    }
}