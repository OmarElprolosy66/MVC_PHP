<?php

declare(strict_types=1);

/**
 * Directory separator constant.
 */
define("DIR_SEPARAT", DIRECTORY_SEPARATOR);

/**
 * Root directory constant.
 */
define("ROOT", dirname(__DIR__));

/**
 * Application directory constant.
 */
define("APP", ROOT . DIR_SEPARAT . "app" . DIR_SEPARAT);

/**
 * Core directory constant.
 */
define("CORE", APP . DIR_SEPARAT . "core" . DIR_SEPARAT);

/**
 * Views directory constant.
 */
define("VIEWS", APP . DIR_SEPARAT . "views" . DIR_SEPARAT);

/**
 * Models directory constant.
 */
define("MODELS", APP . DIR_SEPARAT . "models" . DIR_SEPARAT);

/**
 * Configurations directory constant.
 */
define("CONFIG", APP . DIR_SEPARAT . "config" . DIR_SEPARAT);

/**
 * Controllers directory constant.
 */
define("CONTROLLERS", APP . DIR_SEPARAT . "controllers" . DIR_SEPARAT);

/**
 * Database port constant.
 */
define("PORT", "3306");

/**
 * Database server constant.
 */
define("SERVER", "localhost");

/**
 * Database username constant.
 */
define("USER_NAME", "root");

/**
 * Database password constant.
 */
define("PASSWORD", "");

/**
 * Database charset constant.
 */
define("CHARSET", "utf8");

/**
 * Database name constant.
 */
define("DATABASE_NAME", "proone");

/**
 * Database type constant.
 */
define("DATABASE_TYPE", "mysql");

/**
 * Domain name constant.
 */
define("DOMAIN_NAME", "http://news.test");

/**
 * Front assets path constant.
 */
define("FRONT", DOMAIN_NAME . "/");

require_once "../vendor/autoload.php";

$app = new MVC\Core\app();
