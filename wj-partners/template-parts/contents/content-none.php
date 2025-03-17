<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WJ_Partners
 */

?>

<section class="no-results not-found p-t0 p-b0">
<section class="error-404 page-internal-hero bg-navy not-found page-general-hero flex p-t0 p-b0" > 
            <div class="overlay flex align-items-center"> 
                <div class="container">
                    <div class="row middle-xs justify-center">
                        <div class="col-xs-12 col-lg-9 col-xl-7">
                        <div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s">                               
								<h2 class="cl-white mt-0 mb-10px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
								<?php esc_html_e( 'Nothing Found', 'construction-metal-products' ); ?>
								</h2>                       
                           </div>                                                              
                            </div>
                        </div>
                    </div>                                    
                </div>
            </div>
    </section> 	
	<section  class="section-info-default">
            <div class="container">
                <div class="row row-post justify-center"> 
                    <div class="col-xs-12 col-lg-8">                    
                        <div class="dp-1 p-lg-t2 cl-black text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
						<?php
							if ( is_home() && current_user_can( 'publish_posts' ) ) :

								printf(
									'<p>' . wp_kses(
										/* translators: 1: link to WP admin new post page. */
										__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'construction-metal-products' ),
										array(
											'a' => array(
												'href' => array(),
											),
										)
									) . '</p>',
									esc_url( admin_url( 'post-new.php' ) )
								);

							elseif ( is_search() ) :
								?>

								<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'construction-metal-products' ); ?></p>
								<?php								

							else :
								?>

								<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'construction-metal-products' ); ?></p>
								<?php							

							endif;
							?>
						</div>    
						                                      
                    </div>                   
                </div>
				<div class="row middle-xs justify-center text-center m-t1">
                        <div class="col-xs-12 col-lg-9 col-xl-7">                        
						    <div class="cta-btn">                               
							<a tabindex="0" class="button blue" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Back Home" title="Back Home"><span class="text">Back Home</span></a>                             
							</div>                                                                   
                            </div>
                        </div>
                    </div>   
            </div>            
        </section>
</section><!-- .no-results -->
