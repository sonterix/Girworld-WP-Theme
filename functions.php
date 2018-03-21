<?php

// add css and js
add_action('wp_enqueue_scripts', 'girlworld_style_scripts');
// add action for theme settings
add_action('after_setup_theme', 'girlworld_setup');
// add customizer settings
add_action('customize_register', 'girlworld_customize_register');

function girlworld_setup(){
    // texdomain
    load_theme_textdomain('girlworld');
    // add title
    add_theme_support('title-tag');
    // custom log
    add_theme_support('custom-logo');
    // add featured img
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(380, 380);
    // post formats
    add_theme_support('post-formats', [
        'aside',
        'image',
        'video',
        'gallery'
    ]);
    // includes support for html5 markup for a list of comments, comment form, search form, gallery, etc.
    add_theme_support( 'html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption'
    ]);
    // header menu
    register_nav_menu('menu', 'Header Menu');
}

function girlworld_style_scripts() {
    // css
	wp_enqueue_style( 'main-style', get_stylesheet_uri());
	wp_enqueue_style( 'animate-style', get_template_directory_uri() . '/css/animate.css');
	wp_enqueue_style( 'fontawesome-style', get_template_directory_uri() . '/fontawesome/css/fontawesome-all.min.css');
    // javascript
	wp_enqueue_script('jquery-script', get_template_directory_uri() . '/js/jquery.min.js');
	wp_enqueue_script('wow-script', get_template_directory_uri() . '/js/wow.min.js');
	wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
}

