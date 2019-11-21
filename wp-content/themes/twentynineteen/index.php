<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>
	
	<div class="content">

		<?php
			$args = array(
			    'post_type'=> 'books',
			    'order'    => 'ASC'
			    );              

			$the_query = new WP_Query( $args );

			// The Loop
			echo '<div class="slider multiple-items">';
			if ( $the_query->have_posts() ) {
				while ( $the_query->have_posts() ) {
			      $the_query->the_post();
			?>			
					<div>
						<?php if ( has_post_thumbnail() ) : ?>
						    <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						        <?php the_post_thumbnail(); ?>
						    </a>
						<?php endif; ?>
						<h5><?php the_title(); ?></h5>
					</div>			
			<?php
				  // Do Stuff
				} // end while
			} // endif
			echo '</div>';
			// Reset Post Data
			wp_reset_postdata();		
		?>

	</div>	

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
		if ( have_posts() ) {

			// Load posts loop.
			while ( have_posts() ) {
				the_post();
				get_template_part( 'template-parts/content/content' );
			}

			// Previous/next page navigation.
			twentynineteen_the_posts_navigation();

		} else {

			// If no content, include the "No posts found" template.
			get_template_part( 'template-parts/content/content', 'none' );

		}
		?>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php
get_footer();