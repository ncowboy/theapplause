<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Blog
 */

get_header();
$cats = get_the_category(get_the_ID());
$out_cat = null;
foreach ($cats as $key => $cat) {
    if ($cat->parent === 0) {
        $out_cat = $cat;
        break;
    }

}


the_post();
$share = get_post_meta(get_the_ID(), 'spread', true);
$comment = get_post_meta(get_the_ID(), 'comments', true);

?>


    <div class="container-fluid slogan">
        <div class="container">
            <div class="row">

                <div class="breadcrumps">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="<?= get_category_link($out_cat->term_id) ?>"><?= $out_cat->name ?></a></li>
                        <li><a href="#"><?= get_the_title() ?></a></li>
                    </ul>

                </div>
                <h1><?= get_the_title() ?></h1></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="statia">
                <div class="f_row">
                    <div class="left_part">
                        <p><?= get_the_date() ?></p>
                        <a href="<?= get_category_link(6) ?>?post_author=<? the_author_meta('ID') ?>"> <?php the_author(get_the_ID()); ?>  </a>
                    </div>
                    <div class="social">Поделиться<p><i class="fas fa-share-alt"></i><b data-share><?= $share ?></b>
                        </p> <? share_butthon(); ?></div>
                </div>
                <div class="s_row">
                    <p class="time">Время чтения:<span><?= get_field('reading_time') ?></span></p>
                    <p class="otz"><i class="fas fa-comment-alt"></i><?= $comment ?> <?= type_com($comment) ?> </p>
                </div>
                <div class="desc">
                    <?php
                    /* the_post();
                     the_content();*/
                    ?>
                </div>
                <div class="desc">
                    <p class="title">Оглавление:</p>
                    <?php
                    $contents = get_field('contents', get_the_ID());
                    if (is_array($contents)) {
                        foreach ($contents as $key_out => $content) {
                            ?>
                            <div class="one_acc">
                                <div class="accar">
                                    <p class="main_acc"><?= $content['headline'] ?></p>
                                    <? if (is_array($content['list'])) { ?>
                                        <ul>
                                            <? foreach ($content['list'] as $item) { ?>
                                                <li><a href="<?= $item['url'] ?>"><?= $item['text'] ?></a></li>
                                            <? } ?>
                                        </ul>
                                    <? } ?>
                                </div>
                                <span class="number"><?= $key_out + 1 ?></span>
                            </div>
                        <? }
                    } ?>
                </div>
            </div>
            <div class="contain">
                <?php show_content_acf() ?>

                <div class="col-md-12">
                    <div class="share">
                    <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
                    <script src="//yastatic.net/share2/share.js"></script>
                    <div class="ya-share2" id="my-share" data-services="collections,vkontakte,facebook,odnoklassniki,moimir" data-counter=""></div>
                    </div>
                </div>

                <div class="end">
                    <div class="avtor">
                        <div class="left_av">
                            <p class="big">A</p>
                            <div class="opus">
                                <p>Автор:</p>
                                <a href="<?= get_category_link(6) ?>?post_author=<? the_author_meta('ID') ?>"
                                   class="un"><?php the_author(get_the_ID()); ?></a>
                                <a href="<?= get_category_link(6) ?>?post_author=<? the_author_meta('ID') ?>">Все статьи
                                    этого автора</a>
                            </div>
                        </div>
                        <div class="last_news">
                            <p>Последние статьи автора:</p>
                            <?php
                            $arg = [
                                'posts_per_page' => 3,
                                'post_status' => 'publish',
                                'author' => get_the_author_meta('ID')
                            ];
                            $query = new WP_Query;
                            $myposts = $query->query($arg);
                            foreach ($myposts as $key => $post) {

                                ?>
                                <a href="<?= get_permalink($post->ID) ?>"><?= $post->post_title ?></a>
                                <?
                            }
                            ?>

                        </div>
                    </div>
                </div>
                <div class="tags">
                    <span>#</span>
                    <?php
                    $cats = wp_get_post_categories(get_the_ID(), array('fields' => 'all'));
                    if (is_array($cats)) {
                        foreach ($cats as $cat) {
                            ?>
                            <a href="<?= get_category_link($out_cat->term_id) ?>?cat_select=<?= $cat->term_id ?>"><?= $cat->name ?></a>
                            <?
                        }
                    }
                    ?>
                </div>
                <div class="read_also">
                    <p class="title">Читайте также</p>
                    <div class="hole_news">
                        <?php
                        $arg = [
                            'posts_per_page' => 12,
                            'post_status' => 'publish',
                            'cat' => 6
                        ];
                        $query = new WP_Query;
                        $myposts = $query->query($arg);
                        foreach ($myposts as $key => $post) {
                            ?>
                            <div class="one_new">
                                <a href="<?= get_permalink($post->ID) ?>">
                                    <img src="<?= get_the_post_thumbnail_url($post->ID) ?>"
                                         alt="<?= $post->post_title ?>">
                                    <p><?= substr($post->post_title, 0, 80) ?>...
                                    </p>
                                </a>
                            </div>
                            <?
                        }
                        ?>
                    </div>
                </div>
                <div class="comment_block">


                    <?php if (comments_open()) {

                        include('inc/disqus-comments.php');
                    }


                    ?>


                </div>
            </div>
        </div>
    </div>

<?php
include('blocks/form_block.php');
get_footer();
