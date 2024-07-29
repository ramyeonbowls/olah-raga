<?php

namespace App\OlahRaga;

class Basketball extends Sport {
    public function __construct() {
        parent::__construct("Basketball", "Indoor");
    }

    public function greeting() {
        return "Basketball is an exciting indoor sport!";
    }
}