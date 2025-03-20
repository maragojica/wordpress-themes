<?php
/**
 * Template part for displaying single resources
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package CNP_Technologies
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

      <div class="entry-content">
		<?php
		the_content();		
		?>
		<?php  $post_id = get_the_ID();
		$taxonomy = 'resource-solution'; 
		$slug = 'videos';
		if ( has_term( $slug, $taxonomy, $post_id ) ) { ?>
	    <section class="video-section overflow-hidden max-w-full relative padding-small">
			<div class="container mx-auto">
				<div class="w-full mx-auto lg:max-w-[70%]">
				<?php $video_type = get_field('video_type');
						$videomp4 = get_field('video_mp4');   
						$video_webm = get_field('video_webm');
						$youtube_id = get_field('youtube_id'); 
						$vimeo_id = get_field('vimeo_id'); 
						$poster = get_field('poster');
				  if($video_type['value'] == "file"){  ?>   

					<video class="player" playsinline controls <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>>  
						<?php if($videomp4): ?>
							<source src="<?php echo $videomp4; ?>" type="video/mp4">
						<?php endif; ?>  
						<?php if($video_webm): ?>
							<source src="<?php echo $video_webm; ?>" type="video/webm">
						<?php endif; ?>                              
						Your browser does not support the video tag.
					</video>  

					<?php }elseif($video_type['value'] == "youtube"){   ?>   
						<div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?php echo $youtube_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>

						<?php }elseif($video_type['value'] == "vimeo"){   ?>   
							<div class="player" data-plyr-provider="vimeo" data-plyr-embed-id="<?php echo $vimeo_id;?>" <?php if( !empty($poster) ): ?> data-poster="<?php echo esc_url($poster); ?>" <?php endif; ?>></div>
					<?php } ?> 
				</div>
			</div>
		</section>
	<?php } ?>
	</div><!-- .entry-content -->
	
</article><!-- #post-${ID} -->
