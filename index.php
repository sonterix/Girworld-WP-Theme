<? get_header(); ?>
<? get_template_part('template-parts/breadcrumbs') ?>

<section id="sec-1">
    <div class="title wow fadeInDown">
        <h1>recent</h1>
        <p>ipsum</p>
    </div>
    <div id="gallery-1">
        <div class="picture wow fadeIn" id="pic-1" data-wow-delay="0.1s">
            <p>01/11</p>
        </div>
        <div class="picture wow fadeIn" id="pic-2" data-wow-delay="0.3s">
            <p>29/10</p>
        </div>
        <div class="picture wow fadeIn" id="pic-3" data-wow-delay="0.5s">
            <p>27/10</p>
        </div>
        <div class="picture wow fadeIn" id="pic-4" data-wow-delay="0.7s">
            <p>18/10</p>
        </div>
        <div class="picture wow fadeIn" id="pic-5" data-wow-delay="0.9s">
            <p>13/10</p>
        </div>
        <div class="picture wow fadeIn" id="pic-6" data-wow-delay="1.1s">
            <p>10/10</p>
        </div>
    </div>
</section>

<section id="sec-2">
    <div class="title"></div>
    <div id="gallery-2">
        <div class="wow fadeInUp" id="pic-7" >
            <h1>fashion</h1>
            <p>ipsum</p>
        </div>
        <div class="picture wow fadeIn" id="pic-8" data-wow-delay="0.3s">
            <p>02/10</p>
        </div>
        <div class="picture wow fadeIn" id="pic-9" data-wow-delay="0.5s">
            <p>01/10</p>
        </div>
        <div class="picture wow fadeInDown" id="pic-10" data-wow-delay="0.7s">
            <span>Lorem ipsum dolor sit<br>amet consectetur adipisicing elit. Et debitis incidunt possimus quis soluta, dolore odit aspernatur itaque molestias</span>
        </div>
        <div class="picture wow fadeIn" id="pic-11" data-wow-delay="0.9s">
            <p>03/10</p>                
        </div>
        <div class="picture wow fadeIn" id="pic-12" data-wow-delay="1.1s">
            <p>04/10</p>                
        </div>
    </div>
</section>

<section id="sec-3">
    <? if(have_posts()) : while(have_posts()) : the_post(); ?>
        <div class="post wow fadeInDown">
            <div class="post-left">
                <? the_post_thumbnail() ?>
            </div>
            <div class="post-right">
                <h2>
                    <a href="<? the_permalink(); ?>" rel="bookmark" title="Permanent Link to <? the_title_attribute(); ?>">
                        <? the_title(); ?>
                    </a>
                </h2>
                <small>
                    <? the_time('F jS, Y'); ?> by <? the_author_posts_link(); ?>
                </small>
                <div class="entry">
                    <? the_excerpt(); ?>
                </div>
                <hr>            
                <p class="postmetadata">
                    <? _e( 'Posted in' ); ?> <? the_category( ', ' ); ?>
                </p>
                <p class="tags">
                    <? the_tags(); ?>
                </p>
            </div>
        </div>
    <? endwhile; else : ?>
        <p><? esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <? endif; ?>
</section>

<? get_footer(); ?>