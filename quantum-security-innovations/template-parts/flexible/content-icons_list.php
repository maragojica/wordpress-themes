<?php $section_id = get_sub_field('section_id');
 $heading = get_sub_field('heading');
    $subheadline = get_sub_field('subheading'); 
    $bg_color = get_sub_field('bg_section_color'); 
    $add_padding_top = get_sub_field('add_padding_top'); 
    $add_padding_bottom = get_sub_field('add_padding_bottom'); 
    $columns = get_sub_field('columns_number');  
    $columnsnumber = "col-lg-12";
            switch ($columns['value']) {
                case "two":
                    $columnsnumber = "col-md-6";
                    break;
                case "three":
                    $columnsnumber = "col-md-6 col-lg-4";
                    break;
                case "four":
                    $columnsnumber = "col-md-6 col-lg-3";
                    break;                    
                case "five":
                    $columnsnumber = "col-md-6 col-lg";
                    break;
            }?>
<section class="section-icons<?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>" <?php if($bg_color ): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?> <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>            
    <div class="container flex col middle-xs center-xs p-md-t2 p-md-b2"> 
        <?php if($heading || $subheadline): ?>
        <div class="row center-xs w-100 m-b3">                    
            <div class="col-xs-12 col-lg-7">                        
                <?php if($subheadline): ?>
                    <span class="subheading cl-green text-uppercase mt-0 m-0 animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo $subheadline; ?></span>
                <?php endif; ?> 
                <?php if ($heading) : ?>
                    <h2 class="section-title text-uppercase cl-black mt-0 mb-0 animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $heading; ?></h2>
                <?php endif; ?>   
            </div>
        </div>
        <?php endif; ?>
        <div class="values-row w-100 row center-xs">
            <?php 
            if (have_rows('list')):  $animation_delay = 1;
            while (have_rows('list')): the_row(); 
                $icon = get_sub_field('icon_list');
                $heading = get_sub_field('title_list'); 
                $description = get_sub_field('text_list'); 
                $cta = get_sub_field('link'); 
                $duration = $animation_delay . 's'; ?>
                <div class="col-xs-12 <?php echo $columnsnumber;?> col-icons p-b2 animate__animated" data-animation="fadeBottom" data-duration="<?php echo esc_attr($duration); ?>">
                    <div class="values-col w-100 h-100 pe-xl-3 ps-xl-3">
                         <div class="values-header">
                         <?php if ( !empty($icon)) : ?>      
                            <?php if( $cta ):
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                        <?php endif; ?>           
                        <img class="icon-values" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="80" heigth="80" />      
                        <?php if( $cta ):    ?>
                        </a>
                        <?php endif; ?>                         
                    <?php endif; ?>  
                        <h3 class="text-uppercase cl-black">
                        <?php if( $cta ):
                        $link_url = $cta['url'];
                        $link_title = $cta['title'];
                        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>
                        <a tabindex="0" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                        <?php endif; ?> 
                        <?php echo $heading; ?>
                        <?php if( $cta ):    ?>
                        </a>
                        <?php endif; ?>    
                        </h3>
                         </div>
                        <?php if ($description) : ?>
                        <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="2s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?> 
                    </div>                       
                </div>
            <?php $animation_delay += 0.75; endwhile; 
            endif;?>
        </div>       
    </div> 
</section>
   
