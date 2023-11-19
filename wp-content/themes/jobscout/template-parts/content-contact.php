
<?php
/**
 * CTA Section
 * 
 * @package JobScout
 */
if( is_active_sidebar( 'cta2' ) ){ ?>
	<section id="cta-section" class="bg-cta-section">
	    <?php dynamic_sidebar( 'cta2' ); ?>
	</section> <!-- .bg-cta-section -->
<?php
}
if( is_active_sidebar( 'cta3' ) ){ ?>
<div class="content-contact">
<section id="cta-section" class="bg-cta-section">
	    <?php dynamic_sidebar( 'cta3' ); ?>
	</section> <!-- .bg-cta-section -->
</div>
<?php
}