<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

	<p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'rosa_txtd' ), admin_url( 'post-new.php' ) ); ?></p>

<?php elseif ( is_search() ) : ?>

	<p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with different keywords.', 'rosa_txtd' ); ?></p>
	<div class="search-form">
		<?php get_search_form(); ?>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php else : ?>

	<p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'rosa_txtd' ); ?></p>
	<div class="search-form  search-form--404">
		<?php get_search_form(); ?>
	</div>
	<p>&nbsp;</p>
	<p>&nbsp;</p>
<?php endif; ?>