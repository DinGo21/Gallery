<?php

namespace App\Controllers;

class Controller
{
	protected function render(string $view, array $data = []): void
	{
		extract($data);

		include "src/Views/$view.php";
	}
};

