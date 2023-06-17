<?php


namespace Core;


use Core\Exception\ClientErrorException;

class Router
{
    static protected array $routes = [];
    static protected array $params = [];
    static protected array $convertTypes = [
        'd' => 'int',
        'D' => 'string'
    ];

    static public function add(string $route, array $params = []): void
    {
        list($controller, $action, $method) = $params;

        $route = preg_replace('/\//', '\\/', $route);
        $route = preg_replace('/\{([a-z_]+):([^}]+)}/', '(?P<$1>$2)', $route);
        $route = "/^{$route}$/i";

        static::$routes[$route] = compact('controller', 'action', 'method');
    }

    static public function dispatch(string $url): void
    {
        $url = trim(static::removeQueryParams($url), "/");

        if(static::match($url)) {
            static::checkRequestMethod();

            $controller = static::getController();
            $action = static::getAction($controller);

            if($controller->before($action)) {
                call_user_func_array([$controller, $action], static::$params);
                $controller->after($action);
            }
        }
    }

    static protected function match(string $url):bool {

        foreach (static::$routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                static::$params = static::setParams($route, $matches, $params);
                return true;
            }
        }

        throw new ClientErrorException("Page Not Found", 404);
    }

    static protected function setParams(string $route, array $matches = [], array $params = []): array {
        preg_match_all('/\(\?P<[\w]+>\\\\(\w[\+]*)\)/', $route, $types);
        $matches = array_filter($matches,'is_string',ARRAY_FILTER_USE_KEY);

        if(!empty($types)) {
            $lastKey = array_key_last($types);
            $step = 0;
            $types[$lastKey] = str_replace("+", "", $types[$lastKey]);

            foreach ($matches as $name => $match) {
                settype($match, static::$convertTypes[$types[$lastKey][$step]]);
                $params[$name] = $match;
                $step++;
            }
        }

        return $params;
    }

    static protected function checkRequestMethod(): void {
            if(array_key_exists("method", static::$params)) {
                $requestMethod = $_SERVER["REQUEST_METHOD"];

                if($requestMethod !== strtoupper(static::$params["method"])) {
                    throw new ClientErrorException("Method Not Allowed", 405);
                }

                unset(static::$params["method"]);
            }
    }

    static protected function getController(): BaseController {
        $controller = static::$params["controller"] ?? null;

        if(!class_exists($controller)) {
            throw new \Exception("Controller {$controller} not exists");
        }

        unset(static::$params["controller"]);

        return new $controller();
    }

    static protected function getAction(BaseController $controller): string {
        $action = static::$params["action"] ?? null;

        if(!method_exists($controller, $action)) {
            throw new \Exception("Method [{$action}] => ". $controller::class . " not exists");
        }

        unset(static::$params["action"]);

        return $action;
    }

    static protected function removeQueryParams(string $url): string {
        list($url) = explode("?", $url);
        return $url;
    }


}