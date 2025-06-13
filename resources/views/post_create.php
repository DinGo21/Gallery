<?php
	include_once 'components/header.php';
?>
    <div class="container">
	    <h1 class="text-center mb-4">Create Post</h1>
        <div class="card">
            <div class="card-body">
		        <form method="POST" action="/posts/create">
			        <div class="mb-2">
				        <label for="author" class="form-label">Author</label>
				        <input name="author" type="text" class="form-control" id="author">
			        </div>
			        <div class="mb-2">
				        <label for="title" class="form-label">Title</label>
				        <input name="title" type="text" class="form-control" id="title">
			        </div>
			        <div class="mb-2">
				        <label for="imageUrl" class="form-label">Image</label>
				        <input name="imageUrl" type="text" class="form-control" id="imageUrl">
			        </div>
			        <div class="mb-2">
				        <label for="description" class="form-label">Description</label>
				        <textarea name="description" type="text" class="form-control" id="description"></textarea>
			        </div>
			        <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
<?php
	include_once 'components/footer.php';
?>

