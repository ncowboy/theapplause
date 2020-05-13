<?php get_header();

$category = get_category(get_query_var('cat'));
$cat_select = (int)(isset($_GET['cat_select'])) ? $_GET['cat_select'] : $category->term_id;
?>

<div class="container-fluid slogan v2">
    <div class="container">
        <div class="row">
            <div class="breadcrumps">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="<?= get_category_link($category->term_id) ?>"><?= $category->name ?></a></li>

                </ul>
            </div>
            <?= $category->description ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="filter_start">

            <?php
            $categories = get_categories(array(
                'taxonomy' => 'category',
                'type' => 'post',
                'parent' => $category->term_id,
            ));
            ?>


            <form method="get" action="<?= get_category_link($category) ?>">

                <div class="search_menu">
                    <input type="hidden" name="cat_select" class="set_val" value="<?= $cat_select ?>">
                    <input type="text" class="val" placeholder="Выберите рубрику..."
                    value="<?= get_cat_name($cat_select) ?>">
                    <?php
                    if ($categories) {
                        echo '  <ul>';
                        foreach ($categories as $cat) {
                            echo '<li data-val="' . $cat->term_id . '">' . $cat->name . '</li>';
                        }
                        echo '</ul>';
                    }
                    ?>


                </div>
                <div class="hole_buttons">
                    <div class="butts">
                        <div class="rad">
                            <input type="radio" id="radio" name="sort" <?=(empty($_GET['sort']))?'checked':''?> value=""/>
                            <label for="radio"><span>Не сортировать</span></label>
                        </div>
                        <div class="rad">
                            <input type="radio" id="radio2" name="sort" <?=($_GET['sort']==='spread')?'checked':''?> value="spread"/>
                            <label for="radio2"><span>Самые расшариваемые</span></label>
                        </div>
                        <div class="rad">
                            <input type="radio" id="radio3" name="sort" <?=($_GET['sort']==='comments')?'checked':''?>  value="comments"/>
                            <label for="radio3"><span>Самые обсуждаемые</span></label>
                        </div>
                    </div>
                    <button>Применить <span></span></button>
                </div>
            </form>
        </div>
        <div class="blog v2">
            <div class="hole_blog">
                <?php


                $max_show = 15;
                $page_key = 'page';
                $page_num = (int)$_GET[$page_key];
                $page_num = ($page_num < 1) ? 1 : $page_num;
                $arg = [
                    'posts_per_page' => -1,
                    'post_status' => 'publish',
                    'cat' => $cat_select
                ];
                $query = new WP_Query;
                $myposts = $query->query($arg);
                $coutn = count($myposts);
                $pages = ceil($coutn / $max_show);


                $arg = [
                    'posts_per_page' => $max_show,
                    'post_status' => 'publish',
                    'paged' => $page_num,
                    'cat' => $cat_select
                ]; 

                if(!empty($_GET['sort'])){
                    $arg['orderby']='meta_value_num';
                    $arg['order']='DESC';
                    $arg['meta_key']=$_GET['sort'];
                }
                $query = new WP_Query;
                $myposts = $query->query($arg);
                foreach ($myposts as $key => $post) {
                    show_post($post->ID);
                }
                ?>


            </div>

        </div>
        <?php
        dex_pagination(['max' => $pages, 'key' => $page_key]);
        ?>


    </div>
</div>
<?php get_footer(); ?>
