  <?php 
        $title_video = get_sub_field('title_video');
        $text_video = get_sub_field('text_video');       
        $iframeyoutube = get_sub_field('iframe_youtube');      
        $section_id_video = get_sub_field('section_id_video');
        $bgcolor = get_sub_field('bg_color_section'); ?>                   
        <section class="section-video pt-5 pb-5" <?php if($section_id_video): ?>id="<?php echo $section_id_video; ?>" <?php endif; ?> <?php if($bgcolor): ?> style="background-color: <?php echo $bgcolor;?>;" <?php endif; ?>>
            <div class="container pt-lg-5 pb-lg-5">
                <div class="row pt-lg-5 pb-lg-5 pb-4">
                    <div class="col-md-12">
                        <?php if($title_video): ?>
                                <h2 class="cl-white text-uppercase mb-4 wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s"><?php echo $title_video;?></h2>
                        <?php endif; ?>
                        <?php if($text_video): ?>
                            <div class="dp-1 cl-white wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $text_video;?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="container-fluid container-fluid-center pb-lg-5">
                <div class="row pb-lg-5 pb-0">
                    <div class="col-md-12">
                    <?php if($iframeyoutube): ?>
                    <div class="frame-youtube">
                        <?= $iframeyoutube; ?>    
                    </div>   
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            </section>