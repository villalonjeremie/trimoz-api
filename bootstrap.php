<?php
require 'vendor/autoload.php';
require 'Di.php';
use Dotenv\Dotenv;
use Trimoz\Permutation\Redis\ClientConnection;

$dotenv = new DotEnv(__DIR__);
$dotenv->load();
