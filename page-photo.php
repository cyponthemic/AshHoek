<?php
/*
Template Name: Photo	 
*/
get_header(); ?>
<div class="row">
	<?php get_sidebar(); ?>
    <div class="small-12 large-9 columns" role="main">
		
        <?php do_action('foundationPress_before_content'); ?>
        <?php if(is_page('director')){
        			$project_type=1;}
			  elseif (is_page('cinematographer')){
				  	$project_type=2;}
			  else {
				  	$project_type=3;
			  }	
			  
         ?>
			  
        <?php 	
        		$terms = get_terms('photography-type');
        		foreach ( $terms as $term ):
        		
        		/* START TAXONOMY LOOP */
        		
        		echo '<section id="'.$term->name.'" class="row"><h1 class="taxonomy-title"><span>//</span>';	
				echo $term->name;
				echo '</h1>';	
        		
        		
        		$args = array( 
										'post_type' => 'project',
										'posts_per_page' => -1, 
										'tax_query' => array(
														array(
															'taxonomy' => 'photography-type',
															'field'    => 'slug',
															'terms'    => $term->slug
														)),
										'orderby'  => 'menu_order',
										
										'order'    => 'DSC'
									);
				$loop = new WP_Query( $args );
        
				while ( $loop->have_posts() ) : $loop->the_post(); 
				if(wp_is_mobile()){
					$thb_size='video-thumbxl';
				}
				else {
					$thb_size='video-thumb';
				}
				$thb_url = wp_get_attachment_image( get_post_thumbnail_id($post->ID),$thb_size,0,array('class'=>'entry-thumbnail','rel'=>'lightbox'));
				
				$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				?>
            
            <article <?php post_class("small-12 medium-6 large-4 left ") ?> id="post-<?php the_ID(); ?>">
                
                <?php do_action('foundationPress_page_before_entry_content'); ?>
                
                <div class="entry-content">
                    
                    <a class="entry-link lightbox-link" href="<?php echo $large_image_url[0]; ?>" rel="lightbox" >
                    	<span class="entypo-resize-full" ></span>
                    	<h6 class="entry-title"><?php the_title(); ?></h6>
                    	<?php echo $thb_url?>
                    </a>
                </div>
                
            </article>
        <?php endwhile;
	        /* END TAXONOMY LOOP */
        		echo '</section>';
        		endforeach;
        ?>

        <?php do_action('foundationPress_after_content'); ?>

    </div>
    
</div>
<?php get_footer(); ?>
