<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package WJ_Partners
 */

get_header();
?>

<?php	
$heading = get_field('404_headline', 'option');
$subheading = get_field('404_subheadline', 'option');
$description = get_field('404_text', 'option');
?>

<main id="primary" class="site-main">
	<div id="primary" class="content-area">	
		<section class="error-404 not-found page-internal-hero bg-navy flex p-t0 p-b0"> 
            <div class="overlay flex align-items-center"> 
                <div class="container">
                    <div class="row middle-xs justify-center">
                        <div class="col-xs-12 col-lg-9 col-xl-7">
                        <div class="w-100 text-center wow fadeIn" data-wow-duration="0.6s" data-wow-delay="0.1s"> 
                                <?php if ($heading) : ?>
                                    <h1 class="cl-white mt-0 mb-10px text-uppercase wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.2s">
									<?php echo $heading; ?>
									</h1>									
                                <?php endif; ?>                
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
                        <div class="dp-1 p-lg-t2 cl-black text-center wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $description; ?></div>    
						<form class="form-search-home w-100 animate__animated" data-animation="fadeBottom" data-duration="2s" name="search" method="get" action="/">
								<div class="input-group w-100">
								    <label for="search" class="hide">Search:</label>
									<input type="text" name="s" id="search" placeholder="Search" aria-describedby="search" class="searchinput">
									<div class="input-group-append">
										<button class="btn-search" type="submit" value="submit">
										<svg xmlns="http://www.w3.org/2000/svg" width="28" height="29" viewBox="0 0 28 29" fill="none">
											<path d="M24.1068 23.0852L20.2088 19.1987C21.4664 17.5964 22.1488 15.6179 22.1463 13.581C22.1463 11.767 21.6084 9.99369 20.6006 8.4854C19.5928 6.97711 18.1603 5.80153 16.4844 5.10734C14.8085 4.41315 12.9643 4.23152 11.1852 4.58542C9.40604 4.93931 7.77179 5.81284 6.48909 7.09554C5.20639 8.37823 4.33287 10.0125 3.97897 11.7916C3.62508 13.5708 3.80671 15.4149 4.5009 17.0909C5.19509 18.7668 6.37066 20.1992 7.87895 21.207C9.38724 22.2148 11.1605 22.7528 12.9745 22.7528C15.0114 22.7553 16.99 22.0729 18.5922 20.8152L22.4788 24.7132C22.5854 24.8207 22.7122 24.906 22.8519 24.9642C22.9916 25.0224 23.1414 25.0523 23.2928 25.0523C23.4441 25.0523 23.594 25.0224 23.7337 24.9642C23.8734 24.906 24.0002 24.8207 24.1068 24.7132C24.2142 24.6066 24.2995 24.4798 24.3577 24.3401C24.4159 24.2004 24.4459 24.0506 24.4459 23.8992C24.4459 23.7479 24.4159 23.598 24.3577 23.4583C24.2995 23.3186 24.2142 23.1918 24.1068 23.0852ZM6.09568 13.581C6.09568 12.2205 6.49912 10.8905 7.25498 9.75929C8.01083 8.62807 9.08516 7.74639 10.3421 7.22575C11.599 6.70511 12.9822 6.56888 14.3165 6.8343C15.6509 7.09973 16.8766 7.75487 17.8386 8.71689C18.8006 9.67892 19.4558 10.9046 19.7212 12.239C19.9866 13.5733 19.8504 14.9564 19.3297 16.2134C18.8091 17.4703 17.9274 18.5447 16.7962 19.3005C15.665 20.0564 14.335 20.4598 12.9745 20.4598C11.1501 20.4598 9.40048 19.7351 8.11045 18.445C6.82042 17.155 6.09568 15.4053 6.09568 13.581Z" fill="white"/>
										</svg>
										<span hidden>Search</span>
										</button>
									</div>
								</div>
							</form>                                         
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
		</div><!-- .content-area -->
	</main><!-- .site-main -->

<?php
get_footer();