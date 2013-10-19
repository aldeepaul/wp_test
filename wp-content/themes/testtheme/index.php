<?php get_header(); ?>
<div class="container">	
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<div id="tertiary" class="sidebar-container" role="complementary">
			<div class="sidebar-inner">
				<div class="widget-area">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</div><!-- .widget-area -->
			</div><!-- .sidebar-inner -->
		</div><!-- #tertiary -->
	<?php endif; ?>
</div>
<?php get_footer(); ?>