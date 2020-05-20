<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog
 */
wp_footer();
$footer = get_field('footer', 'option');
?>
</main>
<footer>
    <div class="contaoiner-fluid">
        <div class="container">
            <div class="row">
                <div class="hole_footer">
                    <div class="f_block">
                        <a href="/" class="logo"><?= $footer['logo'] ?></a>
                    </div>
                    <div class="second_column">
                        <div class="f_block">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'footer_1',
                                'container' => 'ul',
                                'items_wrap' => '<ul   class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            ]);
                            ?>
                        </div>
                        <div class="f_block">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'footer_2',
                                'container' => 'ul',
                                'items_wrap' => '<ul   class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            ]);
                            ?>
                        </div>
                        <div class="f_block">
                            <?php
                            wp_nav_menu([
                                'theme_location' => 'footer_3',
                                'container' => 'ul',
                                'items_wrap' => '<ul   class="%2$s">%3$s</ul>',
                                'depth' => 0,
                            ]);
                            ?>
                            <div class="socials">
                                <?php foreach ($footer['socials'] as $logo) { ?>
                                    <a href="<?= $logo['url'] ?>"><img src="<?= $logo['img'] ?>" alt="socials"></a>
                                <?php } ?>
                            </div>
                            <div class="political">
                                <?= $footer['political'] ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="forma" style="display: none">
    <div class="form_block">
        <form class="ajax" onsubmit="yaCounter53233033.reachGoal('zayavka'); return true;">
            <input type="hidden" name="title" value="Давайте обсудим  вашу задачу ">
            <? form_function('form_block') ?>
            <h3 class="title">Давайте обсудим вашу задачу</h3>
            <span class="des">Мы свяжемся с вами в течение 15 минут для обсуждения вашего проекта</span>
            <input type="text" required name="name" placeholder="Введите ваше имя*">
            <input type="tel" required name="phone" placeholder="Введите ваш телефон*">
            <button class="btn">Обсудить задачу<span></span></button>
            <p class="pol">Нажимая на кнопку, вы даете согласие<br/>
                на обработку своих <a href="#">персональных данных</a></p>
        </form>
    </div>
</div>
<!-- Здесь пишем код -->

<div class="hidden"></div>

<div class="loader">
    <div class="loader_inner"></div>
</div>

<div id="to_up">
    <i class="fas fa-chevron-up"></i>
</div>
<!--[if lt IE 9]>
<script src="libs/html5shiv/es5-shim.min.js"></script>
<script src="libs/html5shiv/html5shiv.min.js"></script>
<script src="libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="libs/respond/respond.min.js"></script>
<![endif]-->

<script src="libs/modernizr/modernizr.js"></script>
<script src="libs/jquery/jquery-1.11.2.min.js"></script>
<script src="libs/waypoints/waypoints.min.js"></script>
<script src="libs/animate/animate-css.js"></script>

<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

<script src="js/jquery.maskedinput.min.js"></script>
<script src="js/common.js"></script>
<script src="js/share.js"></script>
<script src="inc/ajax.js"></script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (m, e, t, r, i, k, a) {
        m[i] = m[i] || function () {
            (m[i].a = m[i].a || []).push(arguments)
        };
        m[i].l = 1 * new Date();
        k = e.createElement(t), a = e.getElementsByTagName(t)[0], k.async = 1, k.src = r, a.parentNode.insertBefore(k, a)
    })
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(53233033, "init", {
        clickmap: true,
        trackLinks: true,
        accurateTrackBounce: true,
        webvisor: true
    });
</script>
<noscript>
    <div><img src="https://mc.yandex.ru/watch/53233033" style="position:absolute; left:-9999px;" alt=""/></div>
</noscript>
<!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-138655400-1"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());

    gtag('config', 'UA-138655400-1');
</script>
<!-- Facebook Pixel Code -->
<script>
    !function (f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function () {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2159922394043202');
    fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=2159922394043202&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
<!-- Rating@Mail.ru counter -->
<script type="text/javascript">
    var _tmr = window._tmr || (window._tmr = []);
    _tmr.push({id: "3118804", type: "pageView", start: (new Date()).getTime()});
    (function (d, w, id) {
        if (d.getElementById(id)) return;
        var ts = d.createElement("script");
        ts.type = "text/javascript";
        ts.async = true;
        ts.id = id;
        ts.src = "https://top-fwz1.mail.ru/js/code.js";
        var f = function () {
            var s = d.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(ts, s);
        };
        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else {
            f();
        }
    })(document, window, "topmailru-code");
</script>
<noscript>
    <div>
        <img src="https://top-fwz1.mail.ru/counter?id=3118804;js=na" style="border:0;position:absolute;left:-9999px;"
             alt="Top.Mail.Ru"/>
    </div>
</noscript>
<!-- //Rating@Mail.ru counter -->

</body>
</html>
