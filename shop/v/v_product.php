<script>
	window.onload = function() {
		document.getElementById('buy').onclick = function() {
			document.getElementById('buy').style.display = "none";
			document.getElementById('buying_form').style.display = "block";
		};
	}
</script>
<div class="all_goods">
    <div class="one_good">
    <div class="left_block">
	<img class="one_good_img" src="img/big/<?= $product["image"] ?>" alt="Изображение" title="<?= $product["title"] ?>" target="_blank">
    </div>
        <div class="right_block">
            <span class="title"><?= $product["title"] ?></span>
    <span class="desc"><?= $product["content"] ?></span>
	<?php
    if ($_SESSION['user_id']) {
		?>
        <form class="form" method="post" name="buying_form">
				<label class="label" for="count">Количество</label>
            <input type="hidden" value="<?= $product["id"]?>">
					<input class="textbox" id="count" type="number" name="count" value="1" required>
                    <input type="submit" class="buy" id="buy" name="button" value="Купить <?= $product["price"] ?>&#36;">
				</form>
		<?php } else {
        ?> <h3>Товар в корзину может добавить только зарегистрированный пользователь!</h3>
   <?php }
	?>
        </div>
        </div>
</div>
<?php if(isset($text)){echo "<script>alert('$text')</script>";}?>