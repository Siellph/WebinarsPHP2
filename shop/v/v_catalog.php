<main class="all_goods">
	<?php
		if (isset($catalog)) {
			foreach ($catalog as $product) { ?>
                <div class="good">
                    <div class="left_block">
                        <a href="index.php?c=page&act=product&id=<?= $product["id"]?>"><img class="good_img"
                                                                                             src="img/<?= $product["image"]?>"
                                                                                             alt="Изображение"
                                                                                             title="<?= $product["title"]?>"></a>
                    </div>
                    <div class="right_block">
                        <a class="title more_title" href="index.php?c=page&act=product&id=<?= $product["id"]?>"> <?= $product["title"]?></a>
                        <span class="price"><?= $product["price"] ?>&#36;</span>
                        <a class="buy" href="index.php?c=page&act=product&id=<?= $product["id"]?>">Подробнее</a>
                            </form>
                    </div>
                </div>
<?php
			}
		}
		?>
</main>