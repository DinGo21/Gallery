<form method="POST" action="/posts/<?= $post->getId() ?>/delete">
    <input type="hidden" name="id" value="<?= $post->getId() ?>">
    <button type="submit" class="btn btn-danger">Delete</button>
</form>

