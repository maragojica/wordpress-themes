<?php 
if (have_rows('anchor_links')) :   ?>
<section class="section-anchor-links">            
    <div class="container">     
        <div class="row justify-center"> 
                <div class="col-xs-12 col-lg-12 text-center">  
                    <div class="list-anchor"> 
                    <?php while (have_rows('anchor_links')) : the_row();  
                    $cta = get_sub_field('link'); ?>
                        <?php if( $cta ):
                            $link_url = $cta['url'];
                            $link_title = $cta['title'];
                            $link_target = $cta['target'] ? $cta['target'] : '_self'; 
                            ?>                               
                                <a tabindex="0" class="link-anchor" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><span class="text"><?php echo esc_html( $link_title ); ?></span></a>                             
                             <?php endif; ?>
                     <?php endwhile; ?>    
                     </div> 
                </div>                      
          </div>                   
    </div> 
</section>  
<?php endif; ?>  
