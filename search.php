<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Blog
 */

get_header();
?>

    <div class="container-fluid slogan v2">
        <div class="container">
            <div class="row">

                <div class="breadcrumps">
                    <ul>
                        <li><a href="/">Главная</a></li>
                        <li><a href="#">Поиск </a></li>

                    </ul>

                </div>

                <h1>поиск </h1>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="last_search">
                <form action="/" method="get">
                    <input type="text" name="s" placeholder="Иконки" value="<?= $_GET['s'] ?>">
                    <button>найти<span></span></button>
                </form>
                <?php
                $text_count = 170;
                $max_show = 15;
                $page_key = 'page';
                $page_num = (int)$_GET[$page_key];
                $page_num = ($page_num < 1) ? 1 : $page_num;
                $arg = [
                    's' => $_GET['s'],
                    'posts_per_page' => -1,
                    'post_status' => 'publish'
                ];
                $query = new WP_Query;
                $myposts = $query->query($arg);
                $coutn = count($myposts);
                $pages = ceil($coutn / $max_show);


                $arg = [
                    's' => $_GET['s'],
                    'posts_per_page' => $max_show,
                    'post_status' => 'publish',
                    'paged' => $page_num
                ];
                $query = new WP_Query;
                $myposts = $query->query($arg);
                ?>
                <p class="al">Найдено:<span> <?= $coutn ?></span></p>
                <div class="results">
                    <?php
                    foreach ($myposts as $key => $post) {
                        ?>

                        <div class="one_result">
                            <a href="<?= get_permalink($post->ID) ?>">
                                <p class="title"> <?= preg_replace("/" . $_GET['s'] . "/i", "<span>" . $_GET['s'] . "</span>", $post->post_title); ?> </p>
                            </a>
                            <?php
                            $text = strip_tags($post->post_content);
                            $start = (int)strstr($text, $_GET['s']);
                            $end = $start + $text_count;
                            $text = substr($text, $start, $end);

                            ?>
                            <p class="low">
                                ...<?= preg_replace("/" . $_GET['s'] . "/i", "<span>" . $_GET['s'] . "</span>", $text); ?>
                                ...
                            </p>
                        </div>
                    <? } ?>
                </div>
            </div>
            <?php
            dex_pagination(['max' => $pages, 'key' => $page_key]);
            ?>


        </div>
    </div>

<?php
get_footer();
