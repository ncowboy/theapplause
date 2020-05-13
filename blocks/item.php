<?php
function show_post($post_id)
{
    $post = get_post($post_id);
    $cats = get_the_category($post_id);
    foreach ($cats as $key => $cat) {
        if ($cat->parent === 0) {
            unset($cats[$key]);
        }

    }

  
    $share = get_post_meta($post_id,'spread',true);
    $comment = get_post_meta($post_id,'comments',true);
    ?>

    <div class="one_blog">
        <img src="<?= get_the_post_thumbnail_url($post->ID, [370,208]) ?>" style='max-width: 370px;max-height: 208px' alt="<?= $post->post_title ?>">
        <div class="right_part_blog">
            <a href="<?= get_permalink($post->ID) ?>"><?= $post->post_title ?> </a>
            <span><?= get_the_date(null, $post) ?></span>
            <p><?= (count($cats) > 0) ? array_shift($cats)->name : '' ?></p>
            <div class="buttons">
                <p><span style="background-image: url(img/share.png);"></span><?= $share ?></p>
                <p><span style="background-image: url(img/comment.png);"></span><?= $comment ?></p>
            </div>
        </div>
    </div>
    <?php
}