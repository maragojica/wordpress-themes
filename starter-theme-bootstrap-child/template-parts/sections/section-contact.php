<?php 
if (have_rows('contact')) :          
    while (have_rows('contact')) : the_row();      
    $headline = get_sub_field('headline'); 
    $cta = get_sub_field('cta_button');  
   ?>

<section class="section-contact">
    <div class="container pb-md-5">       
        <div class="row justify-content-center pt-md-3">
            <div class="col-lg-7 pb-3">
                <?php if($headline): ?>
                    <h2 class="headline cl-l-blue text-center pb-2"><?php echo $headline;?></h2>
                <?php endif; ?>           
            </div>
        </div>  
        <?php if( $cta ):
        $link_url = $cta['url'];
        $link_title = $cta['title'];
        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>   
            <div class="row">
                <div class="col-lg-12 text-center">
                    <a tabindex="0" class="btn-cta mx-auto" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                </div>
            </div>
        <?php endif; ?>     
    </div>
</section> 
<?php              
    endwhile;
endif; ?> 

