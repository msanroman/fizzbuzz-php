<?php

class FizzBuzz {

    public function __construct($checkers) {
        $this->checkers = $checkers;
    }

    public function play() {
        $result = array();
        for ($i=1; $i <= 100; $i++)
            $result[$i] = $this->getValueFor($i);
        return $result;
    }

    private function getValueFor($number) {
        foreach($this->checkers as $checker)
            if($checker->check($number))
                return $checker->getTranslation();
        return $number;
    }
}