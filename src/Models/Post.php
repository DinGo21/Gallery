<?php

namespace App\Models;

class Post extends AbstractModel
{
	protected string $table = 'posts';

	private ?string $author = null;

	private ?string $title = null;

	private ?string $imageUrl = null;

	private ?string $description = null;

	public function getId(): ?int
	{
		return $this->id;
	}

	public function setAuthor(string $author): void
	{
		$this->author = $author;
	}
	
	public function getAuthor(): ?string
	{
		return $this->author;
	}

	public function setTitle(string $title): void
	{
		$this->title = $title;
	}

	public function getTitle(): ?string
	{
		return $this->title;
	}

	public function setImageUrl(string $imageUrl): void
	{
		$this->imageUrl = $imageUrl;
	}

	public function getImageUrl(): ?string
	{
		return $this->imageUrl;
	}

	public function setDescription(string $description): void
	{
		$this->description = $description;
	}

	public function getDescription(): ?string
	{
		return $this->description;
	}
}

