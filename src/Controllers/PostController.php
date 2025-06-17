<?php

namespace App\Controllers;

use App\Models\Post;

class PostController extends AbstractController
{
    public function index(): void
    {

    }

	public function show(int $id): void
	{
		$post = new Post()->findById($id);

		$this->render('post_show', [
			'post' => $post,
		]);
	}

	public function create(): void
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$post = new Post();
			$post->setAuthor($_POST['author']);
			$post->setTitle($_POST['title']);
			$post->setImageUrl($_POST['imageUrl']);
			$post->setDescription($_POST['description']);
			$post->store();

			$this->redirect('/');
		}

		$this->render('post_create');
	}

	public function update(int $id): void
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$post = new Post()->findById($id);
			$post->setAuthor($_POST['author']);
			$post->setTitle($_POST['title']);
			$post->setImageUrl($_POST['imageUrl']);
			$post->setDescription($_POST['description']);
			$post->update();

			$this->redirect('/');
		}

		$post = new Post()->findById($id);

		$this->render('post_update', [
			'post' => $post,
		]);
	}

    public function delete(int $id): void
    {
        $post = new Post()->findById($id);
        $post->delete();

        $this->redirect('/');
    }
}

