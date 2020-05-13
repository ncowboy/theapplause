<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">

    <base href="<?= get_template_directory_uri() ?>/">
    <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/favicon/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-touch-icon-114x114.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title><?php wp_title(); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <link rel="stylesheet" href="libs/animate/animate.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
    <meta name="yandex-verification" content="cdee5a7987ad9a4c"/>
    <meta name="google-site-verification" content="eAKSw6L-VJaSfz1Xq4OfM6yp2b0vdCXDdMPgpRwh_TE"/>
    <?php wp_head();
    $header = get_field('header', 'option');
    $footer = get_field('footer', 'option');
    ?>
    <script type="text/javascript">!function () {
            var t = document.createElement("script");
            t.type = "text/javascript", t.async = !0, t.src = "https://vk.com/js/api/openapi.js?160", t.onload = function () {
                VK.Retargeting.Init("VK-RTRG-359560-3jVrR"), VK.Retargeting.Hit()
            }, document.head.appendChild(t)
        }();</script>
    <noscript><img src="https://vk.com/rtrg?p=VK-RTRG-359560-3jVrR" style="position:fixed; left:-999px;" alt=""/>
    </noscript>
</head>

<body>

<div class="mobile_menu_hide">
    <div class="menu">
        <ul id="mob_menu"></ul>
        <i class="fas fa-times"></i>
        <div class="socials">
            <?php foreach ($footer['socials'] as $logo) { ?>
                <a target="_blank" href="<?= $logo['url'] ?>"><img src="<?= $logo['img_mob'] ?>" alt="socials"></a>
            <?php } ?>
        </div>
    </div>
</div>
<header>
    <style>
        @-webkit-keyframes pulse-boxshadow {
            0% {
                box-shadow: none;
            }
            50% {
                box-shadow: 1px 1px 10px 5px rgba(0, 0, 0, 0.5);
            }
            100% {
                box-shadow: none;
            }
        }

        @keyframes pulse-boxshadow {
            0% {
                box-shadow: none;
            }
            50% {
                box-shadow: 1px 1px 10px 5px rgba(0, 0, 0, 0.5);
            }
            100% {
                box-shadow: none;
            }
        }
    </style>

    <div class="container-fuluid grey">
        <div class="container">
            <div class="row">
                <div class="hole_header">
                    <div class="wrap_mobile">
                        <a href="/" class="logo"><?= $header['logo'] ?></a>
                        <div class="menu">

                            <?php
                            wp_nav_menu([
                                'theme_location' => 'header',
                                'container' => 'ul',
                                'items_wrap' => '<ul id="original_menu" class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            ]);
                            ?>
                        </div>
                        <div class="mobile_menu">
                            <div id="nav-icon1">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </div>
                    </div>
                    <div class="wrap_mobile v2_dex">

                        <a href="tel:<?= preg_replace('/\D+/', '', $header['phone']) ?>"
                           class="phone"><?= $header['phone'] ?></a>
                        <form class="search" action="/">
                            <input type="text" name="s" placeholder="Поиск по сайту">
                            <button class="loop"></button>
                        </form>
                        <div class="mob_butthon_search">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <form class="search mobile_form_search" action="/">
        <div class="input"><input type="text" name="s" placeholder="Поиск по сайту"></div>
        <button class="loop"></button>
    </form>

</header>
<main>