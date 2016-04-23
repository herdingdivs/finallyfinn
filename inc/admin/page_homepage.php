<?php


class WDWT_homepage_page_class{
	

	public $options;
	
	function __construct(){
		
		$this->options = array(
		/* ------ content posts ------ */
			"content_posts_enable" => array( 
				"name" => "content_posts_enable",
				"title" => __("Show Portfolio Posts", "sauron"), 
				'type' => 'checkbox_open',  
				"description" => "",
				'show' => array('content_post_categories', 'content_post_count'),
				'hide' => array(),
				'section' => 'portfolio_posts', 
        'tab' => 'homepage', 
        'default' => true,
        'customizer'=>array()
			),
			'content_post_count' => array( 
				"name" => "content_post_count", 
				"title" => "",
				'type' => 'number', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Portfolio posts count","sauron"),
				'default' => '6',
	      'step' => '1',
	      'min' => '1',
	      'max' => '99',
				'section' => 'portfolio_posts', 
				'tab' => 'homepage', 
				'customizer'=>array()
			),
			"content_post_categories" => array(
				"name" => "content_post_categories",
				"title" => "",
				'type' => 'select',
				'multiple' => "true",
				"valid_options" => $this->get_categories(),
				"description" => __("Filter only these categories.", "sauron"),
				'section' => 'portfolio_posts',
				'tab' => 'homepage',
				'default' => '',
				'customizer'=>array()
			),
			"content_post_size_ratio" => array(
				"name" => "content_post_size_ratio",
				"title" => "",
				'type' => 'number', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Thumbs size ratio. Height over width. Write number between 0.5 and 2.","sauron"),
				'default' => '0.75',
	      'step' => '0.01',
	      'min' => '0.5',
	      'max' => '2.0',
				'section' => 'portfolio_posts', 
				'tab' => 'homepage', 
				'customizer'=>array()
			),
			"content_post_margin" => array(
				"name" => "content_post_margin",
				"title" => "",
				'type' => 'number', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Margin of thumbs in Portfolio section.","sauron"),
				'default' => '10',
				'unit_symbol' => 'px',
				'step' => '1',
	      'min' => '0',
	      'max' => '200',
				'section' => 'portfolio_posts', 
				'tab' => 'homepage', 
				'customizer'=>array()
			),

			/* ------ featured post ------  */
			"home_middle_description_post_enable" => array(
				"name" => "home_middle_description_post_enable",
				"title" => __( "Show featured post" ,"sauron" ),
				'type' => 'checkbox_open',
				"description" => '',
				'show' => array("home_middle_description_post"),
				'hide' => array(),
				'section' => 'featured_post', 
        'tab' => 'homepage', 
        'default' => true,
        'customizer'=>array()
			),
			"home_middle_description_post" => array(
				"name" => "home_middle_description_post",
				"title" => "", 
				'type' => 'select',
				"valid_options" => $this->get_posts(),
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Select the single post", "sauron" ),
				'section' => 'featured_post', 
        'tab' => 'homepage', 
        'default' => array(''),
        'customizer' => array()
			),
		/* ------ blog posts ------  */
		'blog_posts_enable' => array(
				"name" => "blog_posts_enable", 
				"title" =>__( "Show blog posts" ,"sauron" ),
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('title'=>'blog_posts_title', 'description' => 'blog_posts_description', 'category' => 'blog_posts_categories'),
				'hide' => array(),
				'section' => 'blog_posts',
				'tab' => 'homepage', 
				'default' => true,
				'customizer'=>array()
			),
			'blog_posts_title' => array( 
				"name" => "blog_posts_title", 
				"title" => "",
				'type' => 'text', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Blog posts section title","sauron"),
				'section' => 'blog_posts', 
				'tab' => 'homepage', 
				'default' => 'Blog title',
				'customizer'=>array()
			),
			'blog_posts_description' => array( 
				"name" => "blog_posts_description", 
				"title" => "",
				'type' => 'textarea', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Blog posts section title","sauron"),
				'section' => 'blog_posts', 
				'tab' => 'homepage', 
				'default' => 'Awesome blog description',
				'customizer'=>array()
			),
			"blog_posts_categories" => array(
				"name" => "blog_posts_categories",
				"title" => "",
				'type' => 'select',
				'multiple' => "true",
				"valid_options" => $this->get_categories(),
				"description" => __("Filter only these categories.", "sauron"),
				'section' => 'blog_posts',
				'tab' => 'homepage',
				'default' => '',
				'customizer'=>array()
			),
			/* ------ gallery posts ------ */
			'gallery_posts_enable' => array(
				"name" => "gallery_posts_enable", 
				"title" => __("Show Gallery Posts", "sauron"), 
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('title'=>'gallery_posts_title', 'description' => 'gallery_posts_description', 'category' => 'gallery_posts_categories'),
				'hide' => array(),
				'section' => 'gallery_posts',
				'tab' => 'homepage', 
				'default' => true,
				'customizer'=>array()
			),
			'gallery_posts_title' => array( 
				"name" => "gallery_posts_title", 
				"title" => "",
				'type' => 'text', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Gallery posts section title","sauron"),
				'section' => 'gallery_posts', 
				'tab' => 'homepage', 
				'default' => 'Gallery posts',
				'customizer'=>array()
			),
			'gallery_posts_description' => array( 
				"name" => "gallery_posts_description", 
				"title" => "",
				'type' => 'textarea', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Gallery posts section description","sauron"),
				'section' => 'gallery_posts', 
				'tab' => 'homepage', 
				'default' => '5 default color themes come with Business Sauron. They can be customized with the desired background colors and images, letting you to have a unique color scheme and design on your business website.',
				'customizer'=>array()
			),
			'gallery_posts_count' => array( 
				"name" => "gallery_posts_count", 
				"title" => "",
				'type' => 'number', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Gallery posts count","sauron"),
				'default' => '3',
				'step' => '1',
	      'min' => '1',
	      'max' => '99',
				'section' => 'gallery_posts', 
				'tab' => 'homepage', 
				'customizer'=>array()
			),
			"gallery_posts_categories" => array(
				"name" => "gallery_posts_categories",
				"title" => "",
				'type' => 'select',
				'multiple' => "true",
				"valid_options" => $this->get_categories(),
				"description" => __("Filter only these categories.", "sauron"),
				'section' => 'gallery_posts',
				'tab' => 'homepage',
				'default' => '',
				'customizer'=>array()
			),
			/* ------ review posts ------ */
			'review_posts_enable' => array(
				"name" => "review_posts_enable", 
				"title" => __("Show Review Posts", "sauron"), 
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('title'=>'review_posts_title', 'description' => 'review_posts_description', 'category' => 'review_posts_categories'),
				'hide' => array(),
				'section' => 'review_posts',
				'tab' => 'homepage', 
				'default' => true,
				'customizer'=>array()
			),
			'review_posts_title' => array( 
				"name" => "review_posts_title", 
				"title" => "",
				'type' => 'text', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Review posts section title","sauron"),
				'section' => 'review_posts', 
				'tab' => 'homepage', 
				'default' => 'Review posts',
				'customizer'=>array()
			),
			'review_posts_description' => array( 
				"name" => "review_posts_description", 
				"title" => "",
				'type' => 'textarea', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => __("Review posts section description.","sauron"),
				'section' => 'review_posts', 
				'tab' => 'homepage', 
				'default' => '',
				'customizer'=>array()
			),
			"review_posts_categories" => array(
				"name" => "review_posts_categories",
				"title" => "",
				'type' => 'select',
				'multiple' => "true",
				"valid_options" => $this->get_categories(),
				"description" => __("Filter only these categories.", "sauron"),
				'section' => 'review_posts',
				'tab' => 'homepage',
				'default' => '',
				'customizer'=>array()
			),
			
		/* ------ pinned post ------ */
			'pinned_post_enable' => array(
				"name" => "pinned_post_enable", 
				"title" => __("Show Pinned Post", "sauron"), 
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('bg_image'=>'pinned_bg_img', 'post' => 'pinned_posts'),
				'hide' => array(),
				'section' => 'pinned_post', 
				'tab' => 'homepage', 
				'default' => true,
				'customizer' => array()
			),
			'pinned_bg_img' => array(
				'name' => 'pinned_bg_img', 
				'title' => "",
				'type' => 'upload_single', 
				"sanitize_type" => "sanitize_text_field", 
				'valid_options' => '',
				'description' => __("Pinned Background Image. Upload custom image, select from media library or leave empty.", "sauron"), 
				'section' => 'pinned_post', 
				'tab' => 'homepage', 
				'default' => get_template_directory_uri()."/images/newsletter_bg.jpg",
				'customizer' => array()				
			),
			"pinned_posts" => array(
				"name" => "pinned_posts",
				"title" =>  "",
				'type' => 'select',
				"valid_options" => $this->get_posts(),
				"sanitize_type" => "sanitize_text_field",
				"description" => __("Select single post", "sauron"),
				'section' => 'pinned_post', 
				'tab' => 'homepage', 
				'default' => array(''),
				'customizer' => array()
			),
			
			'follow_title' => array( 
				"name" => "follow_title", 
				"title" => __("Follow us section title","sauron"),
				'type' => 'text', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => "",
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => 'Follow us',
				'customizer'=>array()
			),
			'follow_description' => array( 
				"name" => "follow_description", 
				"title" => __("Follow us section description","sauron"), 
				'type' => 'textarea', 
				"sanitize_type" => "sanitize_html_field", 
				"description" => "",
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => 'Written in accordance with WordPress code standards, the theme works with a high loading speed and ensures the security of your website.',
				'customizer'=>array()
			),
			
			'twitter_icon_show' => array(
				"name" => "twitter_icon_show", 
				"title" => __("Show Twitter Icon", "sauron"),
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('twitter_url'),
				'hide' => array(),
				'section' => 'general_links',  
				'tab' => 'homepage', 
				'default' => true ,
				'customizer' => array()    
			  ),      
			  'twitter_url' => array( 
				"name" => "twitter_url", 
				"title" => '' , 
				'type' => 'text', 
				"sanitize_type" => "esc_url_raw", 
				"description" => __("Enter your Twitter Profile URL below.", "sauron"),
				'section' => 'general_links', 
				'tab' => 'homepage',
				'default' => '#' ,
				'customizer' => array()     
			  ),   
			  'linkedin_icon_show' => array(   
				"name" => "linkedin_icon_show", 
				"title" => __("Show LinkedIn Icon", "sauron"), 
				'type' => 'checkbox_open', 
				"description" => "", 
				'show' => array('linkedin_url'),
				'hide' => array(),
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => true ,
				'customizer' => array()  
			  ),      
			  'linkedin_url' => array( 
				"name" => "linkedin_url", 
				"title" => '',
				'type' => 'text',
				'input_size' => '60', 
				"sanitize_type" => "esc_url_raw", 
				"description" => __("Enter your LinkedIn URL below.", "sauron"),
				'section' => 'general_links',  
				'tab' => 'homepage', 
				'default' => '#' ,
				'customizer' => array()   
			  ),    
			  'facebook_icon_show' => array(
				"name" => "facebook_icon_show", 
				"title" => __("Show Facebook Icon", "sauron"),
				'type' => 'checkbox_open', 
				"description" => "",
				'show' => array('facebook_url'),
				'hide' => array(),
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => true ,
				'customizer' => array()  
			  ),      
			  'facebook_url' => array(
				"name" => "facebook_url", 
				"title" => "", 
				'type' => 'text', 
				"sanitize_type" => "esc_url_raw",   
				"description" => __("Enter your Facebook Profile URL.", "sauron"),      
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => '#' ,
				'customizer' => array()  
			  ),      
			  'google_icon_show' => array( 
				"name" => "google_icon_show", 
				"title" => __("Show Google+ Icon", "sauron"),
				'type' => 'checkbox_open', 
				"description" => "", 
				'section' => 'general_links', 
				'show' => array('google_url'),
				'hide' => array(),
				'tab' => 'homepage', 
				'default' => true ,
				'customizer' => array()  
			  ), 
			  'google_url' => array( 
				"name" => "google_url", 
				"title" => "", 
				'type' => 'text', 
				"description" => __("Enter your Google+ Profile URL.", "sauron"), 
				"sanitize_type" => "esc_url_raw", 
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => '#',
				'customizer' => array()
			  ), 
			  'instagram_icon_show' => array( 
				"name" => "instagram_icon_show", 
				"title" => __("Show Instagram Icon", "sauron"),
				'type' => 'checkbox_open', 
				"description" => "", 
				'section' => 'general_links', 
				'show' => array('instagram_url'),
				'hide' => array(),
				'tab' => 'homepage', 
				'default' => true ,
				'customizer' => array()  
			  ), 
			  'instagram_url' => array( 
				"name" => "instagram_url", 
				"title" => "", 
				'type' => 'text', 
				"sanitize_type" => "esc_url_raw", 
				"description" => __("Enter your Instagram Profile URL.", "sauron"),
				'section' => 'general_links', 
				'tab' => 'homepage', 
				'default' => '#',
				'customizer' => array()
			  ), 
			
			
		);
	
	}


	


	private function get_posts(){
		$args= array(
				'posts_per_page'   => 3000,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'post',
				'post_status'      => 'publish',
				 );

		$posts_array_custom=array();
		$posts_array = get_posts( $args );

		foreach($posts_array as $post){
			$key = $post->ID;
		  $posts_array_custom[$key] = $post->post_title;
		}
		return $posts_array_custom;
	}
	
	private function get_diagram_pages(){
		$args= array(
				'posts_per_page'   => 3000,
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'post_type'        => 'page',
				'post_status'      => 'publish',
				'meta_value' 	   => 'page-diagram.php'
				 );

		$pages_array_custom=array();
		$pages_array = get_pages( $args );

		foreach($pages_array as $page){
			$key = $page->ID;
		  $pages_array_custom[$key] = $page->post_title;
		}
		return $pages_array_custom;
	}

	private function get_categories(){
		$args= array(
				'hide_empty' => 0,
				'orderby' => 'name',
				'order' => 'ASC',
			);
		
		$categories_array_custom=array();
		$categories_array = get_categories( $args );

		foreach($categories_array as $category){
		  $categories_array_custom[$category->term_id] = $category->name;
		}
		return $categories_array_custom;
	}
	
}
 