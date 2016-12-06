<?php

// Output Skip Links.
add_action('theme_after_body_tag_start', 'mmj_output_skip_links' );
function mmj_output_skip_links() {
	if ( empty( get_option( 'disable_tab' ) ) ) {
	?>
		<section>
		  <h2 class="screen-reader-text">Skip links</h2>
		  <ul class="mmj-skip-link">
		    <li><a href="#mk-header-1" class="screen-reader-shortcut"> Skip to primary navigation</a></li>
		    <li><a href="#theme-page" class="screen-reader-shortcut"> Skip to content</a></li>
		    <li><a href="#mk-footer" class="screen-reader-shortcut"> Skip to footer</a></li>
		  </ul>
		</section>
	<?php
	}
}
