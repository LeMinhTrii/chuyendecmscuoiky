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
 * @package JobScout
 */

get_header(); ?>
<div id="primary" class="content-area set_w" style="margin-top: -50px;">
	<div id="banner-section" class="site-banner<?php if (has_header_video()) echo esc_attr(' video-banner'); ?>">
		<div class="item" style="height: 365px; object-fit: cover; overflow: hidden;">
			<?php the_custom_header_markup(); ?>
			<div class="banner-caption">
				<div class="container">
					<div class="caption-inner">
						<h2 class="title">PDS NEWS</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	/**
	 * Before Posts hook
	 */
	// do_action('jobscout_before_posts_content');
	?>

	<header class="page-header" style="text-align: center; margin: 50px 0	;">
		<div class="container">
			<h1 class="page-title">NEWEST BLOG ENTRIES</h1>
		</div><!-- .container -->
	</header>

	<main id="main" class="site-main">
		<div class="list_post row">

			<?php
			if (have_posts()) :

				/* Start the Loop */
				while (have_posts()) : the_post();

					/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
					get_template_part('template-parts/content', get_post_format());

				endwhile;

			else :

				get_template_part('template-parts/content', 'none');

			endif; ?>
		</div>
		<section id="client-section" style="background: #ea751d; margin:77px 0 90px">
			<div class="container" style="padding:15px 0">
				<?php
				if (is_active_sidebar('client')) {
					// Output the 'client' sidebar
					dynamic_sidebar('client');
				}
				?>
			</div>
		</section>

	</main><!-- #main -->

	<?php
	/**
	 * After Posts hook
	 * @hooked jobscout_navigation - 15
	 */
	do_action('jobscout_after_posts_content');
	?>

</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
