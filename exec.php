<?php

ini_set('display_errors', true);
error_reporting(E_ALL);

use Realitaetsverlust\PHPCord\Core\Kernel;

require "vendor/autoload.php";

$kernel = new Kernel();

$kernel->boot();