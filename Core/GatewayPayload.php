<?php

namespace Realitaetsverlust\PHPCord\Core;

class GatewayPayload {
    /**
     * Op-Code for payload
     */
    protected int $op;

    /**
     * Event data
     */
    protected mixed $d;

    /**
     * Sequence number
     */
    protected int $s;

    /**
     * Event name for payload
     */
    protected string $t;

    public function __construct() {

    }

    public function encodePayload() {
        
    }

    public function decodePayload() {
        
    }
}