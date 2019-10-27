<?php

class RandomElon
{

    public $min;
    public $max;
    public $jsonstr;

    public function __construct($edad_min, $edad_max)
    {
        $this->min = $edad_min;
        $this->max = $edad_max;
        $this->jsonstr = json_decode(file_get_contents("csvjson.json"), true);
    }

    public function getRandom()
    {

        $array = $this->jsonstr;
        $rand = $array[rand(0, count($array) - 1)];

        $person_list = array();

        for ($i = $this->min; $i <= $this->max; $i++) {
            array_push($person_list, new Person($rand["nombre"], $i));
        }

        return $person_list;
    }

    public function getFromIndex($i)
    {

        $array = $this->jsonstr;
        $rand = $array[$i];

        $person_list = array();

        for ($i = $this->min; $i <= $this->max; $i++) {
            array_push($person_list, new Person($rand["nombre"], $i));
        }

        return $person_list;
    }

    public function getAll()
    {
        $array = $this->jsonstr;
        $all_persons = array();
        for ($i=0; $i < count($array); $i++) { 
            $persons = $this->getFromIndex($i);
            array_push($all_persons,$persons);
        }
        return $all_persons;
    }
}
