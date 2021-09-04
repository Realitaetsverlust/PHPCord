<?php

namespace Realitaetsverlust\PHPCord\Actions;

use Realitaetsverlust\PHPCord\Core\Action;
use Realitaetsverlust\PHPCord\Core\ActionInterface;

/**
 * Class responsible for heartbeating at the discord gateway to signal the bot is still active and alive
 * @package Realitaetsverlust\PHPCord
 */
class Heartbeat extends Action implements ActionInterface{
    public function __construct(int $interval) {
        $this->interval = $this->time = $interval;
    }

    public function execute() {
        $this->resetTimer();
    }

    public function resetTimer() {
        $this->time = $this->interval;
    }
}