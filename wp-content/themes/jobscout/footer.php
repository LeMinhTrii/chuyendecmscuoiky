<!-- Hiển thị tên các trang trong phần footer -->
<?php
$job_title = get_theme_mod('job_posting_section_title', __('Plan•Do•See Global Inc.', 'jobscout')); ?>
<div class="wp-widget-group__inner-blocks custom">
    <?php echo '<h2 class="section-title">' . esc_html($job_title) . '</h2>'; ?>
    <ul class="wp-block-page-list">
        <?php
        // Danh sách các slug của trang bạn quan tâm
        $page_slugs = array('jobs', 'sample-page', 'blog', 'about-us', 'contact');

        foreach ($page_slugs as $slug) {
            $page = get_page_by_path($slug);

            if ($page) {
                $page_title = get_the_title($page->ID);
        ?>
                <li class="wp-block-pages-list__item">
                    <a class="wp-block-pages-list__item__link" href="<?php echo esc_url(get_permalink($page->ID)); ?>"><?php echo esc_html($page_title); ?></a>
                </li>
        <?php
            }
        }
        ?>
        <!-- Thêm các mục khác tùy thuộc vào số lượng trang bạn muốn hiển thị -->
    </ul>
    <div class="icon-social">
        <img src="http://localhost/chuyendecmscuoiky/wp-content/uploads/2023/11/facebook-1.png" alt="" class="icon">
        <img src="http://localhost/chuyendecmscuoiky/wp-content/uploads/2023/11/google-1.png" alt="" class="icon">
        <img src="http://localhost/chuyendecmscuoiky/wp-content/uploads/2023/11/line-1.png" alt="" class="icon">
        <img src="http://localhost/chuyendecmscuoiky/wp-content/uploads/2023/11/twitter-1.png" alt="" class="icon">
    </div>
</div>

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package JobScout
 */

/**
 * After Content
 * 
 * @hooked jobscout_content_end - 20
 */
do_action('jobscout_before_footer');

/**
 * Footer
 * 
 * @hooked jobscout_footer_start  - 20
 * @hooked jobscout_footer_top    - 30
 * @hooked jobscout_footer_bottom - 40
 * @hooked jobscout_footer_end    - 50
 */
do_action('jobscout_footer');

/**
 * After Footer
 * 
 * @hooked jobscout_page_end    - 20
 */
do_action('jobscout_after_footer');

wp_footer();
?>

<!-- Hiển thị tên các trang trong phần footer -->