      <?php
            $id_section_about = get_sub_field('section_id_where_we_are');
            $title_section_about_info = get_sub_field('title_where_we_are');
            $subtitle_where_we_are = get_sub_field('subtitle_where_we_are');
            $description_section_about_info = get_sub_field('text_where_we_are');          
            $bg_color_section = get_sub_field('bg_color_section');
            $bg_graphic = get_sub_field('bg_image');
        ?>
        <section class="section-about-info pt-5 pb-lg-5" <?php if($id_section_about): ?>id="<?php echo $id_section_about;?>" <?php endif; ?>  <?if($bg_color_section && !empty($bg_graphic)): ?>style="background: linear-gradient(<?php echo $bg_color_section;?>, <?php echo $bg_color_section;?>), url('<?php echo esc_url($bg_graphic['url']); ?>') center center no-repeat;" <?php endif; ?>>
            <div class="container pt-lg-5 pb-lg-5">
                <div class="row pt-lg-5">
                    <div class="col-lg-12">
                        <?php if($title_section_about_info): ?>
                        <h2 class="cl-white text-uppercase pe-md-4 pe-lg-5 link-text mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_section_about_info; ?></h3>
                        <?php endif; ?>  
                        <?php if($subtitle_where_we_are): ?>
                            <div class="dp-1 cl-white mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $subtitle_where_we_are;?></div>
                        <?php endif; ?>   
                        <?php if($description_section_about_info): ?>
                            <div class="dp-1 cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.4s"><?php echo $description_section_about_info;?></div>
                        <?php endif; ?>                  
                    </div>  
                </div>            
            </div>
    </section>
       