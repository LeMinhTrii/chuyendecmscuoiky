<?php

/**
 * Client Section
 * 
 * @package JobScout
 */

if (is_active_sidebar('client')) { ?>
	<script src="https://kit.fontawesome.com/cbeaa37f05.js" crossorigin="anonymous"></script>
	<section id="client-section" class="client-section">
		<div class="container">
			<?php dynamic_sidebar('client'); ?>
		</div>
	</section> <!-- .bg-cta-section -->
<?php
}
