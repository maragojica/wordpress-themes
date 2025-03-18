<?php
if (have_rows('internal_menu')) {
    while (have_rows('internal_menu')) {
        the_row(); 
        $media_type = get_sub_field('media_type'); ?>
        <section class="section-internal-menu bg-green">
            <div class="container">
                <div class="row middle-xs"> 
                    <div class="col-xs-12">
                        <?php if ( have_rows( 'menu_items' ) ):  ?>
                            <div class="menu-list animate__animated" data-animation="fadeBottom" data-duration="1s">
                               <?php while( have_rows('menu_items') ): the_row(); $cta = get_sub_field('link');  ?>
                               <?php if( $cta ):
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                                    <div class="list" >
                                        <a class="link-list" tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                    </div>
                                <?php endif; ?>
                               <?php endwhile; ?>
                            </div>
                        <?php endif; ?>     
                    </div>                
                </div>
            </div>         
        </section>           
<?php }
} ?>
