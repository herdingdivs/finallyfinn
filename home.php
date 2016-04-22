<?php
global $wdwt_front;
get_header();
?>
<div class="right_container">
	<div class="container">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) { ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
		<div id="content" class="blog">			
			   <?php sauron_frontend_functions::content_for_home();  ?>
		</div>		
	<?php if ( is_active_sidebar( 'sidebar-2' ) ) { ?>
		<aside id="sidebar2">
			<div class="sidebar-container">
			  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
			  <div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
	<div class="clear"></div>
	</div>
</div>  
<?php get_footer(); ?>