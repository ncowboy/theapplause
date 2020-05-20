<?php
the_post();
$status = get_field('discussion_form', get_the_ID());

if ($status) {
    $forma = get_field('forma', get_the_ID());
    ?>
    <div class="container-fluid">

        <div class="form_block">
            <form class="ajax" onsubmit="yaCounter53233033.reachGoal('zayavka'); return true;">
                <input type="hidden" name="title" value="<?= $forma['title'] ?>">
                <? form_function('form_block') ?>
                <h3 class="title"><?= $forma['title'] ?></h3>
                <span class="des"><?= $forma['des'] ?></span>
                <input type="text" required name="name" placeholder="<?= $forma['name'] ?>">
                <input type="tel" required name="phone" placeholder="<?= $forma['phone'] ?>">
                <button class="btn"><?= $forma['button'] ?><span></span></button>
                <?= $forma['pol'] ?>
            </form>
        </div>
    </div>
<? } ?>