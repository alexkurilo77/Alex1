<div class="input-group form-group">
	<input type="text" class="form-control" name="title" value="<?= arr_get($p, 'title') ?>">
	<div class="input-group-addon input-group-addon-width-110">Title</div>
</div>
<div class="input-group form-group">
	<textarea class="form-control" name="content" id="" rows=10><?= arr_get($p, 'content') ?></textarea>
	<div class="input-group-addon input-group-addon-width-110">Content</div>
</div>