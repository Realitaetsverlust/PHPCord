<?php

namespace Realitaetsverlust\PHPCord\Core;

abstract class Action {
    protected int $interval;
    protected int $time;

    public function subtract(int $passedTime) : int {
        return ($this->time -= $passedTime);
    }
}