<?php if (isset($_GET["post_id"])): ?>

	<h3>Choose a background image</h3>
	<form action="#" method="POST">
		<input type="hidden" name="post_id" value="<?php echo $_GET['post_id'] ?>">
		<label>Twitter widget code</label>
		<textarea placeholder="Twitter widget code"></textarea>
		<label>Facebook widget code</label>
		<textarea placeholder="Facebook widget code"></textarea>
		<input type="submit">
	</form>

<?php endif; ?>