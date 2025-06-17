<?php
	include_once "components/header.php";
?>
    <div class="container">
    <h1 class="text-center mb-4"><?= $post->getTitle() ?></h1>
		<?php if ($post): ?>
            <div class="card mb-2">
                <img class="card-img-top" src="<?= $post->getImageUrl() ?>">
                <div class="card-body">
				    <p><?= $post->getAuthor() ?></p>
			    	<p><?= $post->getDescription() ?></p>
                </div>
            </div>
		<?php endif; ?>
        <span><?php include "post_delete.php" ?></span>
    </div>
<?php
	include_once "components/footer.php";
?>

