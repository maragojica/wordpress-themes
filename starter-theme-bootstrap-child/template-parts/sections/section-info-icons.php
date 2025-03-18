<?php 

if (have_rows('info_icons')) :          

    while (have_rows('info_icons')) : the_row();      

    $headline = get_sub_field('headline');

    $description = get_sub_field('description');

    $cta = get_sub_field('cta_button');  ?>



<section class="section-info-icons position-relative">
  
    <svg class="line-info-icons" xmlns="http://www.w3.org/2000/svg" width="1000" height="1128" viewBox="0 0 1000 1128" fill="none">
      <path d="M691.153 1127.33V1100.9C691.153 1045.67 646.382 1000.9 591.153 1000.9H100.497C45.2686 1000.9 0.49707 956.129 0.49707 900.9V567.085C0.49707 511.856 45.2686 467.085 100.497 467.085H899C954.228 467.085 999 422.313 999 367.085V-0.00390625" stroke="#C9E7E7"/>
    </svg>

    <svg class="line-info-icons tablet" width="576" height="1367" viewBox="0 0 576 1367" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M286.921 0.561279V0.561279C286.921 22.1611 304.431 39.6713 326.031 39.6713H515.38C548.517 39.6713 575.38 66.5342 575.38 99.6713V411.563C575.38 444.7 548.517 471.563 515.38 471.563H239.615C206.477 471.563 179.615 498.426 179.615 531.563V692.695C179.615 725.833 152.752 752.695 119.615 752.695H61.2929C28.1558 752.695 1.29297 779.558 1.29297 812.695V1051.98C1.29297 1085.12 28.1559 1111.98 61.293 1111.98H372.207C405.345 1111.98 432.208 1138.85 432.208 1171.98V1366.03" stroke="#C9E7E7"/>
    </svg>

    <div class="container">       

        <div class="head-info-icons">

            <?php if($headline): ?>

            <h2 class="cl-l-blue text-center"><?php echo $headline;?></h2>

            <?php endif; ?>

            <?php if($description): ?>

            <div class="dp-1 text-center cl-off-white"><?php echo $description;?></div>

            <?php endif; ?>

        </div>

        <?php if (have_rows('list_icons')) :  ?>

            <div class="list-icons">

                <?php  while (have_rows('list_icons')) : the_row();  

                $icon = get_sub_field('icon'); 

                $title = get_sub_field('title'); 

                $text = get_sub_field('text'); ?>

                  <div class="icons-box">

                  <?php if ( !empty($icon)) :  ?>                

                    <img class="icon-info" src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="100" height="100" />                            

                <?php endif; ?> 

                <?php if($title): ?>

                    <div class="title-info cl-teal text-center"><?php echo $title;?></div>

                <?php endif; ?>

                <?php if($text): ?>

                    <div class="text-info cl-teal text-center"><?php echo $text;?></div>

                <?php endif; ?>

                  </div>

                <?php endwhile; ?>

            </div>

        <?php endif; ?>     

        <?php if( $cta ):

        $link_url = $cta['url'];

        $link_title = $cta['title'];

        $link_target = $cta['target'] ? $cta['target'] : '_self'; ?>                            

            <a tabindex="0" class="btn-cta center-btn" data-wow-duration="0.8s" data-wow-delay="0.2s" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            

        <?php endif; ?>

    </div>

</section>     



<?php              

    endwhile;

endif; ?> 



