<?php
/**
 * Template for displaying pages
 *
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?>
<?php
//Checking if there is a category that corresponds with the page name.
if(term_exists(get_cat_ID(get_the_title())) == true){
    //Adding left sidebar
    get_sidebar('left');
}
?>
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php
						while (have_posts()) {
							the_post();

							get_template_part('content', 'page');

							echo "\n\n";

							// If comments are open or we have at least one comment, load up the comment template
							/*if (comments_open() || '0' != get_comments_number()) {
								comments_template();
							}

							echo "\n\n";*/

						} //endwhile;
						?>
					</main>
				</div>
<?php get_sidebar('right'); ?>
<?php get_footer(); ?>