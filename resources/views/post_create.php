<?php
	include_once 'components/header.php';
?>

	<h2>Create Post</h2>
	<div>
		<form method="POST" action="/posts/create">
			<div>
				<label for="author" class="form-label">Author</label>
				<input name="author" type="text" class="form-control" id="author">
			</div>
			<div>
				<label for="title" class="form-label">Title</label>
				<input name="title" type="text" class="form-control" id="title">
			</div>
			<div>
				<label for="imageUrl" class="form-label">Image</label>
				<input name="imageUrl" type="text" class="form-control" id="imageUrl">
			</div>
			<div>
				<label for="description" class="form-label">Description</label>
				<textarea name="description" type="text" class="form-control" id="description"></textarea>
			</div>
			<button type="submit" class="btn">Create</button>
		</form>
	</div>

<?php
	include_once 'components/footer.php';
?>

