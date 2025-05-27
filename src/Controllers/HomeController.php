<?php

namespace App\Controllers;

use App\Models\Post;

class HomeController extends AbstractController
{
	public function index(): void
	{
		$post = new Post();
		$post->setAuthor('Cat Lover');
		$post->setTitle('Cat in the snow');
		$post->setImageUrl('public/img/cat.jpg');
		$post->setDescription('An image depicting a cat in the snow');

		$this->render('index', [
			'post' => $post,
		]);
	}
};

