<div class="statias">
    <h2><?= $block['title'] ?></h2>
    <? if (count($block['list']) > 0) { ?>
        <ul>
            <? foreach ($block['list'] as $item) { ?>

                <li><?= $item['item'] ?></li>
            <? } ?>
        </ul>
    <? } ?>
</div>
