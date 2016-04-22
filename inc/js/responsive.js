/**
 *
 * sauron page configuration
 *
 */
WDWT_PG_page_settings = {
	/**
	 * page width: desktop, tablet or phone
	 */
	width : 'desktop',
	desktop_size : 1024,
	tablet_size : 768

}


/**
 *
 * resize thumbs in gallery according to sizes of their containers
 *
 */

var WDWT_PG_gallery={	
	
	image_parent_class : 'image_list_itema',
	standart_size:300,
	kaificent:310/370,
	enable_home:1,
		

	

	

	

};


/**
 *
 * object to rearrange page layout
 *
 */

var WDWT_PG_page_layout={	

	/*refreshes layout according to screen size*/

	refresh: function (){ 

		

		//################SCREEN
		if(jQuery('body').width()>WDWT_PG_page_settings.desktop_size){
			this.desktop();
		}
		//################TABLET
		if(jQuery('body').width()<=WDWT_PG_page_settings.desktop_size && jQuery('body').width()>=WDWT_PG_page_settings.tablet_size){
			this.tablet();
		}
		//################PHONE
		if(jQuery('body').width()<WDWT_PG_page_settings.tablet_size){
			this.phone(false);
		}
		
	}, 

	/*switch page layout to desktop mode*/
	desktop : function (){
		jQuery('body').removeClass('tablet');
		jQuery('body').removeClass('phone');
		jQuery('body').addClass('screen');

		jQuery('.container>#content').before(jQuery('.container>#sidebar1'));
		;

		if(WDWT_PG_page_settings.width	== 'tablet' || WDWT_PG_page_settings.width	== 'phone'){
				jQuery('#top-nav ul  li.addedli').remove();
				jQuery('.phone-menu-block').after(jQuery('#search-block'))
		}

		
		if(wdwt_fixed_menu=="1" && !jQuery('#header').hasClass('sticky_menu')){
			jQuery('#header').css('padding-top', 12);
		} 
		jQuery('#top-nav').show();
		
		wdwt_shorter_body();
		this.refresh_lavalamp();
		WDWT_PG_page_settings.width	= 'desktop';
	
	},
  /*switch page layout to tablet mode*/
	tablet : function (){
		jQuery('body').removeClass('phone');
		jQuery('body').removeClass('screen');
		jQuery('body').addClass('tablet');
		/*jQuery('#footer').append(jQuery('#footer-bottom'));*/ /*ttt!!! there is not #footer*/
		jQuery('.container').css({width:'97%'});
		jQuery('#content, #blog').after(jQuery('#sidebar1'));

		if(WDWT_PG_page_settings.width=='desktop' ){
			jQuery("#top-nav >  ul  li:has(> ul),#top-nav > div > ul  li:has(> ul)").each(function(){
				var strtext=jQuery(this).children("a").html();
				var strhref=jQuery(this).children("a").attr("href");
				var strlink='<a href="'+strhref+'">'+strtext+'</a>';
				jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');

			});
			jQuery('.phone-menu-block').before(jQuery('#search-block'));
		}
		
		if(wdwt_fixed_menu=="1" && !jQuery('#header').hasClass('sticky_menu')){
			jQuery('#header').css('padding-top', 12);
		}
		jQuery('#top-nav').show();
		WDWT_PG_page_settings.width	= 'tablet';
		jQuery('#footer').css('top', '');
		this.refresh_lavalamp();
		this.refresh_sidebar('.sidebar-container')
	
	},
	/*switch page layout to phone mode*/
	phone : function (full){
		jQuery('body').removeClass('tablet');
		jQuery('body').removeClass('screen');
		jQuery('body').addClass('phone');
		jQuery('.container').css({width:''});
		/*jQuery('#footer').append(jQuery('#footer-bottom'));*/ /*ttt!!! there is not #footer*/
		if(WDWT_PG_page_settings.width != 'phone'){
			jQuery('#blog, #content').after(jQuery('#sidebar1'));
		} 
		if(WDWT_PG_page_settings.width	== 'desktop'){
			jQuery("#top-nav >  ul  li:has(> ul),#top-nav > div > ul  li:has(> ul)").each(function(){
				var strtext=jQuery(this).children("a").html();
				var strhref=jQuery(this).children("a").attr("href");
				var strlink='<a href="'+strhref+'">'+strtext+'</a>';
				jQuery(this).children("ul").prepend('<li class="addedli">'+strlink+'</li>');
			});
			jQuery('.phone-menu-block').before(jQuery('#search-block'));
		
		}
		jQuery("#top-nav > div > ul  li.addedli,#top-nav > div.phone > div > ul  li.addedli").remove();
		jQuery("#header").find("#menu-button-block").remove();
		jQuery("#header .phone-menu-block").append('<div id="menu-button-block"><a href="#">Menu</a></div>');
		jQuery('#menu-button-block').after(jQuery('#top-nav'));
		
		
		if(wdwt_fixed_menu=="1" && !jQuery('#header').hasClass('sticky_menu')){
			jQuery('#header').css('padding-top', 12);
		}
		jQuery('#footer').css('top', '');
		this.refresh_lavalamp();
		this.refresh_sidebar('.sidebar-container');
		WDWT_PG_page_settings.width	= 'phone';
	},

   /*rearrange content of sidebar according to sidebar's width*/
	refresh_sidebar : function(sidebar){
		jQuery(sidebar).children('.clear:not(:last-child)').remove();
		var iner_elements=jQuery(sidebar).children();
		var main_width=jQuery(sidebar).width();
		var summary_width=0;
		for(i=0;i<iner_elements.length;i++){
			summary_width += jQuery(iner_elements[i]).outerWidth();
			if(summary_width >= main_width){
				jQuery(iner_elements[i]).before('<div class="clear"></div>')
				summary_width=jQuery(iner_elements[i]).outerWidth();
			}
		}
	},
	refresh_lavalamp : function(){
		if(!wdwt_is_ios()){
			jQuery( ".lavalamp-object" ).remove();
			jQuery('#top-nav-list,.top-nav-list >ul').lavalamp({
				easing: 'easeOutBack',
				activeObj:   '.current_page_item, .current-menu-item, .current-menu-parent, .current_page_parent', 
			});	
		}
		
	}
	,

  handle_new_elements : function(arrayOfNewElems){
	jQuery(arrayOfNewElems).css('opacity','0');
			jQuery(arrayOfNewElems).animate({ opacity: 1 },800);
			this.refresh();
			jQuery('.da-thumbs > div').hoverdir();
			jQuery('.do_nathing').click(function(){
				return false;
			});


			
			
	}

}
jQuery('document').ready(function(){
	jQuery('.do_nathing').click(function(){
		return false;
	});
//var previus_view=document.getElementById('top_posts_web').innerHTML;
	
	WDWT_PG_page_settings.width	= 'desktop';	
	
	if(jQuery("body").hasClass("phone")){
		WDWT_PG_page_layout.phone();		
	}
	else if(jQuery("body").hasClass("tablet")){
		WDWT_PG_page_layout.tablet();
	}
	else{
		WDWT_PG_page_layout.refresh();
	}
	
			
});

//alert(jQuery(".container").width())
if(jQuery(window).width() < jQuery(".container").width())
jQuery('body').addClass('resize');

jQuery(window).resize(function(){
		WDWT_PG_page_layout.refresh();
		jQuery('body').addClass('resize');
});