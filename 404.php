<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Blog
 */

get_header();
$page = get_post(23);
?>

    <div class="container-fluid error">
        <div class="row">
            <div class="hole_error">
                <img src="<?= get_the_post_thumbnail_url($page->ID, 'full') ?>" alt="404">
                <div class="right_text">
                    <?= $page->post_content ?>
                    <div class="search">
                        <form action="/" method="get">
                            <input name="s" type="text" placeholder="Поиск по сайту">
                            <button class="loop"></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        header, footer {
            display: none;
        }
    </style>
<?php
get_footer();
