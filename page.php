<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Blog
 */

get_header();
?>


    <div class="container-fluid slogan">
        <div class="container">
            <div class="row">

                <div class="breadcrumps">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="#"><?= get_the_title() ?></a></li>
                    </ul>

                </div>
                <h1><?= get_the_title() ?></h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <div class="contain">
                <? show_content_acf() ?>
            </div>
        </div>
   
    </div>
<?php include('blocks/form_block.php');
get_footer();
