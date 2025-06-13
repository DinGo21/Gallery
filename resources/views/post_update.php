<?php
	include_once 'components/header.php';
?>
    <div class="container">
	    <h1 class="text-center mb-4">Update Post</h1>
	    <div class="card">
            <div class="card-body">
		        <form method="POST" action="/posts/update">
			        <input type="hidden" name="id" class="form-text" id="id" value="<?= $post->getId() ?>">
			        <div class="mb-2">
				        <label for="author" class="form-label">Author</label>
				        <input name="author" type="text" class="form-control" id="author">
				        <div class="form-text"><?= $post->getAuthor() ?></div>
			        </div>
			        <div class="mb-2">
				        <label for="title" class="form-label">Title</label>
				        <input name="title" type="text" class="form-control" id="title">
				        <div class="form-text"><?= $post->getTitle() ?></div>
			        </div>
			        <div class="mb-2">
				        <label for="imageUrl" class="form-label">Image</label>
				        <input name="imageUrl" type="text" class="form-control" id="imageUrl">
				        <div class="form-text"><?= $post->getImageUrl() ?></div>
			        </div>
			        <div class="mb-2">
				        <label for="description" class="form-label">Description</label>
				        <textarea name="description" type="text" class="form-control" id="description" placeholder="<?= $post->getDescription() ?>"></textarea>
			        </div>
			        <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
	    </div>
    </div>
<?php
	include_once 'components/footer.php';
?>

