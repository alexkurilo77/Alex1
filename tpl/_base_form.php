<form action="<?= $action ?>" method="<?= $method ?>" class="<?= implode(' ', $form_classes) ?>">
<?php
foreach ($form_parts as $part) {
	include get_tpl($part);
}
?>
<input type="submit" class="btn btn-info pull-right" value="<?= $submit ?>">
</form>