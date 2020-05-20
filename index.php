<?php
/**
 * Template Name: Главная
 */

get_header();
?>
    <div class="container-fluid f_section">
        <div class="container">
            <div class="row">
                <div class="conslt">
                    <?php
                    $screen_1 = get_field('screen_1');
                    echo $screen_1['text'] ?>
                    <a class="btn" data-fancybox data-src="#forma" href="javascript:;">Получить
                        консультацию<span></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid s_section">
        <div class="container">
            <div class="row">
                <div class="text_wrap">

                    <?php
                    $screen = get_field('screen_2');
                    echo $screen['text'] ?>


                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid t_section">
        <div class="container">
            <div class="row">
                <div class="text_t">
                    <?php
                    $screen_1 = get_field('screen_3');
                    echo $screen_1['text'] ?>
                    <a href="<?= $screen_1['url'] ?>" class="btn btn_2">Читать подробнее<span></span></a>
                </div>
            </div>
        </div>
    </div>
<?php
$fourty = get_field('fourty');
?>
    <div class="container-fluid fourty">
        <div class="container">
            <div class="row">
                <span><?= $fourty ['span'] ?></span>
                <h2><?= $fourty ['h2'] ?></h2>
                <div class="blocks">
                    <?php foreach ($fourty ['blocks'] as $item) {
                        $class = $item['class'];
                        $text = $item['hover_text'];
                        $img = $item['img'];
                        $mob_img = $item['mob_img'];
                        ?>
                        <div class="block <?= $class ?>">
                            <? if (!empty($text)) { ?>
                                <div class="hover"><span><?= $text ?></span></div>
                            <? } ?>
                            <? if (!empty($img)) { ?>
                                <img src="<?= $img ?>" alt="img">
                            <? } ?>
                            <? if (!empty($mob_img)) { ?>
                                <img src="<?= $mob_img ?>" alt="img" class="mob">
                            <? } ?>

                        </div>

                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid clients">
        <div class="container">
            <div class="row">
                <?php
                $reviews = get_field('reviews');
                ?>
                <span><?= $reviews['span'] ?></span>
                <h2><?= $reviews['h4'] ?></h2>
                <div class="main_client">
                    <?php foreach ($reviews ['main_client'] as $item) { ?>
                        <div class="main_c" style="background-image: url(<?= $item['img'] ?>);">
                            <span data-fancybox data-type="iframe" data-src="<?= $item['src'] ?>"></span>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="container blog">
        <div class="contaoner">
            <div class="row">   <?php
                $bloc_cat = get_field('bloc_cat');
                $bloc_cat = get_category($bloc_cat);
                ?>

                <span><?= $bloc_cat->name ?></span>
                <?= get_field('blog_desc') ?>
                <div class="hole_blog">
                    <?php
                    $my_posts = new WP_Query;
                    $myposts = $my_posts->query(array(
                        'post_type' => 'post',
                        'cat' => $bloc_cat->term_id,
                        'posts_per_page' => 3
                    ));
                    foreach ($myposts as $pst) {
                        show_post($pst->ID);
                    }
                    ?>
                </div>
                <div class="to_blog">
                    <a href="<?= get_category_link(6) ?>" class="btn btn_2">Перейти в блог <span></span></a>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
