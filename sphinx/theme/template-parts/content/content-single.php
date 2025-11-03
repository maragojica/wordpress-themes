<?php
/**
 * Template part for displaying single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package sphinx
 */

?>

<?php 
$bg_image_overlay = get_field('news_press_bg_image', 'option');
$add_shape = get_field('add_shape'); 
$content = get_the_content(); 
$add_banner_cta = get_field('add_banner_cta'); 
$excerpt_content = get_field('excerpt_content'); 
$buttons = get_field('buttons'); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="entry-content-single max-w-full relative bg-foreground overflow-hidden relative z-[1]">		 
		<div class="w-full h-full padding-large  lg:pt-0 pt-0-important">			
			<?php if(!empty($bg_image_overlay)): ?>
				<div class="top-background bg-cover bg-no-repeat bg-top w-full pt-[4em] lg:pt-[100px] lg:pb-[100px] pb-[4em] relative z-[1]" style="background-image: url('<?php echo esc_url($bg_image_overlay['url']); ?>');" >
				</div>
		     <?php endif; ?>	
			 <div class="bottom-gradient bg-gradient-custom-reverse w-full pb-[30px] lg:mt-[-100px] mt-[-4em] relative z-[2] relative overflow-hidden">
				<?php if($add_shape): ?>
						<div class="absolute bottom-0 left-0 w-full h-fit overflow-hidden z-[1]">
							<div class="svg-container-single" id="svgContainersingle">
								<?php 
								$svg = file_get_contents(get_template_directory() . '/shapes/single-background-texture.svg');
								echo $svg;
								?>
							</div>
						</div>
					<?php endif; ?>
			      <div class="container mx-auto relative z-[2]" data-aos="fade-in"> 
					<div class="max-w-full lg:max-w-[80%] mx-auto bg-white lg:px-[100px] lg:py-[67px] md:px-[2em] md:py-[2em] px-[1.5em] py-[1.5em]">						
							<?php
							$categories = get_the_category();
							if ($categories && !is_wp_error($categories)) {
								$cat_names = wp_list_pluck($categories, 'name');
								echo '<div class="eyebrow text-foreground" data-aos="fade-in">';
								echo esc_html(implode(', ', $cat_names));
								echo '</div>';
							}
							?>
							<h2 class="text-foreground mb-0 mt-[20px]">
								<?php the_title(); ?>
							</h2> 
							<?php if($excerpt_content): ?>
								<div class="text-large text-foreground mt-[30px]" data-aos="fade-in">
									<?php echo $excerpt_content; ?>
								</div>
							<?php endif; ?>
							  <?php if ($buttons) : ?>
                        <div class="flex flex-wrap justify-center gap-2 lg:gap-8 mt-[30px] justify-start" >
                            <?php foreach ($buttons as $button) : ?>
                                <?php 
                                $button_link = $button['button'];
                                $button_style = $button['button_style'];
                                $is_external = $button['is_external'];
                                $is_download = $button['is_download'];
                                if ($button_link) :
                                    $url = $button_link['url'];
                                    $title = $button_link['title'];
                                    $target = $button_link['target'] ? $button_link['target'] : '_self';  ?>
                                    <div class="relative group">
                                    <a href="<?php echo esc_url($url); ?>" tabindex="0" target="<?php echo esc_attr($target); ?>" aria-label="<?php echo esc_html($title); ?>" title="<?php echo esc_html($title); ?>" class="btn w-fit <?php if($button_style): echo $button_style; endif;?>">
                                        <?php echo esc_html($title); ?>
                                        <?php if ($is_external){ ?>
                                            <span class="external-link-icon pl-[10px]" aria-hidden="true">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 13 12" fill="none">
                                                <path d="M0 12V1.9432H6.94225V3.33573H1.39085V10.6083H9.24745V6.3752H10.6391V12H0ZM4.85345 6.45547L10.4448 1.39173H7.49417V0H13L12.9446 0.088V5.528H11.554V2.2368L5.78699 7.48747L4.85345 6.45547Z" fill="#1F2133"/>
                                                </svg>
                                            </span>
                                        <?php }elseif($is_download){ ?>
                                            <span class="external-link-icon pl-[10px]" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14" fill="none">
                                            <mask id="mask0_4195_848" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="0" y="0" width="13" height="14">
                                                <path d="M13 0.5H0V13.5H13V0.5Z" fill="white"/>
                                            </mask>
                                            <g mask="url(#mask0_4195_848)">
                                                <path d="M1.63223 11.8653H11.4155V11.7648C11.4155 10.9834 11.4155 10.2022 11.4155 9.42102C11.4171 9.21589 11.4962 9.01896 11.6369 8.86972C11.7777 8.72049 11.9696 8.62997 12.1743 8.61634C12.379 8.60271 12.5813 8.66696 12.7406 8.79622C12.8999 8.92547 13.0044 9.11016 13.0332 9.31326C13.0396 9.35225 13.0434 9.39163 13.0445 9.43113C13.0445 10.5096 13.0445 11.5882 13.0445 12.6667C13.0486 12.8509 12.9899 13.0311 12.8779 13.1775C12.766 13.3239 12.6075 13.4278 12.4286 13.4721C12.3573 13.4901 12.284 13.499 12.2105 13.4987C8.41447 13.5 4.61847 13.5 0.822475 13.4987C0.714674 13.5005 0.607591 13.4808 0.507521 13.4407C0.407452 13.4006 0.316414 13.3408 0.23976 13.265C0.163106 13.1892 0.102383 13.0988 0.061161 12.9992C0.0199387 12.8996 -0.000951306 12.7927 -0.000280827 12.6849C-0.00259194 11.5871 -0.00259194 10.4888 -0.000280827 9.39011C0.00664698 9.18795 0.0886697 8.99562 0.229774 8.85068C0.370879 8.70574 0.560935 8.6186 0.762839 8.60625C0.964743 8.59391 1.164 8.65726 1.32171 8.78393C1.47942 8.9106 1.58426 9.09149 1.61576 9.29131C1.62473 9.35835 1.62936 9.4259 1.62963 9.49353C1.63059 10.2522 1.63059 11.0108 1.62963 11.7694V11.8639" fill="#1F2133"/>
                                                <path d="M7.3589 7.43674C7.54956 7.24414 7.74023 7.05155 7.9309 6.85896C8.35267 6.43631 8.77243 6.01165 9.19796 5.59276C9.29913 5.48764 9.42673 5.41171 9.56737 5.37293C9.70801 5.33415 9.85649 5.33397 9.99723 5.37239C10.138 5.41081 10.2658 5.48642 10.3672 5.59128C10.4686 5.69614 10.5399 5.82638 10.5737 5.96831C10.611 6.10744 10.6094 6.25415 10.5691 6.39244C10.5288 6.53074 10.4513 6.65533 10.3451 6.75265C9.33923 7.75991 8.33264 8.7664 7.32538 9.77211C7.25345 9.84405 7.18094 9.91656 7.10988 9.98878C7.03377 10.0683 6.94231 10.1316 6.84105 10.1747C6.73979 10.2179 6.63082 10.2401 6.52075 10.2399C6.41067 10.2397 6.30177 10.2172 6.20064 10.1738C6.0995 10.1303 6.00824 10.0668 5.93236 9.98705C4.85384 8.90853 3.77533 7.82953 2.69681 6.75005C2.59163 6.65016 2.51513 6.52392 2.47526 6.38446C2.43538 6.245 2.43359 6.0974 2.47006 5.95701C2.50654 5.81662 2.57995 5.68857 2.68267 5.58615C2.78539 5.48374 2.91367 5.41071 3.05416 5.37465C3.19391 5.33412 3.3422 5.33339 3.48234 5.37254C3.62248 5.41168 3.74893 5.48915 3.84745 5.59623C4.43293 6.1794 5.01735 6.76363 5.60072 7.34892C5.6296 7.3778 5.6585 7.41131 5.68594 7.44251L5.70905 7.43443C5.70905 7.39417 5.70905 7.35402 5.70905 7.31396C5.70905 5.74587 5.70905 4.17769 5.70905 2.6094C5.70905 2.1649 5.70905 1.72049 5.70905 1.27618C5.70688 1.07624 5.77843 0.882501 5.91003 0.731958C6.04163 0.581415 6.22407 0.484612 6.4225 0.46003C6.62094 0.435449 6.82148 0.484811 6.98584 0.598693C7.1502 0.712575 7.26685 0.882998 7.31354 1.07743C7.33096 1.15174 7.3394 1.22788 7.33867 1.3042C7.34002 3.31121 7.34002 5.31812 7.33867 7.32494V7.42576L7.35832 7.43703" fill="#1F2133"/>
                                            </g>
                                            </svg>
                                            </span>
                                        <?php } ?>   
                                    </a> 
                                </div>            
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>  
						<?php 
							if ( has_post_thumbnail( $post->ID ) ): ?>
							<div class="w-full h-fit lg:h-[330px] xl:h-[455px] news-image-box mt-[30px] relative overflow-hidden">
								<?php  echo get_the_post_thumbnail( 
									$post->ID,
									'full', 
									array( 
										'class' => 'w-full h-full object-cover object-top transition-opacity duration-300'
									) 
								); ?>                                   
								</div>
							<?php
							endif; 
							?>
							<?php if($content): ?>
							<div class="text-large text-foreground style-disc mt-[30px]" data-aos="fade-in" data-aos-delay="100" >                 
								<?php echo $content; ?>                   
							</div>
						<?php endif; ?> 	
						<?php
					// Get current post ID
					$current_post_id = get_the_ID();

					// Get the categories from current post
					$current_categories = get_the_category($current_post_id);
					$category_ids = array();

					if ($current_categories && !is_wp_error($current_categories)) {
						$category_ids = wp_list_pluck($current_categories, 'term_id');
					}

					// Query arguments
					$args = array(
						'post_type' => 'post',
						'posts_per_page' => 2,
						'post__not_in' => array($current_post_id),
						'orderby' => 'date',
						'order' => 'DESC',
					);

					// If current post has categories, get related posts from same categories
					if (!empty($category_ids)) {
						$args['category__in'] = $category_ids;
					}

					$related_query = new WP_Query($args);

					if ($related_query->have_posts()) : ?>
						<div class="related-articles mt-[50px] pt-[50px] border-t-[1px] border-t-primary">
							<?php $title_more_articles = get_field('title_more_articles', 'option');
							if($title_more_articles): ?>
							<h2 class="text-foreground mb-[30px]" data-aos="fade-in"><?php echo esc_html($title_more_articles); ?></h2>
							<?php endif; ?>
							
							<div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
								<?php 
								$delay = 0;
								while ($related_query->have_posts()) : $related_query->the_post(); 
									$terms = get_the_terms(get_the_ID(), 'news-type');
								?>
									<div class="bg-white overflow-hidden group" data-aos="fade-up" data-aos-delay="<?php echo $delay; ?>">
										<?php if (has_post_thumbnail()) : ?>
											<div class="w-full h-[15em] sm:h-[20em] md:h-[230px] 2xl:h-[250px] overflow-hidden">
												<a href="<?php the_permalink(); ?>" class="block h-full">
													<?php the_post_thumbnail('full', array(
														'class' => 'w-full h-full object-cover transition-transform duration-300 group-hover:scale-105'
													)); ?>
												</a>
											</div>
										<?php endif; ?>
										
										<div class="pt-[25px]">
											<h3 class="text-foreground mb-[25px]">
												<a href="<?php the_permalink(); ?>" class="hover:text-primary group-hover:text-primary text-foreground transition-colors" aria-label="<?php the_title(); ?>" title="<?php the_title(); ?>" tabindex="0">
													<?php the_title(); ?>
												</a>
											</h3>
											<a href="<?php the_permalink(); ?>" class="btn w-fit btn_fill_action" aria-label="View full update" title="View full update" tabindex="0">
												View full update
											</a>
										</div>
								</div>
								<?php 
									$delay += 100;
								endwhile; 
								?>
							</div>
						</div>
					<?php 
					endif;

					// Reset post data
					wp_reset_postdata();
					?>					
			       </div>
				 </div>
			 </div>	
		</div>
	</section>
	<?php if($add_banner_cta): ?>
		<?php get_template_part( 'template-parts/global/global', 'news-cta-banner' ); ?>
	<?php endif; ?>
</article><!-- #post-${ID} -->
