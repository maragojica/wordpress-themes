<?php
//Template name: Page Press Release
get_header();
?>
<div class="investors">
    <section id="hero" style="background:url(/wp-content/uploads/2022/05/hero-investors.jpg) no-repeat !important;background-size: cover!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="headline-hero"><?php the_title(); ?></div>
                </div>
                <div class="col-md-4"> 
                    <?php echo do_shortcode("[nasdaq]"); ?>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
            <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row intro">
            <div class="col-lg-6">
                <?php the_content(); ?>
            </div>
            <div class="col-lg-6">
                <div class="sidebar-downloads">
                    
                    <h3 id="other-policies-and-procedures" class="headline" style="border:none;margin-bottom: inherit;">Other Policies and Procedures</h3>

                    <script type="text/javascript">
                        jQuery(window).ready(function(){
                            jQuery('.sidebar-downloads .accordeon .have-childs h3').click(function(){
                                jQuery(this).closest('.have-childs').find('.subitems').slideToggle();
                                jQuery(this).closest('.have-childs').toggleClass('open');
                            });
                        });
                    </script>

                    <div class="accordeon">
                        <?php if( have_rows('years') ): ?>

                            <?php $i=1; ?>
                            <?php while( have_rows('years') ) : the_row(); ?>
                                <?php if(get_sub_field('tab_type') == 'Repeat Items' and get_sub_field('show-hide')): ?>
                                    <div class="items have-childs <?php //echo ($i==1)?'open':''; ?>">
                                        <h3><?php echo get_sub_field('year'); ?></h3>

                                        <?php if( have_rows('items_repeat') ): ?>
                                        <div class="subitems" style='display:none;'>
                                            
                                            <?php while( have_rows('items_repeat') ) : the_row(); ?>
                                            <div class="item download">
                                                <a href="<?php the_permalink(get_sub_field('file')); ?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-download.png"> <?php echo get_sub_field('title'); ?></a>

                                            </div>
                                            <?php endwhile; ?>
                                                
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                <?php endif; //tab_type ?>

                                <?php if(get_sub_field('tab_type') == 'Single Item'): ?>
                                    <div class="items download">
                                        <h3><a href="<?php echo the_permalink(get_sub_field('tab_title_file')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/icon-download.png"> <?php echo get_sub_field('year'); ?></a></h3>                                        
                                    </div>
                                <?php endif; //tab_type ?>
                                <?php $i++; ?>
                            <?php endwhile; ?>
                        <?php endif; //years ?>
                    </div>
                    
                </div>
                <div class="img-resp mt-4">
                    <img src="https://innospec.com/wp-content/uploads/2023/02/corporate_governance_img-jpg.webp">
                </div>
            </div>
        </div>
        
    </section>
    
    <?php get_template_part( 'footer-investors' ); ?>

</div>
<?php

get_footer();

?>
