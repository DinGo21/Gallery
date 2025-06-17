<?php
	include_once 'components/header.php';
?>
	<div class="container">
		<h1 class="text-center mb-4">Lasts Images</h1>
        <div class="mb-4">
            <form method="GET" action="/posts">
                <input name="title" type="text" class="form-control" placeholder="Search posts">                
            </form>
        </div>
		<div class="row row-cols-1 row-cols-md-2 g-4">
			<?php if (!empty($posts)): ?>
				<?php foreach ($posts as $post): ?>
					<div class="col">
						<div class="card text-bg-light">
							<img src="<?= $post->getImageUrl() ?>" class="card-img-top" alt="<?= $post->getDescription() ?>">
							<div class="card-body">
								<h4 class="card-title"><?= $post->getTitle() ?></h4>
								<p class="card-text"><?= $post->getAuthor() ?></p>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>

<?php
	include_once 'components/footer.php';
?>

