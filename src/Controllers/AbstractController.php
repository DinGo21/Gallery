<?php

namespace App\Controllers;

use App\Routes\Router;

abstract class AbstractController
{
    /**
     * @param array<string,mixed> $data
     */
    protected function render(string $view, array $data = [], int $status = 200): void
	{
		extract($data);

		http_response_code($status);

		include "resources/views/$view.php";
	}

	protected function redirect(string $url, int $redirectStatus = 302): void
	{
		Router::redirect($url, $redirectStatus);
	}
}

