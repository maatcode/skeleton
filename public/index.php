<?php
use Maatcode\Application\Loader;

require_once  dirname(__DIR__) . '/vendor/autoload.php';

chdir(dirname(__DIR__));

error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('display_startup_errors', true);

Loader::init(require_once dirname(__DIR__) . '/config/application.config.php');
