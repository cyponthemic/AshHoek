<?php
/*
Template Name: Video single
*/
get_header(); ?>
<div class="row ">
	<?php get_sidebar(); 
		
	?>
    <div class="small-12 large-9 columns" role="main">
		
        <?php do_action('foundationPress_before_content'); ?>
			<article <?php post_class("small-12 columns") ?> id="post-<?php the_ID(); ?>">
					
					<?php while (have_posts()) : the_post(); ?>
						
						
						
						 
						
						<div class="entry-content">
						
							<div class="entry-video flex-video widescreen vimeo">
								<?php /* Output the video */
								echo types_render_field( "project-video-embed", array("width" => "100%","height" => "100%","portrait" => "0") );
								?>
							</div>
						</div>
						
						<footer>
							 <h1 class="entry-title"><span>//</span><?php the_title(); ?></h1>
							 <?php edit_post_link( $link, $before, $after, $id ); ?>
						 </footer>
						
						<hr>
						
						<?php
					endwhile;
					wp_reset_postdata();?>
			
			</article>
			
        <?php 	$args = array( 
										'post_type' => 'project',
										'posts_per_page' => -1, 
										'meta_key'   => 'wpcf-project-type', 
										/* 1 for director */
										'meta_value' => '1'
									);
				$loop = new WP_Query( $args );
        
				while ( $loop->have_posts() ) : $loop->the_post(); 
				$thb_url = wp_get_attachment_image( get_post_thumbnail_id($post->ID),'thumbnail',0,array('class'=>'entry-thumbnail'));
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
