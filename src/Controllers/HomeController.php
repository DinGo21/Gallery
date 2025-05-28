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

	public function show(int $id): void
	{
		$post = new Post()->findById($id);

		$this->render('show', [
			'post' => $post,
		]);
	}
};

