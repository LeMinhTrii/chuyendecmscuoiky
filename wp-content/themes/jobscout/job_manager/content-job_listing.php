<?php

/**
 * Job listing in the loop.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/content-job_listing.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @since       1.0.0
 * @version     1.27.0
 */

if (!defined('ABSPATH')) {
	exit; // Exit if accessed directly.
}

global $post;
$job_salary   = get_post_meta(get_the_ID(), '_job_salary', true);
$job_featured = get_post_meta(get_the_ID(), '_featured', true);
$company_name = get_post_meta(get_the_ID(), '_company_name', true);
$tagline_name = get_post_meta(get_the_ID(), '_company_tagline', true);
$post_date = get_the_date();
?>
<article <?php job_listing_class(); ?> data-longitude="<?php echo esc_attr($post->geolocation_lat); ?>" data-latitude="<?php echo esc_attr($post->geolocation_long); ?>">

	<figure class="company-logo dat">
		<?php the_company_logo('thumbnail'); ?>
	</figure>

	<div class="job-title-wrap">

		<h2 class="entry-title dat-tile">
			<a href="<?php the_job_permalink(); ?>"><?php wpjm_the_job_title(); ?></a>
		</h2>

		<div class="created">
			
			<p>Created <?php echo esc_html(date('M j. Y', strtotime($post_date))); ?></p>
		</div>

		<div class="entry-meta row">
			<?php
			if (get_option('job_manager_enable_types')) {
				$types = wpjm_get_the_job_types();
				if (!empty($types)) : foreach ($types as $jobtype) : ?>
						<li class="job-type <?php echo esc_attr(sanitize_title($jobtype->slug)); ?> job col-md-3"><?php echo esc_html($jobtype->name); ?></li>
			<?php endforeach;
				endif;
			}
			do_action('job_listing_meta_end');
			?>
			<?php if ($company_name) { ?>
				<div class="company-name col-md-4">
					<span>
						<?php the_company_name(); ?>
					</span>
				</div>
			<?php } ?>
			<div class="company-address col-md-5">
				<?php the_job_location(true); ?>
			</div>
		</div>
	</div>
	<div class="important">
		<?php do_action('single_job_listing_meta_end'); ?>
		<?php if ($tagline_name) { ?>
			<li><?php the_company_tagline(); ?></li>
				
		<?php } ?>
	</div>

	<?php if ($job_featured) { ?>
		<div class="featured-label"><?php esc_html_e('Featured', 'jobscout'); ?></div>
	<?php } ?>

</article>