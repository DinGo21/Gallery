<?php
	include_once "components/header.php";
?>

	<h2>Title</h2>

	<div>
		<?php if ($post): ?>
			<h4><?= $post->getTitle() ?></h4>
			<img src="<?= $post->getImageUrl() ?>">
			<p><?= $post->getAuthor() ?></p>
			<p><?= $post->getDescription() ?></p>
		<?php endif; ?>
	</div>

<?php
	include_once "components/footer.php";
?>

