<?php
global $wdwt_front;
get_header();
?>
<div class="right_container">
	<div class="container">
    <?php if ( is_active_sidebar( 'sidebar-1' ) && !is_home() ) { ?>
		<aside id="sidebar1" >
			<div class="sidebar-container">			
				<?php  dynamic_sidebar( 'sidebar-1' ); 	?>
				<div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
							
			<?php
			if( 'posts' == get_option( 'show_on_front' ) ){
				
				?>
				<script>
				var sauron_one_page = true;
				</script>
			<div id="content_front_page">	
				<div class="main" id="portfolio_posts"> <?php sauron_frontend_functions::portfolio_posts(); ?></div>
    	  <div id="image_list_top0" class="image_list_top portfolio_list "><?php sauron_frontend_functions::home_featured_post(); ?></div>
      	<div id="image_list_top1" class="image_list_top portfolio_list "><?php sauron_frontend_functions::blog_posts_section(); ?></div>
				<div id="image_list_top2" class="image_list_top portfolio_list "><?php sauron_frontend_functions::gallery_posts_section(); ?></div>
				<div id="image_list_top3" class="image_list_top portfolio_list "><?php sauron_frontend_functions::review_posts_section(); ?></div>
				<div id="image_list_top5" class="image_list_top portfolio_list "><?php sauron_frontend_functions::pinned_posts_section(); ?></div>
				<div id="image_list_top6" class="image_list_top portfolio_list "><?php sauron_frontend_functions::social_icons_section(); ?></div>
			<?php
    wp_reset_query(); ?>
    	<div class="clear"></div>
		</div>
    <?php	
			}

			elseif('page' == get_option( 'show_on_front' )){

				?>
				
					<div id="content">
					<?php sauron_frontend_functions::content_for_home(); ?>
					</div>

				<?php		                     
			}
		
	if ( is_active_sidebar( 'sidebar-2' ) && !is_home() ) { ?>
		<aside id="sidebar2">
			<div class="sidebar-container">
			  <?php  dynamic_sidebar( 'sidebar-2' ); 	?>
			  <div class="clear"></div>
			</div>
		</aside>
	<?php } ?>
	</div>
</div>	
<?php get_footer(); ?>
