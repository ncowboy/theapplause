<?php
/**
 * Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Blog
 */
if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Header');
    acf_add_options_page('Footer');

}
add_action('after_setup_theme', 'theme_register_nav_menu');
function theme_register_nav_menu()
{
    register_nav_menu('header', 'Top menu');

    register_nav_menu('footer_1', 'Footer 1');
    register_nav_menu('footer_2', 'Footer 2');
    register_nav_menu('footer_3', 'Footer 3');
}

add_theme_support('post-thumbnails');
function wph_add_all_elements($init)
{
    if (current_user_can('unfiltered_html')) {
        $init['extended_valid_elements'] = 'span[*]';
    }
    return $init;
}

add_filter('tiny_mce_before_init', 'wph_add_all_elements', 20);
include('blocks/item.php');
include('inc/ajax.php');
include('inc/lazyblocks.php');
function dex_pagination($option = ['max' => 10, 'key' => 'show'])
{
    $big = 999999999; // число для замены
    $custom = strtok(get_pagenum_link($big), '?');
    $links = paginate_links(array( // вывод пагинации с опциями ниже
        'base' => str_replace("page/{$big}/", '?' . $option['key'] . '=%#%', $custom), // что заменяем в формате ниже
        'current' => max(1, (int)$_GET[$option['key']]), // текущая страница, 1, если $_GET['page'] не определено
        'type' => 'array', // нам надо получить массив
        'prev_text' => '<span></span>Назад', // текст назад
        'next_text' => 'Вперед <span></span>', // текст вперед
        'total' => $option['max'], // общие кол-во страниц в пагинации
        'show_all' => false, // не показывать ссылки на все страницы, иначе end_size и mid_size будут проигнорированны
        'end_size' => 2, //  сколько страниц показать в начале и конце списка (12 ... 4 ... 89)
        'mid_size' => 2, // сколько страниц показать вокруг текущей страницы (... 123 5 678 ...).
        'add_args' => false, // массив GET параметров для добавления в ссылку страницы
        'add_fragment' => '',    // строка для добавления в конец ссылки на страницу
        'before_page_number' => '', // строка перед цифрой
        'after_page_number' => '' // строка после цифры
    ));

    if ($_GET[$option['key']] !== 'all') {
        if (is_array($links)) { // если пагинация есть
            echo ' <div class="pagination"> <ul>';
            foreach ($links as $link) {
                if (strpos($link, 'current') !== false) echo "<li class='is-active'><a href=>$link</a></li>"; // если это активная страница
                else echo "<li>$link</li>";
            }
            echo '</ul></div>';
            //    $full = str_replace("page/{$big}/", '?' . $option['key'] . '=all', $custom);
            //  echo '<a class="pagination__all-link" href="' . $full . '">показать все</a>';
        }
    }
}

function type_com($num, $mong = [
    'комментариев',
    'комментарий',
    'комментария'
])
{
    if ($num > 10) {
        $int = (int)($num / 10);
        $num = $num - $int * 10;
    }
    if ($num === 1) return $mong[1];
    if ($num > 1 && $num < 5) return $mong[2];
    return $mong[0];

}
 


    add_action('init', 'action_post');
    function action_post(){




      $articleUrl=get_permalink($post_ID);

      $YourPublicAPIKey=get_option('disqus_public_key');
      $shortname=get_option('disqus_forum_url');
      $json = json_decode(file_get_contents("https://disqus.com/api/3.0/forums/listThreads.json?forum=".$shortname."&api_key=".$YourPublicAPIKey),true);

      $array = $json['response'];




      $arg = [
        'posts_per_page' => -1,
        'post_status' => 'publish',
        'post_type' => 'post',

    ];
    $query = new WP_Query;
    $myposts = $query->query($arg);
    foreach ($myposts as $key => $post) {
      $post_id=$post->ID;
      $articleUrl=get_permalink( $post_id);
      $key = array_search($articleUrl, array_column($array, 'link'));
 

      add_post_meta( $post_id, 'comments', $array[ $key] ['posts'], true ) or update_post_meta( $post_id, 'comments', $array[ $key] ['posts'] );

      $spread= get_post_meta($post_id,'spread',true);
      $spread=(int)((empty($spread))?0:$spread);
      add_post_meta( $post_id, 'spread', $spread, true ) or update_post_meta( $post_id, 'spread',$spread );
  }





}
function share_butthon(){
    ?>
<div id="share"> 
    <div class="social" data-url="<?php the_permalink( );?>"data-title="<?php the_title(); ?>">
        <a class="push facebook" data-id="fb"><i class="fab fa-facebook-f"></i></a>
        <a class="push twitter" data-id="tw"><i class="fab fa-twitter"></i></a>
        <a class="push vkontakte" data-id="vk"><i class="fab fa-vk"></i></a>
        <a class="push odnoklassniki" data-id="ok"><i class="fab fa-odnoklassniki"></i></a>
    </div>
</div>
<form id='share_form'  class="ajax hidden">
    <input type="hidden" name="post_id" value="<?=get_the_ID()?>">
    <? form_function('share_action')?>
</form>
    <?
}

add_filter( 'img_caption_shortcode_width', '__return_false' );