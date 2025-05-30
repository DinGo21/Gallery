<?php

namespace App\Controllers;

use App\Models\Post;

class HomeController extends AbstractController
{
	public function index(): void
	{
		$posts = new Post()->findAll();

		$this->render('index', [
			'posts' => $posts,
		]);
	}
}

