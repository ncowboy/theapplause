<div class="slider_block">
    <p class="title"><?= $block['title'] ?></p>
    <? if (count($block['gallery']) > 0) { ?>

        <div class="slider_l">
            <? foreach ($block['gallery'] as $item) { ?>
                <div class="item_l">
                    <img src="<?= $item['url'] ?>" alt="<?= $item['title'] ?>">
                </div>
            <? } ?>
        </div>
    <? } ?>
</div>