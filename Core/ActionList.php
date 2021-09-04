<?php

namespace Realitaetsverlust\PHPCord\Core;

use Exception;
use Iterator;
use stdClass;

class ActionList implements Iterator {
    private $actions = [];
    private $position = 0;

    /**
     * Adds an action to the list
     *
     * @param string $action Name of the action. Has to include the class name, if exists, like "Amp\\Loop::stop"
     * @param int $interval
     */
    public function addActionToList(string $action, int $interval) : bool {
        try {
            $actionClass = new ("Realitaetsverlust\\PHPCord\\Actions\\" . $action)($interval);
        } catch(Exception $e) {
            //TODO: Write to log
            return false;
        }

        $class = new stdClass();
        $class->name = $action;
        $class->class = $actionClass;

        $this->actions[] = $class;

        return true;
    }

    /**
     * Removes an action from the list
     *
     * @param string $action
     */
    public function removeActionFromList(string $action) : void {
        unset($this->actions[$action]);
    }

    //region Iterator-Stubs
    /**
     * @inheritDoc
     */
    public function current() {
        return $this->actions[$this->position];
    }

    /**
     * @inheritDoc
     */
    public function next() : void {
        ++$this->position;
    }

    /**
     * @inheritDoc
     */
    public function key() : bool|float|int|null|string {
        return $this->position;
    }

    /**
     * @inheritDoc
     */
    public function valid() : bool {
        return isset($this->actions[$this->position]);
    }

    /**
     * @inheritDoc
     */
    public function rewind() : void {
        $this->position = 0;
    }
    //endregion
}