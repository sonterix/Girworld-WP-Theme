<?php

// add css and js
add_action('wp_enqueue_scripts', 'girlworld_style_scripts');
// add action for theme settings
add_action('after_setup_theme', 'girlworld_setup');

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
	   $pageNum=(get_query_var('paged')) ? get_query_var('paged') : 1;
	   if($pageNum>1)
	      echo '<li><a href="'.site_url().'"><i class="fas fa-home">Home</a></li> <li> / </li><li> '.$pageNum.'- page</li>';
	   else
	      echo '<li><i class="fas fa-home"></i>Home</li>';
	}
}


