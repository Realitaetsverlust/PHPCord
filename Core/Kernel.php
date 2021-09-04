<?php

namespace Realitaetsverlust\PHPCord\Core;

use Amp\Loop;

class Kernel {
    /**
     * The base tick rate in which all the other actions are checked
     *
     * @var int
     */
    private int $tickInterval = 100;
    private ActionList $actionList;

    /**
     * Initial launch
     */
    public function boot() {
        $this->actionList = new ActionList();
        $this->actionList->addActionToList("Heartbeat", 1000);

        $this->run();
    }

    /**
     * Main loop
     */
    public function run() {
        Loop::run(function() {
            Loop::repeat($this->tickInterval, [$this, 'tick']);
            Loop::delay(5000, "Amp\\Loop::stop");
        });
    }

    /**
     * Base tick
     */
    public function tick() {
        $executeList = [];

        foreach($this->actionList as $action) {
            $actionClass = $action->class;
            $remainingTime = $actionClass->subtract($this->tickInterval);

            if($remainingTime <= 0) {
                $executeList[] = $actionClass;
            }
        }

        if(!empty($executeList)) {
            $this->processExecuteList($executeList);
        }
    }

    public function processExecuteList(array $executeList) {
        foreach($executeList as $executeItem) {
            $executeItem->execute();
        }
    }
}
