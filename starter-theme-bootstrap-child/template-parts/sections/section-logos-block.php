<?php 
if (have_rows('logos_block')) :          
    while (have_rows('logos_block')) : the_row();      
    $headline = get_sub_field('headline');  
    $description = get_sub_field('description'); ?>

<section class="section-logos-block position-relative pb-5 pt-5">
    <div class="container-fluid">       
        <div class="row row-logo justify-content-center">
           <div class="col-lg-8 col-xxl-7 pb-3">
           <?php if($headline): ?>
            <h2 class="headline cl-orange text-center pb-2"><?php echo $headline;?></h2>
            <?php endif; ?>
            <?php if($description): ?>
            <div class="dp-1 text-center cl-off-white"><?php echo $description;?></div>
            <?php endif; ?>
           </div>
        </div>  
    </div>
    <div class="container-fluid pe-0 ps-0 mw-100">
    <?php if (have_rows('slider_logos_list_1')) :  ?>
            <div class="slider-logos slider-logos-1 owl-carousel pb-md-4 pb-3">
            <?php while (have_rows('slider_logos_list_1')) : the_row();      
                    $imageslide = get_sub_field('logo_slide_1'); 
                    $link = get_sub_field('link_slide_1'); ?>
                     <div class="item animated fadeIn">                                        
                        <?php if($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <a  tabindex="0" aria-label="<?php echo $link_title; ?>" title="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="w-100 h-100"> <?php endif; ?>
                        <?php if( !empty($imageslide) ): ?>                               
                            <img class="fluid-img img-logo-partner h-auto" src="<?php echo esc_url($imageslide['url']); ?>" alt="<?php echo esc_attr($imageslide['alt']); ?>" />                                  
                            <?php endif; ?>
                         <?php if($link): ?>
                        </a>
                       <?php endif; ?>
                    </div>
              <?php endwhile; ?>
            </div>
        <?php endif; ?> 
        <?php if (have_rows('slider_logos_list_2')) :  ?>
            <div class="slider-logos slider-logos-1-reverse owl-carousel pb-md-4 pb-3">
            <?php while (have_rows('slider_logos_list_2')) : the_row();      
                    $imageslide = get_sub_field('logo_slide2'); 
                    $link = get_sub_field('link_slide2'); ?>
                     <div class="item animated fadeIn">                                        
                        <?php if($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <a  tabindex="0" aria-label="<?php echo $link_title; ?>" title="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="w-100 h-100"> <?php endif; ?>
                        <?php if( !empty($imageslide) ): ?>                               
                            <img class="fluid-img img-logo-partner h-auto" src="<?php echo esc_url($imageslide['url']); ?>" alt="<?php echo esc_attr($imageslide['alt']); ?>" />                                  
                            <?php endif; ?>
                         <?php if($link): ?>
                        </a>
                       <?php endif; ?>
                    </div>
              <?php endwhile; ?>
            </div>
        <?php endif; ?> 
        <?php if (have_rows('slider_logos_list_3')) :  ?>
            <div class="slider-logos slider-logos-1 owl-carousel">
            <?php while (have_rows('slider_logos_list_3')) : the_row();      
                    $imageslide = get_sub_field('logo_slide3'); 
                    $link = get_sub_field('link_slide3'); ?>
                     <div class="item animated fadeIn">                                        
                        <?php if($link):
                        $link_url = $link['url'];
                        $link_title = $link['title'];
                        $link_target = $link['target'] ? $link['target'] : '_self';?>
                        <a  tabindex="0" aria-label="<?php echo $link_title; ?>" title="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" class="w-100 h-100"> <?php endif; ?>
                        <?php if( !empty($imageslide) ): ?>                               
                            <img class="fluid-img img-logo-partner h-auto" src="<?php echo esc_url($imageslide['url']); ?>" alt="<?php echo esc_attr($imageslide['alt']); ?>" />                                  
                            <?php endif; ?>
                         <?php if($link): ?>
                        </a>
                       <?php endif; ?>
                    </div>
              <?php endwhile; ?>
            </div>
        <?php endif; ?> 
      </div>
</section> 
<?php              
    endwhile;
endif; ?> 

