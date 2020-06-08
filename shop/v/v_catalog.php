<main class="all_goods">
	<?php
		if (isset($catalog)) {
			foreach ($catalog as $product) { ?>
                <div class="good">
                    <div class="left_block">
                        <a href="index.php?c=page&act=product&id= <?= $product["id"]?>"><img class="good_img"
                                                                                             src=" <?= $product["image"]?>"
                                                                                             alt="Изображение"
                                                                                             title="<?= $product["title"]?>"></a>
                    </div>
                    <div class="right_block">
                        <a class="title more_title" href="index.php?c=page&act=product&id= <?= $product["id"]?>"> <?= $product["title"]?></a>
                        <?php if ($_SESSION['user_id']) { ?>
                        <a class="buy"> В корзину <?= $product["price"]?>&#36;</a>
                        <?php } ?>
                    </div>
                </div>
<?php
			}
		}
		?>
</main>


