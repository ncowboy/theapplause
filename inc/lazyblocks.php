<?php
function show_content_acf($post_id = null)
{
    $post_id = empty($post_id) ? get_the_ID() : $post_id;
    $blocks = get_field('block', $post_id);

    if ($blocks) {
        foreach ($blocks as $block) {
            $name = get_template_directory() . '/acf_block/' . $block['acf_fc_layout'] . '.php';

            if (file_exists($name)) {
                include($name);
            }
        }
    }

}