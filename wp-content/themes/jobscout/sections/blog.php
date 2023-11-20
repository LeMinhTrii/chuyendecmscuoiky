<?php

/**
 * Blog Section
 * 
 * @package JobScout
 */

$blog_heading = get_theme_mod('blog_section_title', __('Newest Blog Entries', 'jobscout'));
$sub_title    = get_theme_mod('blog_section_subtitle', __('We will help you find it. We are your first step to becoming everything you want to be.', 'jobscout'));
$blog         = get_option('page_for_posts');
$label        = get_theme_mod('blog_view_all', __('See More Posts', 'jobscout'));
$hide_author  = get_theme_mod('ed_post_author', false);
$hide_date    = get_theme_mod('ed_post_date', false);
$ed_blog      = get_theme_mod('ed_blog', true);

$args = array(
    'post_type'           => 'post',
    'post_status'         => 'publish',
    'posts_per_page'      => 4,
    'ignore_sticky_posts' => true
);

$qry = new WP_Query($args);

if ($ed_blog && ($blog_heading || $sub_title || $qry->have_posts())) { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/build/style-editor-customizer.css" media="all">
    </head>

    <body>
        <?php if ($qry->have_posts()) { ?>
            <div class="bgr-blog">
                <div class="container-newest">
                    <?php
                    if ($blog_heading) echo '<h2 class="section-title">' . esc_html($blog_heading) . '</h2>';
                    ?>
                    <div class="totals-post">
                        <?php
                        while ($qry->have_posts()) {
                            $qry->the_post();
                        ?>

                            <div class="total-post">
                                <figure class="img-post">
                                    <div class="image-post">
                                        <a href="<?php the_permalink(); ?>" class="link-img">
                                            <?php
                                            if (has_post_thumbnail()) {
                                                the_post_thumbnail('jobscout-blog', array('itemprop' => 'image'));
                                            } else {
                                                jobscout_fallback_svg_image('jobscout-blog');
                                            }
                                            ?>
                                        </a>
                                    </div>
                                </figure>
                                <div class="content-post">
                                    <div class="content-post-child">
                                        <h4><?php the_title() ?></h4>
                                        <p>
                                            <?php
                                            $content = get_the_content();
                                            $word_limit = 25;
                                            $words = explode(' ', $content);
                                            if (count($words) > $word_limit) {
                                                $short_content = implode(' ', array_slice($words, 0, $word_limit));
                                                $short_content .= '...';
                                            } else {
                                                $short_content = $content;
                                            }
                                            echo $short_content;

                                            ?>
                                        </p>
                                        <p><a class="readmore" href="<?php the_permalink(); ?>">Read More</a> </p>
                                    </div>

                                </div>
                            </div>

                        <?php } ?>
                    </div>
                    <?php if ($blog && $label) { ?>
                        <div class="btn-wrap">
                            <a href="<?php the_permalink($blog); ?>" class="btn"><?php echo esc_html($label); ?></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </body>

    </html>
<?php
}