// customizer
function girlworld_customize_register($wp_customize) {
    $wp_customize->add_section('footer_section' , [
        'title' => __( 'Footer Settings', 'girlworld' ),
        'priority' => 30,
    ]);

    $wp_customize->add_setting('social_facebook', [
        'default' => __('https://www.facebook.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_twitter', [
        'default' => __('https://twitter.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_google_plus', [
        'default' => __('https://plus.google.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_linkedin', [
        'default' => __('https://www.linkedin.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_youtube', [
        'default' => __('https://www.youtube.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_twitch', [
        'default' => __('https://www.twitch.tv/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_snapchat', [
        'default' => __('https://www.snapchat.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('social_pinterest', [
        'default' => __('https://www.pinterest.com/'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_setting('footer_text_settings', [
        'default' => __('NICK <span>X</span> 2017', 'girlworld'),
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('facebook_url', [
        'label' => __( 'Facebook URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_facebook',
        'type' => 'text',
    ]);
    $wp_customize->add_control('twitter_url', [
        'label' => __( 'Twitter URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_twitter',
        'type' => 'text',
    ]);
    $wp_customize->add_control('google_plus_url', [
        'label' => __( 'Google+ URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_google_plus',
        'type' => 'text',
    ]);
    $wp_customize->add_control('linkedin_url', [
        'label' => __( 'Linkedin URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_linkedin',
        'type' => 'text',
    ]);
    $wp_customize->add_control('youtube_url', [
        'label' => __( 'Youtube URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_youtube',
        'type' => 'text',
    ]);
    $wp_customize->add_control('twitch_url', [
        'label' => __( 'Twitch URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_twitch',
        'type' => 'text',
    ]);
    $wp_customize->add_control('snapchat_url', [
        'label' => __( 'Snapchat URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_snapchat',
        'type' => 'text',
    ]);
    $wp_customize->add_control('pinterest_url', [
        'label' => __( 'Pinterest URL', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'social_pinterest',
        'type' => 'text',
    ]);
    $wp_customize->add_control('footer_text', [
        'label' => __( 'Footer text', 'girlworld' ),
        'section' => 'footer_section',
        'settings' => 'footer_text_settings',
        'type' => 'text',
    ]);
}

// breadcrumbs
function girlworld_the_breadcrumb(){
	global $post;
	if(!is_home()){ 
	   echo '<li><a href="'.site_url().'"><i class="fas fa-home"></i>Home</a></li> <li> / </li> ';
		if(is_single()){ // posts
		the_category(', ');
		echo " <li> / </li> ";
		echo '<li>';
			the_title();
		echo '</li>';
		}
		elseif (is_page()) { // pages
			if ($post->post_parent ) {
				$parent_id  = $post->post_parent;
				$breadcrumbs = array();
				while ($parent_id) {
					$page = get_page($parent_id);
					$breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
					$parent_id  = $page->post_parent;
				}
				$breadcrumbs = array_reverse($breadcrumbs);
				foreach ($breadcrumbs as $crumb) echo $crumb . '<li> / </li> ';
			}
			echo the_title();
		}
		elseif (is_category()) { // category
			global $wp_query;
			$obj_cat = $wp_query->get_queried_object();
			$current_cat = $obj_cat->term_id;
			$current_cat = get_category($current_cat);
			$parent_cat = get_category($current_cat->parent);
			if ($current_cat->parent != 0) 
				echo(get_category_parents($parent_cat, TRUE, ' <li> / </li> '));
			single_cat_title();
		}
		elseif (is_search()) { // search pages
			echo 'Search results "' . get_search_query() . '"';
		}
		elseif (is_tag()) { // tags
			echo single_tag_title('', false);
		}
		elseif (is_day()) { // archive (days)
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li> ';
			echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> <li> / </li> ';
			echo get_the_time('d');
		}
		elseif (is_month()) { // archive (months)
			echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> <li> / </li>';
			echo get_the_time('F');
		}
		elseif (is_year()) { // archive (years)
			echo get_the_time('Y');
		}
		elseif (is_author()) { // authors
			global $author;
			$userdata = get_userdata($author);
			echo '<li>Posted ' . $userdata->display_name . '</li>';
		} elseif (is_404()) { // if page not found
			echo '<li>Error 404</li>';
		}
	 
		if (get_query_var('paged')) // number of page
			echo ' (' . get_query_var('paged').'- page)';
	 
	} else { // home
	   $pageNum = (get_query_var('paged')) ? get_query_var('paged') : 1;
	   if($pageNum > 1)
	      echo '<li><a href="'.site_url().'"><i class="fas fa-home"></i>Home</a></li> <li> / </li><li> '.$pageNum.'- page</li>';
	   else
	      echo '<li><i class="fas fa-home"></i>Home</li>';
	}
}

// girlworld Pagination
function girlworld_pagination( $args = array() ) {
    
    $defaults = array(
        'range'           => 4,
        'custom_query'    => FALSE,
        'previous_string' => __( 'Previous', 'text-domain' ),
        'next_string'     => __( 'Next', 'text-domain' ),
        'before_output'   => '<div class="post-pagination"><ul class="pager">',
        'after_output'    => '</ul></div>'
    );
    
    $args = wp_parse_args( 
        $args, 
        apply_filters( 'girlworld_pagination_defaults', $defaults )
    );
    
    $args['range'] = (int) $args['range'] - 1;
    if ( !$args['custom_query'] )
        $args['custom_query'] = @$GLOBALS['wp_query'];
    $count = (int) $args['custom_query']->max_num_pages;
    $page  = intval( get_query_var( 'paged' ) );
    $ceil  = ceil( $args['range'] / 2 );
    
    if ( $count <= 1 )
        return FALSE;
    
    if ( !$page )
        $page = 1;
    
    if ( $count > $args['range'] ) {
        if ( $page <= $args['range'] ) {
            $min = 1;
            $max = $args['range'] + 1;
        } elseif ( $page >= ($count - $ceil) ) {
            $min = $count - $args['range'];
            $max = $count;
        } elseif ( $page >= $args['range'] && $page < ($count - $ceil) ) {
            $min = $page - $ceil;
            $max = $page + $ceil;
        }
    } else {
        $min = 1;
        $max = $count;
    }
    
    $echo = '';
    $previous = intval($page) - 1;
    $previous = esc_attr( get_pagenum_link($previous) );
    $firstpage = esc_attr( get_pagenum_link(1) );
    
    if ( $previous && (1 != $page) ){
        $echo .= '<li><a href="' . $previous . '" title="' . __( 'previous', 'text-domain') . '" style="letter-spacing: 3px;">' . $args['previous_string'] . '</a></li>';
    }
    if ( !empty($min) && !empty($max) ) {
        for( $i = $min; $i <= $max; $i++ ) {
            if ($page == $i) {
                $echo .= '<li class="active"><span class="active">' . str_pad( (int)$i, 1, '0', STR_PAD_LEFT ) . '</span></li>';
            } else {
                $echo .= sprintf( '<li><a href="%s">%2d</a></li>', esc_attr( get_pagenum_link($i) ), $i );
            }
        }
    }
    
    $next = intval($page) + 1;
    $next = esc_attr( get_pagenum_link($next) );
    if ($next && ($count != $page) ){
        $echo .= '<li><a href="' . $next . '" title="' . __( 'next', 'text-domain') . '" style="letter-spacing: 3px;">' . $args['next_string'] . '</a></li>';
    }
    
    $lastpage = esc_attr( get_pagenum_link($count) );

    if ( isset($echo) ){
        echo $args['before_output'] . $echo . $args['after_output'];
    }
}


