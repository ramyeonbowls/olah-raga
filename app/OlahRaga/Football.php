<?php

namespace App\OlahRaga;

class Football extends Sport {
    public function __construct() {
        parent::__construct("Football", "Outdoor");
    }

    public function greeting() {
        return "Football is a popular outdoor sport!";
    }
}