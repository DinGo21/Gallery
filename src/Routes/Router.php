<?php

namespace App\Routes;

class Router
{
	private array $routes = [];

	public static function redirect(string $url, int $redirectStatus = 302): void
	{
		header('Location:' . $url, true, $redirectStatus);
		die();
	}

	private function addRoute(string $route, string $controller, string $action,
		string $method): void
	{
		$this->routes[$method][$route] = ['controller' => $controller, 'action' => $action];	
	}

	public function get(string $route, string $controller, string $action): void
	{

		$this->addRoute($route, $controller, $action, 'GET');
	}

	public function post(string $route, string $controller, string $action): void
	{
		$this->addRoute($route, $controller, $action, 'POST');
    }

    /**
     * @return array<string,mixed>
     */
    public function parseUri(string $uri): array
    {
        $uriData = ['realUri' => $uri, 'id' => null];
        $token = strtok($uri, '/');
        
        while ($token) {
            if (is_numeric($token)) {
                $uriData['id'] = $token;
                $uriData['realUri'] = str_replace($token, '{id}', $uri);

                return $uriData;
            }

            $token = strtok('/');
        }

        return $uriData;
    }

	public function dispatch(): void
	{
        $uri = strtok($_SERVER['REQUEST_URI'], '?');
        $uriData = $this->parseUri($uri);
		$method = $_SERVER['REQUEST_METHOD'];

		if (!array_key_exists($uriData['realUri'], $this->routes[$method])) {
			http_response_code(404);
			die();
        }

		$controller = $this->routes[$method][$uriData['realUri']]['controller'];
		$action = $this->routes[$method][$uriData['realUri']]['action'];

        $controller = new $controller();

        if ($uriData['id'])
            $controller->$action($uriData['id']);
        else
            $controller->$action();
	}
}

