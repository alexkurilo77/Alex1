<div class="alert alert-<?= $status ?>" role="alert">
<?php foreach ($messages as $text): ?>
  <div class="row">
  	<span class="glyphicon glyphicon-<?= $status ?>-sign"></span>
  	<?= $text ?>
  </div>
<?php endforeach ?>
</div>