<?php
define("DIR_SEPARAT", DIRECTORY_SEPARATOR);

define("ROOT", dirname(__DIR__));
define("APP", ROOT . DIR_SEPARAT . "app" . DIR_SEPARAT);
define("CORE", APP . DIR_SEPARAT . "core" . DIR_SEPARAT);
define("VIEWS", APP . DIR_SEPARAT . "views" . DIR_SEPARAT);
define("MODELS", APP . DIR_SEPARAT . "models" . DIR_SEPARAT);
define("CONFIG", APP . DIR_SEPARAT . "config" . DIR_SEPARAT);
define("CONTROLLERS", APP . DIR_SEPARAT . "controllers" . DIR_SEPARAT);

require_once "../vendor/autoload.php";

$app = new MVC\Core\app();