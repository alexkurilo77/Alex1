<div class="container">
	<div class="col-sm-8">
		<h2>
      <a href="/post/<?= $post['to_id'] ?>">
        <?= $post['title'] ?>
      </a>
    </h2>
		<p class=""><?= $post['content'] ?></p>
		<small>
      <em class="">
        <a href="/user/<?= $post['name'] ?>">
          <?= $post['name'] ?>
        </a>
      </em>
    </small>
	</div>
</div>
<hr>