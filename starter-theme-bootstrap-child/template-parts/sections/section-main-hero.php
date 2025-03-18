<?php 

if (have_rows('main_hero')) :          

    while (have_rows('main_hero')) : the_row();   

    $bg_video  = get_sub_field('backgroung_video');   

    $image_mobile  = get_sub_field('image_mobile');  

    $bg_color = get_sub_field('bacground_color');

    $headline = get_sub_field('headline');  

    $rotate_text = get_sub_field('rotate_text'); 

    $subheadline = get_sub_field('subheadline');

    $cta = get_sub_field('cta_button');  ?>



<section class="section-main-hero" <?php if($bg_color): ?> style="background-color: <?php echo $bg_color; ?>" <?php endif; ?>>
   

    <div class="contanet-main-hero">
		
		    <?php if ( !empty($image_mobile)) :  ?>                

			<img class="img-fluid show-lg" src="<?php echo esc_url($image_mobile['url']); ?>" alt="<?php echo esc_attr($image_mobile['alt']); ?>" width="992" height="558" />                           

			<?php endif; ?> 

        <?php if($bg_video){  ?> 

            <video id="featured-video" class="featured-video hide-lg" autoplay loop muted playsinline style="pointer-events: none;">

                <?php if($bg_video): ?>

                <source src="<?php echo $bg_video['url']; ?>" type="video/mp4">

                <?php endif; ?>

            </video>                     

        <?php } ?>

        <?php if($headline): ?>

        <div class="box-main-headline hide-lg">
            <?php echo $headline;?>   
            <?php if($rotate_text): ?>
                <div class="animate-text">                
                    <?php echo $rotate_text;?>               
                </div> 
            <?php endif; ?>           
           <!--<div class="type-text"> <div class="text"></div>  </div>-->
        </div>

        <?php endif; ?>

        <?php if($subheadline): ?>

        <div class="box-main-subheadline hide-lg"><?php echo $subheadline;?></div>

        <?php endif; ?>

    </div>

    <?php if( $cta ):

        $link_url = $cta['url'];

        $link_title = $cta['title'];

        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            

            <a tabindex="0" class="btn-cta center-btn" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            

        <?php endif; ?>

   

</section>     



<?php              

    endwhile;

endif; ?> 



