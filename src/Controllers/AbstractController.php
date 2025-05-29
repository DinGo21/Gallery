<?php

namespace App\Controllers;

abstract class AbstractController
{
	protected function render(string $view, array $data = []): void
	{
		extract($data);

		include "resources/views/$view.php";
	}
}

