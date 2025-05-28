<?php
	include_once "components/header.php";
?>

	<h2>Title</h2>

	<div>
		<?php if (!empty($posts)): ?>
			<?php foreach ($posts as $post): ?>
				<h4><?= $post->getTitle() ?></h4>
				<img src="<?= $post->getImageUrl() ?>">
				<p><?= $post->getAuthor() ?></p>
				<p><?= $post->getDescription() ?></p>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>

<?php
	include_once "components/footer.php";
?>

