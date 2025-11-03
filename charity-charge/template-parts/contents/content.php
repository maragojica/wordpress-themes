<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Charity_Charge
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<section class="content-info-section pt-5">
		<div class="container">
			<div class="row justify-content-center">
                <div class="col-lg-12">
                    
                    <!-- Header Section -->
                    <header class="post-header mb-4" data-aos="fade-in">
                        <a tabindex="0" href="/nonprofit-resources" aria-label="All Posts" title="All Posts" class="back-post">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M10 3L5 8L10 13" stroke="black" stroke-width="1.5"/>
                            </svg>
                            All Posts
                        </a>
                        <!-- Category and Read Time -->
                        <div class="post-meta d-flex align-items-center gap-3 mt-lg-5 mt-4">
							<?php 
							$category = get_the_category();
							if (!empty($category)) : ?>
								<span class="category-tags color-black">
									<?php echo esc_html($category[0]->name); ?>
								</span>
							<?php endif; ?>
                            
                            <?php 
                            // ACF field for read time, fallback to estimated read time
                            $read_time = get_field('read_time');
                            if (!$read_time) {
                                $word_count = str_word_count(strip_tags(get_the_content()));
                                $read_time = ceil($word_count / 200) . ' min read';
                            }
                            ?>
                            <span class="read-time color-black"><?php echo esc_html($read_time); ?></span>
                        </div>

                        <!-- Title -->
                        <h1 class="post-title color-black" data-aos="fade-in">
                            <?php the_title(); ?>
                        </h1>
                    </header>

                     
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="featured-image-container position-relative" data-aos="fade-in">
                            <!-- Featured Image -->
                            <div class="featured-image-wrapper">
                                <?php 
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                                $image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true);
                                ?>
                                <img src="<?php echo esc_url($featured_image); ?>" 
                                     alt="<?php echo esc_attr($image_alt); ?>" 
                                     class="featured-image-post img-fluid">
                            </div>
                        </div>
                        
                    <?php endif; ?>
                    
                    <div class="social-share mt-4 justify-content-md-betwen">
                        <?php if (has_post_thumbnail()) : ?>
                            <!-- Image Caption -->
                            <?php 
                            $caption = get_the_post_thumbnail_caption();
                                                        
                            // Use custom caption if available, otherwise use default caption
                            $final_caption = $caption;
                            
                            if ($final_caption) : ?>
                                <div class="featured-image-caption color-black" data-aos="fade-in">
                                    <p class="mb-0"><?php echo esc_html($final_caption); ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                         <!-- Social Share Icons -->
                    <div class="social-share-container d-flex justify-content-end gap-2 ms-lg-auto" data-aos="fade-in">
                        <?php 
                        $post_url = get_permalink();
                        $post_title = get_the_title();
                        ?>
                        
                        <!-- Copy Link -->
                        <button onclick="copyToClipboard('<?php echo esc_js($post_url); ?>')" 
                                class="social-btn" 
                                title="Copy Link">
                           <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#F4F4F4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.9999 11.6601V12.0001C25.0007 13.0662 24.576 14.0885 23.8199 14.84L20.9999 17.67C20.4738 18.1911 19.6261 18.1911 19.1 17.67L19 17.56C18.8094 17.3656 18.8094 17.0544 19 16.86L22.4399 13.4201C22.807 13.0394 23.0083 12.5288 22.9999 12.0001V11.6601C23.0003 11.127 22.788 10.6159 22.4099 10.2401L21.7599 9.59011C21.3841 9.21207 20.873 8.99969 20.3399 9.00011H19.9999C19.4669 8.99969 18.9558 9.21207 18.58 9.59011L15.14 13.0001C14.9456 13.1906 14.6344 13.1906 14.44 13.0001L14.33 12.8901C13.8089 12.3639 13.8089 11.5162 14.33 10.9901L17.16 8.15012C17.9165 7.40505 18.9382 6.99133 19.9999 7.00014H20.3399C21.4011 6.9993 22.4191 7.42018 23.1699 8.17012L23.8299 8.83012C24.5798 9.5809 25.0007 10.5989 24.9999 11.6601ZM12.6499 17.94L17.9399 12.6501C18.0338 12.5554 18.1616 12.5022 18.2949 12.5022C18.4282 12.5022 18.556 12.5554 18.6499 12.6501L19.3499 13.3501C19.4445 13.4439 19.4978 13.5717 19.4978 13.7051C19.4978 13.8384 19.4445 13.9662 19.3499 14.0601L14.0599 19.35C13.966 19.4447 13.8382 19.4979 13.7049 19.4979C13.5716 19.4979 13.4438 19.4447 13.3499 19.35L12.6499 18.65C12.5553 18.5561 12.502 18.4283 12.502 18.295C12.502 18.1617 12.5553 18.0339 12.6499 17.94ZM17.5599 19C17.3655 18.8094 17.0543 18.8094 16.8599 19L13.4299 22.41C13.0517 22.7905 12.5365 23.003 12 22.9999H11.66C11.1269 23.0004 10.6158 22.788 10.24 22.41L9.58997 21.76C9.21194 21.3842 8.99956 20.873 8.99998 20.34V20C8.99956 19.4669 9.21194 18.9558 9.58997 18.58L13.0099 15.14C13.2005 14.9456 13.2005 14.6345 13.0099 14.44L12.8999 14.33C12.3738 13.8089 11.5261 13.8089 11 14.33L8.17999 17.16C7.42392 17.9116 6.99916 18.9339 7 20V20.35C7.00182 21.4077 7.42249 22.4216 8.16999 23.1699L8.82998 23.8299C9.58076 24.5799 10.5988 25.0008 11.66 24.9999H12C13.0534 25.0061 14.0667 24.5964 14.8199 23.8599L17.6699 21.01C18.191 20.4838 18.191 19.6361 17.6699 19.11L17.5599 19Z" fill="black"/>
                            </svg>
                        </button>
                        
                        <!-- LinkedIn -->
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo urlencode($post_url); ?>" 
                           target="_blank" 
                           class="social-btn social-linkedin"
                           title="Share on LinkedIn">
                            <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#F4F4F4"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9 7H23C24.1046 7 25 7.89543 25 9V23C25 24.1046 24.1046 25 23 25H9C7.89543 25 7 24.1046 7 23V9C7 7.89543 7.89543 7 9 7ZM12 22C12.2761 22 12.5 21.7761 12.5 21.5V14.5C12.5 14.2239 12.2761 14 12 14H10.5C10.2239 14 10 14.2239 10 14.5V21.5C10 21.7761 10.2239 22 10.5 22H12ZM11.25 13C10.4216 13 9.75 12.3284 9.75 11.5C9.75 10.6716 10.4216 10 11.25 10C12.0784 10 12.75 10.6716 12.75 11.5C12.75 12.3284 12.0784 13 11.25 13ZM21.5 22C21.7761 22 22 21.7761 22 21.5V16.9C22.0325 15.3108 20.8576 13.9545 19.28 13.76C18.177 13.6593 17.1083 14.1744 16.5 15.1V14.5C16.5 14.2239 16.2761 14 16 14H14.5C14.2239 14 14 14.2239 14 14.5V21.5C14 21.7761 14.2239 22 14.5 22H16C16.2761 22 16.5 21.7761 16.5 21.5V17.75C16.5 16.9216 17.1716 16.25 18 16.25C18.8284 16.25 19.5 16.9216 19.5 17.75V21.5C19.5 21.7761 19.7239 22 20 22H21.5Z" fill="black"/>
                            </svg>
                        </a>
                        
                        <!-- Twitter -->
                        <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode($post_url); ?>&text=<?php echo urlencode($post_title); ?>" 
                           target="_blank" 
                           class="social-btn social-twitter"
                           title="Share on Twitter">
                           <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#F4F4F4"/>
                            <path d="M24.9727 10.7174C24.5083 11.3369 23.9469 11.8773 23.3102 12.3178C23.3102 12.4796 23.3102 12.6414 23.3102 12.8123C23.3153 15.7511 22.1414 18.5691 20.0517 20.6345C17.9619 22.6999 15.1311 23.8399 12.1939 23.7989C10.4959 23.8046 8.81955 23.4169 7.2963 22.6661C7.21416 22.6302 7.16119 22.549 7.1615 22.4593V22.3604C7.1615 22.2313 7.26611 22.1267 7.39515 22.1267C9.0643 22.0716 10.6739 21.4929 11.9962 20.4724C10.4854 20.4419 9.12607 19.5469 8.50048 18.1707C8.46889 18.0956 8.47872 18.0093 8.52645 17.9432C8.57417 17.8771 8.65288 17.8407 8.73413 17.8471C9.1933 17.8932 9.65706 17.8505 10.1001 17.7212C8.43227 17.375 7.17909 15.9904 6.99974 14.2957C6.99337 14.2144 7.0298 14.1357 7.09588 14.0879C7.16195 14.0402 7.24812 14.0303 7.32326 14.062C7.77082 14.2595 8.25397 14.3635 8.74312 14.3676C7.28172 13.4085 6.65049 11.5841 7.20643 9.92622C7.26382 9.76513 7.40169 9.64612 7.56938 9.61294C7.73706 9.57975 7.90984 9.63728 8.0242 9.76439C9.99627 11.8633 12.7059 13.114 15.5818 13.2528C15.5082 12.9589 15.472 12.6568 15.474 12.3537C15.5009 10.7647 16.4841 9.34921 17.9633 8.76987C19.4424 8.19054 21.1248 8.56203 22.2229 9.71044C22.9713 9.56785 23.6949 9.31645 24.3706 8.96421C24.4201 8.93331 24.4829 8.93331 24.5324 8.96421C24.5633 9.01373 24.5633 9.07652 24.5324 9.12604C24.2051 9.87552 23.6522 10.5041 22.9508 10.9242C23.565 10.853 24.1684 10.7081 24.7481 10.4926C24.7969 10.4594 24.861 10.4594 24.9098 10.4926C24.9507 10.5113 24.9813 10.5471 24.9934 10.5904C25.0055 10.6337 24.9979 10.6802 24.9727 10.7174Z" fill="black"/>
                            </svg>
                        </a>
                        
                        <!-- Facebook -->
                        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode($post_url); ?>" 
                           target="_blank" 
                           class="social-btn social-facebook"
                           title="Share on Facebook">
                           <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect width="32" height="32" rx="16" fill="#F4F4F4"/>
                            <path d="M20.5 10H17.5C16.9477 10 16.5 10.4477 16.5 11V14H20.5C20.6137 13.9975 20.7216 14.0504 20.7892 14.1419C20.8568 14.2334 20.8758 14.352 20.84 14.46L20.1 16.66C20.0318 16.8619 19.8431 16.9984 19.63 17H16.5V24.5C16.5 24.7761 16.2761 25 16 25H13.5C13.2239 25 13 24.7761 13 24.5V17H11.5C11.2239 17 11 16.7761 11 16.5V14.5C11 14.2239 11.2239 14 11.5 14H13V11C13 8.79086 14.7909 7 17 7H20.5C20.7761 7 21 7.22386 21 7.5V9.5C21 9.77614 20.7761 10 20.5 10Z" fill="black"/>
                            </svg>
                        </a>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row row-content g-lg-5">
                <div class="col-lg-8">                   
                    <!-- Post Content -->
                    <div class="post-content color-black pt-3" data-aos="fade-in">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="col-lg-4">                   
                    <div class="sidebar-content mt-5 mt-lg-0" data-aos="fade-in">
                        <div class="sidebar-subscribe">
                            <?php if(get_field("subscribe_title", "option")): ?>
                                <div class="sidebar-main-title color-black"><?php echo get_field("subscribe_title", "option"); ?></div>
                            <?php endif; ?>
                            <?php if(get_field("subscribe_text", "option")): ?>
                                <div class="sidebar-text color-black"><?php echo get_field("subscribe_text", "option"); ?></div>
                            <?php endif; ?>
                             
                             <script charset="utf-8" type="text/javascript" src="https://js.hsforms.net/forms/embed/v2.js" onload="loadHubSpotForm()"></script>
                            <script>
                            function loadHubSpotForm() {
                                hbspt.forms.create({
                                portalId: "45968269",
                                formId: "295f3ebd-d87a-4866-9daa-c1f8c17351c8"
                                });
                            }
                            </script> 
                            <?php if(get_field("subscribe_subtext", "option")): ?>
                                <div class="sidebar-subtext color-black"><?php echo get_field("subscribe_subtext", "option"); ?></div>
                            <?php endif; ?>
                        </div>
                    </div>                   
                </div>
            </div>
		</div>
	</section>
	<?php include get_template_directory() . '/template-parts/global/global-related-nonprofit-resources.php';	 ?>
	<section class="topics-section position-relative bg-white padding-medium  ">
		<div class="container"> 
			<?php $container_classes = 'row  align-items-center  justify-content-center text-center g-4 g-lg-0 gap-medium'; 
			include get_template_directory() . '/template-parts/global/global-topics.php';	 ?>
		</div>
	</section>
	<?php include get_template_directory() . '/template-parts/global/global-charity-show.php'; ?>
	<section class="resources-slider-section position-relative bg-white  padding-medium ">
     <div class="container">
			<?php include get_template_directory() . '/template-parts/global/global-resources-slider.php'; ?>
		</div>
	</section>
</article><!-- #post-<?php the_ID(); ?> -->
