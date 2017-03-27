<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package business
 */

get_header('custom'); ?>

	<div id="primary" class="content-area blog-page">
		<main id="main" class="site-main container" role="main">
			<h2 class="title"><?php echo get_theme_mod('blog_title'); ?></h2>
			<p class="subtitle"><?php echo get_theme_mod('blog_subtitle'); ?></p>

		<?php
		while ( have_posts() ) : the_post(); ?>

			<div class="blog-item d-flex">
				<div class="avatar-author"><?php echo get_avatar('', '', '', '', array('class'=>'img-fluid'));?></div>
				<div>
					<h3><?php the_title(); ?></h3>
					<p>Posted dy: <?php the_author(); ?>, <?php the_date(); ?></p>
					<?php the_post_thumbnail('full',array('class'=>'img-fluid margin-bottom')); ?>
					<article><?php the_excerpt(); ?></article>
					<article><?php the_content(); ?></article>
					<div class="info-author d-flex">
						<div class="ava-author"><?php echo get_avatar('', '', '', '', array('class'=>'img-fluid'));?></div>
						<div class="info-author-title">
							<h4><?php the_author(); ?></h4>
							<p><?php  echo get_the_author_meta( 'description'); ?></p>
						</div>
					</div>
				</div>
			</div>

			<?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
