<footer id="footer">
    <div id="footer-logo">
        <div id="footer-social">
            <? if(get_theme_mod('social_facebook') == ''): ?>
                <a href="<?= get_theme_mod('social_facebook'); ?>"><i class="fab fa-facebook-square"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_twitter' == '')): ?>
                <a href="<?= get_theme_mod('social_twitter'); ?>"><i class="fab fa-twitter-square"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_google_plus' == '')): ?>
                <a href="<?= get_theme_mod('social_google_plus'); ?>"><i class="fab fa-google-plus-square"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_linkedin' == '')): ?>
                <a href="<?= get_theme_mod('social_linkedin'); ?>"><i class="fab fa-linkedin"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_youtube' == '')): ?>
                <a href="<?= get_theme_mod('social_youtube'); ?>"><i class="fab fa-youtube-square"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_twitch' == '')): ?>
                <a href="<?= get_theme_mod('social_twitch'); ?>"><i class="fab fa-twitch"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_snapchat' == '')): ?>
                <a href="<?= get_theme_mod('social_snapchat'); ?>"><i class="fab fa-snapchat-square"></i></a>
            <? endif; ?>
            <? if(get_theme_mod('social_pinterest' == '')): ?>
                <a href="<?= get_theme_mod('social_pinterest'); ?>"><i class="fab fa-pinterest-square"></i></a>
            <? endif; ?>
        </div>
        <div id="footer-text">
            <div class="footer-logo-img"><? the_custom_logo() ?></div>
            <hr>
            <p class="wow fadeInUp" ><?= get_theme_mod('footer_text_settings'); ?></p>
        </div>
    </div>        
</footer>

<? wp_footer() ?>
</body>
</html>