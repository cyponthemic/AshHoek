<?php
/*
Template Name: Video 
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
			<article <?php post_class("small-12 columns") ?> id="post-<?php the_ID(); ?>">
				
				<?php $args = array( 
										'post_type' => 'project',
										'posts_per_page' => -1, 
									
										'meta_query' => array(
														'relation' => 'AND',
														array(
															'key' => 'wpcf-featured-project',
															'value' => '1',
															'compare' => '='
														),
														array(
															'key' => 'wpcf-project-type',
															'value' => $project_type,
															'compare' => '='
														)),
										
									);
				$loop = new WP_Query( $args );
					
					while ( $loop->have_posts() ) : $loop->the_post();
						
						?>
						
						 <header>
							 
						 </header>
						
						<div class="entry-content">
						
							<div class="entry-video flex-video widescreen vimeo">
								<?php /* Output the video */
								echo types_render_field( "project-video-embed", array("width" => "100%","height" => "100%","portrait" => "0") );
								?>
							</div>
							<h1 class="entry-title"><span>//</span><?php the_title(); ?></h1>
						</div>
						
						<hr>
						
						<?php
					endwhile;
					wp_reset_postdata();?>
			
			</article>
			
        <?php 	$args = array( 
										'post_type' => 'project',
										'posts_per_page' => -1, 
								
										'meta_query'     => array(
									        array(
									            'key'       => 'wpcf-project-type',
									            'value'     => $project_type,
									            'compare'   => '='
									        )
									    ),
										
										
										'orderby'  => 'menu_order',
										
										'order'    => 'DSC'
									);
				$loop = new WP_Query( $args );
        
				while ( $loop->have_posts() ) : $loop->the_post(); 
				$thb_url = wp_get_attachment_image( get_post_thumbnail_id($post->ID),'video-thumb',0,array('class'=>'entry-thumbnail'));
				?>
            
            <article <?php post_class("small-12 medium-6 large-4 left columns") ?> id="post-<?php the_ID(); ?>">
                
                <?php do_action('foundationPress_page_before_entry_content'); ?>
                
                <div class="entry-content">
                    
                    <a class="entry-link" href="<?php the_permalink() ?>">
                    	<h6 class="entry-title"><span>//</span><?php the_title(); ?></h6>
                    	<?php echo $thb_url?>
                    </a>
                </div>
                
            </article>
        <?php endwhile;?>

        <?php do_action('foundationPress_after_content'); ?>

    </div>
    
</div>
<?php get_footer(); ?>
