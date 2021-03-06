<?php
global $post_format;
?>

	<footer class="article__footer  push--bottom">
		<?php
		global $numpages;
		if ( $numpages > 1 ):
			?>
			<div class="entry__meta-box  meta-box--pagination">
				<?php
				$args = array(
					'before'           => '<ol class="nav  pagination--single">',
					'after'            => '</ol>',
					'next_or_number'   => 'next_and_number',
					'previouspagelink' => __( '&laquo;', 'rosa_txtd' ),
					'nextpagelink'     => __( '&raquo;', 'rosa_txtd' )
				);
				wp_link_pages( $args );
				?>
			</div>
		<?php
		endif;
		$categories = get_the_category();
		if ( ! is_wp_error( $categories ) && ! empty( $categories ) ): ?>
			<div class="meta--categories btn-list  meta-list">
				<span class="btn  btn--small  btn--secondary  list-head"><?php _e( 'Categories', 'rosa_txtd' ) ?></span>
				<?php
				foreach ( $categories as $category ) {
					echo '<a class="btn  btn--small  btn--tertiary" href="' . get_category_link( $category->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts in %s", 'rosa_txtd' ), $category->name ) ) . '" rel="tag">' . $category->name . '</a>';
				}; ?>
			</div>
		<?php endif;

		$tags = get_the_tags();
		if ( ! empty( $tags ) ): ?>
			<div class="meta--tags  btn-list  meta-list">
				<span class="btn  btn--small  btn--secondary  list-head"><?php _e( 'Tags', 'rosa_txtd' ) ?></span>
				<?php
				foreach ( $tags as $tag ) {
					echo '<a class="btn  btn--small  btn--tertiary" href="' . get_tag_link( $tag->term_id ) . '" title="' . esc_attr( sprintf( __( "View all posts tagged %s", 'rosa_txtd' ), $tag->name ) ) . '" rel="tag">' . $tag->name . '</a>';
				}; ?>
			</div>
		<?php endif; ?>

		<hr class="separator"/>


		<div class="grid">
			<div class="grid__item  lap-and-up-one-half">
				<?php
				if ( function_exists( 'display_pixlikes' ) ) {
					display_pixlikes();
				}
				?>
			</div><!--
            --><div class="grid__item  lap-and-up-one-half">
				<?php if ( wpgrade::option( 'blog_single_show_share_links' ) ): ?>
					<div class="addthis_toolbox addthis_default_style addthis_32x32_style  add_this_list"
						addthis:url="<?php echo wpgrade_get_current_canonical_url(); ?>"
						addthis:title="<?php wp_title( '|', true, 'right' ); ?>"
						addthis:description="<?php echo trim( strip_tags( get_the_excerpt() ) ) ?>">
						<?php get_template_part( 'templates/core/addthis-social-buttons' ); ?>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php if ( wpgrade::option( 'blog_single_show_author_box' ) ) {
			get_template_part( 'author-bio' );
		} ?>
	</footer><!-- .article__footer -->

<?php if ( function_exists( 'yarpp_related' ) ) {
	yarpp_related();
}