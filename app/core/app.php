<?php
namespace MVC\Core;

class app
{
    private array $m_params;
    private string $m_method;
    private string $m_controller;

    public function __construct()
    {
        $this->url();
        $this->render();
    }

    private function url(): void
    {
        $queryString = filter_input(INPUT_SERVER, 'QUERY_STRING', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (!empty($queryString)) {
            $urlParts = explode('/', $queryString);

            $this->m_controller = $this->getControllerName($urlParts);
            $this->m_method = $this->getMethodName($urlParts);
            $this->m_params = $this->getParameters($urlParts);
        } else {
            $this->m_controller = "HomeController";
            $this->m_method = "index";
            $this->m_params = [];
        }
    }

    private function getControllerName(array &$urlParts): string
    {
        $controller = array_shift($urlParts);
        return $controller ? $controller . "controller" : "homecontroller";
    }

    private function getMethodName(array &$urlParts): string
    {
        return array_shift($urlParts) ?: "index";
    }

    private function getParameters(array $urlParts): array
    {
        return array_values($urlParts);
    }

    private function render(): void
    {
        $controllerClass = "MVC\\Controllers\\" . $this->m_controller;

        if (class_exists($controllerClass)) {
            $controllerInstance = new $controllerClass();

            if (method_exists($controllerInstance, $this->m_method)) {
                $controllerInstance->{$this->m_method}(...$this->m_params);
            } else {
                echo "Method does not exist.";
            }
        } else {
            echo "Controller does not exist.";
        }
    }
}
