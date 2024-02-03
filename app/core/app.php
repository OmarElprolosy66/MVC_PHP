<?php
namespace MVC\Core;

class app
{
    private $m_params;
    private $m_method;
    private $m_controller;

    public function __construct()
    {
        $this->url();
        $this->render();
    }

    private function url(): void
    {
        if (!empty($_SERVER["QUERY_STRING"])) {
            $url = explode('/', $_SERVER["QUERY_STRING"]);

            $this->m_controller = (isset($url[0]) ? $url[0] . "controller" : "homecontroller");

            $this->m_method = (isset($url[1]) ? $url[1] : "index");
            unset($url[0], $url[1]);

            $this->m_params = array_values($url);
        }
    }

    private function render(): void
    {
        $controller = "MVC\\Controllers\\" . $this->m_controller; //class

        if (class_exists($controller)) {
            $controllerInstance = new $controller();

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
