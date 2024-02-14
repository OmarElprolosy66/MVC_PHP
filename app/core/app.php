<?php

declare(strict_types=1);

namespace MVC\Core;

/**
 * Class App
 * @package MVC\Core
 */
class App
{
    /**
     * @var array Stores the parameters parsed from the URL.
     */
    private array $m_params;

    /**
     * @var string Stores the request method (GET, POST, etc.).
     */
    private string $m_method;

    /**
     * @var string Stores the name of the controller to be used.
     */
    private string $m_controller;

    /**
     * App constructor.
     * Parses the URL and sets controller, method, and parameters.
     */
    public function __construct()
    {
        $this->URL();
        $this->render();
    }

    /**
     * Parse the URL and set controller, method, and parameters.
     */
    private function URL(): void
    {
        $queryString = filter_input(INPUT_SERVER, "QUERY_STRING", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($queryString)) {
            $this->m_controller = "HomeController";
            $this->m_method = "index";
            $this->m_params = [];
        } else {
            $urlParts = explode("/", $queryString);

            $this->m_controller = $this->getController($urlParts);
            $this->m_method = $this->getMethod($urlParts);
            $this->m_params = $this->getParam($urlParts);
        }
    }

    /**
     * Get the controller name.
     *
     * @param array $urlParts The URL parts.
     * @return string The controller name.
     */
    private function getController(array &$urlParts): string
    {
        return ucfirst(array_shift($urlParts) ?: "home") . "Controller";
    }

    /**
     * Get the method name.
     *
     * @param array $urlParts The URL parts.
     * @return string The method name.
     */
    private function getMethod(array &$urlParts): string
    {
        return array_shift($urlParts) ?: "index";
    }

    /**
     * Get the parameters.
     *
     * @param array $urlParts The URL parts.
     * @return array The parameters.
     */
    private function getParam(array $urlParts): array
    {
        return array_values($urlParts);
    }

    /**
     * Render the requested controller and method.
     */
    private function render(): void
    {
        $controllerClass = "MVC\\Controllers\\" . $this->m_controller;

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $this->m_method)) {
                $controllerInstance->{$this->m_method}(...$this->m_params);
            } else {
                echo "Method '{$this->m_method}' not found";
            }
        } else {
            echo "Class '{$controllerClass}' does not exist";
        }
    }
}
