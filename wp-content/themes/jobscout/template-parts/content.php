<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JobScout
 */
?> 
    <div class="blog_custom_item">
            <?php 
                /**
                 * @hooked jobscout_post_thumbnail - 10
                */
                do_action( 'jobscout_before_post_entry_content' );
        
                echo '<div class="content-wrap">';
                /**
                 * @hooked jobscout_entry_header  - 10 
                 * @hooked jobscout_entry_content - 15
                 * @hooked jobscout_entry_footer  - 20
                */
                do_action( 'jobscout_post_entry_content' );
                
                echo '</div>';
            ?>
    </div>