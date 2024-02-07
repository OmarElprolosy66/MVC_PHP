<?php
declare(strict_types=1);

namespace MVC\Core;

class App
{
    private array $m_params;
    private string $m_method;
    private string $m_controller;

    public function __construct()
    {
        $this->URL();
        $this->render();
    }

    /**
     * Parse the URL and set controller, method, and parameters.
     */
    public function URL(): void
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
     * @param array $urlParts
     *
     * @return string
     */
    public function getController(array &$urlParts): string
    {
        return ucfirst(array_shift($urlParts) ?: "home") . "Controller";
    }

    /**
     * Get the method name.
     *
     * @param array $urlParts
     *
     * @return string
     */
    public function getMethod(array &$urlParts): string
    {
        return array_shift($urlParts) ?: "index";
    }

    /**
     * Get the parameters.
     *
     * @param array $urlParts
     *
     * @return array
     */
    public function getParam(array $urlParts): array
    {
        return array_values($urlParts);
    }

    /**
     * Render the requested controller and method.
     */
    public function render(): void
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
