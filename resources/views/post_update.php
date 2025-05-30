<?php
	include_once 'components/header.php';
?>

	<h2>Update Post</h2>
	<div>
		<form method="POST" action="/posts/update">
			<input name="id" class="form-text" id="id" value="<?= $post->getId() ?>" disabled hidden>
			<div>
				<label for="author" class="form-label">Author</label>
				<input name="author" type="text" class="form-control" id="author">
				<div class="form-text"><?= $post->getAuthor() ?></div>
			</div>
			<div>
				<label for="title" class="form-label">Title</label>
				<input name="title" type="text" class="form-control" id="title">
				<div class="form-text"><?= $post->getTitle() ?></div>
			</div>
			<div>
				<label for="imageUrl" class="form-label">Image</label>
				<input name="imageUrl" type="text" class="form-control" id="imageUrl">
				<div class="form-text"><?= $post->getImageUrl() ?></div>
			</div>
			<div>
				<label for="description" class="form-label">Description</label>
				<textarea name="description" type="text" class="form-control" id="description" placeholder="<?= $post->getDescription() ?>"></textarea>
			</div>
			<button type="submit" class="btn">Update</button>
		</form>
	</div>

<?php
	include_once 'components/footer.php';
?>

