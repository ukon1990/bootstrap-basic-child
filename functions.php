<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */


/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
	/**
	 * Setup theme and register support wp features.
	 */
	function bootstrapBasicSetup() 
	{
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * 
		 * copy from underscores theme
		 */
		load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

		// add theme support post and comment automatic feed links
		add_theme_support('automatic-feed-links');

		// enable support for post thumbnail or feature image on posts and pages
		add_theme_support('post-thumbnails');

		// add support menu
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'bootstrap-basic'),
		));

		// add post formats support
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// add support custom background
		add_theme_support(
			'custom-background', 
			apply_filters(
				'bootstrap_basic_custom_background_args', 
				array(
					'default-color' => 'ffffff', 
					'default-image' => ''
				)
			)
		);
	}// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');


if (!function_exists('bootstrapBasicWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function bootstrapBasicWidgetsInit() 
	{
		register_sidebar(array(
			'name'          => __('Header right', 'bootstrap-basic'),
			'id'            => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Navigation bar right', 'bootstrap-basic'),
			'id'            => 'navbar-right',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Sidebar left', 'bootstrap-basic'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'bootstrap-basic'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Footer left', 'bootstrap-basic'),
			'id'            => 'footer-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));

		register_sidebar(array(
			'name'          => __('Footer right', 'bootstrap-basic'),
			'id'            => 'footer-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h1 class="widget-title">',
			'after_title'   => '</h1>',
		));
	}// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


if (!function_exists('bootstrapBasicEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles
	 */
	function bootstrapBasicEnqueueScripts()
	{
		wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.min.css');
		wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
		wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');
		wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

		wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
		wp_enqueue_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
		wp_enqueue_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');
		wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
		wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	}// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_stylesheet_directory() . '/inc/WalkerHjelle.php'; //get_locale_stylesheet_uri() get_template_directory()


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**'
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';

function breadcrumbs(){
    /* === OPTIONS === */
    $text['home']     = 'Hjem'; // text for the 'Home' link
    $text['category'] = '%s'; // text for a category page - Innhold etter kategorien
    $text['tax'] 	  = 'Archive for "%s"'; // text for a taxonomy page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Innhold merket med "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ' &raquo; '; // delimiter between crumbs
    $before      = '<span class="current">'; // tag before the current crumb
    $after       = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $homeLink = get_bloginfo('url') . '/';
    $linkBefore = '<span typeof="v:Breadcrumb">';
    $linkAfter = '</span>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

    } else {

        echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;


        if ( is_category() ) {
            //Logic for replacing category link with page link if page with same name exists
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                //Getting the top parent ID
                $parents = get_category_parents(get_query_var('cat'));
                $arrayen = explode('/', $parents);
                $cata = get_cat_ID($arrayen[0]);

                //Getting url's and all that jazz
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                //Getting the parent url and replaing it with something else
                if(term_exists(get_page_by_title(get_cat_name(get_cat_name($cata)))) == false)
                {
                    $old_url = '"'.get_category_link(get_cat_top_parent(get_query_var('cat'))).'"';
                    $new_url = '"'.get_page_link(get_page_by_title(get_cat_name($cata))).'"';
                    $cats = str_replace($old_url, $new_url, $cats);

                    $categories = get_terms(
                        'category',
                        array('children' => 0)
                    );
                    //Looping through all categories
                    foreach($categories as $c){
                        $level = intval(2); // The level we want to check for
                        $last_level = 0;
                        $category=get_category(get_cat_ID($c->{'name'}));
                        for ( $counter = 1; $counter <= $level; $counter += 1) {
                            if ($category->category_parent) {
                                $category=get_category($category->category_parent);
                                $last_level = $counter;
                            }
                        }
                        $last_level +=1;
                        if ($last_level == $level) {
                            $old_val = '<span typeof="v:Breadcrumb"><a rel="v:url" property="v:title" href="'.get_category_link(get_cat_ID($c->{'name'})).'">'.$c->{'name'}.'</a></span> &raquo;';
                            $new_val = '';
                            $cats = str_replace($old_val, $new_val, $cats);
                        }
                    }

                }
                echo $cats;
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['tax'], single_cat_title('', false)) . $after;

        }elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;

        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div>';

    }
} // end breadcrumbs

//Sidebar stuff
function get_sidebar_two( $name = null ) {
    /**
     * Fires before the sidebar template file is loaded.
     *
     * The hook allows a specific sidebar template file to be used in place of the
     * default sidebar template file. If your file is called sidebar-new.php,
     * you would specify the filename in the hook as get_sidebar( 'new' ).
     *
     * @since 2.2.0
     * @since 2.8.0 $name parameter added.
     *
     * @param string $name Name of the specific sidebar file to use.
     */
    do_action( 'get_sidebar', $name );

    $templates = array();
    $name = (string) $name;
    if ( '' !== $name )
        $templates[] = "sidebar-{$name}.php";

    $templates[] = 'sidebar.php';

    // Backward compat code will be removed in a future release
    if ('' == locate_template($templates, true))
        load_template( ABSPATH . WPINC . '/theme-compat/sidebar.php');
}
function get_page_by_name($pagename)
{
    $pages = get_pages();
    foreach ($pages as $page) if ($page->post_name == $pagename) return $page;
    return false;
}

function category_has_parent($catid){
    $category = get_category($catid);
    if ($category->category_parent > 0){
        return true;
    }
    return false;
}

function get_cat_top_parent($child_id){
    //Getting a string list with parents
    $parents = get_category_parents($child_id);
    //Turning it into an array
    $arrayen = explode('/', $parents);
    //Getting the top parent of the category, and makes sure that it always shows all the categories and getting the top parent's ID.
    $cat = get_cat_ID($arrayen[0]);
    //Returning the name of the top parent category.
    return get_category($cat);
}

function get_cat_parent_lvltwo($child_id){
    //Getting a string list with parents
    $parents = get_category_parents($child_id);
    //Turning it into an array
    $arrayen = explode('/', $parents);
    //Getting the top parent of the category, and makes sure that it always shows all the categories and getting the top parent's ID.
    $cat = get_cat_ID($arrayen[1]);
    //Returning the name of the top parent category.
    return get_category($cat);
}

function replace_category_second_level($string){
    $categories = get_terms(
        'category',
        array('children' => 0)
    );
    foreach($categories as $c){
        $level = intval(2); // The level we want to check for
        $last_level = 0;
        $category=get_category(get_cat_ID($c->{'name'}));
        for ( $counter = 1; $counter <= $level; $counter += 1) {
            if ($category->category_parent) {
                $category=get_category($category->category_parent);
                $last_level = $counter;
            }
        }//<a rel="v:url" property="v:title" href="http://localhost/wordpress/index.php/category/kafeteria/meny/">Meny</a>
        $last_level +=1;
        if ($last_level == $level) {
            $old_val = '<a href="'.get_category_link(get_cat_ID($c->{'name'})).'" >'.$c->{'name'}.'</a>';
            $new_val = $c->{'name'};
            $string = str_replace($old_val, $new_val, $string);
        }
    }
    return $string;
}