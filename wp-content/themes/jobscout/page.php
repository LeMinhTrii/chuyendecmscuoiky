<?php

/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */
get_header();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main">

		<?php
		while (have_posts()) : the_post();
			if (is_page('about-us')) {
		?>
				<div id="banner-section" class="site-banner<?php if (has_header_video()) echo esc_attr(' video-banner'); ?>">
					<div class="item" style="height: 365px; object-fit: cover; overflow: hidden;">
						<?php the_custom_header_markup(); ?>
						<div class="banner-caption">
							<div class="container">
								<div class="caption-inner">
									<h2 class="title">SHARE "OMOTENSHI"<br> WITH THE WORLD</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="page_about-wrap">
					<!-- <div class="container"> -->
					<?php
					get_template_part('template-parts/content', 'page');
					?>
					<!-- </div> -->
				</div>
				<?php
			} else {
				if (is_page('contact')) {
				?>
					<div class="wrap_contact">
						<?php
						get_template_part('template-parts/content', 'contact');
						?>
					</div>
			<?php
				} else {
					get_template_part('template-parts/content', 'page');
				}
			}
			?>
			<section id="client-section" style="background: #ea751d;">
				<div class="container" style="padding:15px 0">
					<?php
					if (is_active_sidebar('client')) {
						// Output the 'client' sidebar
						dynamic_sidebar('client');
					}
					?>
				</div>
			</section>

		<?php

			/**
			 * Comment Template
			 * 
			 * @hooked jobscout_comment
			 */
			do_action('jobscout_after_page_content');

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_sidebar();
get_footer();
