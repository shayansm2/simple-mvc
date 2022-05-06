<?php

namespace Core;

class Router
{
    private static array $routes = [];

    public static function addRoute(string $uri, array $controllerAction): void
    {
        static::$routes[$uri] = $controllerAction;
    }

    public static function dispatch(string $requestUri): bool
    {
        if (array_key_exists($requestUri, self::$routes)) {
            [$controllerName, $methodName] = self::$routes[$requestUri];

            (new $controllerName())->$methodName();

            return true;
        }

        foreach (Config::get('SERVE_DIRS') as $serveDirs) {
            if (str_starts_with($requestUri, '/' . $serveDirs)) {
                return false;
            }
        }

        http_response_code(404);
        return true;
    }
}
