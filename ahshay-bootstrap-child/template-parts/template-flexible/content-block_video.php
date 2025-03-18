 <?php $video_intro_headline = get_sub_field('video_intro_headline');
    $video_intro_description = get_sub_field('video_intro_description');   
    $section_id = get_sub_field('section_id');
    $iframeyoutube = get_sub_field('iframe_youtube');
?>
<section class="video_intro pt-lg-5 pb-lg-5 bg-dark-brown" <?php if($section_id): ?> id="<?php echo $section_id; ?>" <?php endif; ?>>
    <div class="container">
        <div class="row pt-5 pb-lg-5">
            <div class="col-md-12">
                <?php if($video_intro_headline): ?>
                    <h3 class="cl-white mb-4"><?php echo $video_intro_headline;?></h3>
                <?php endif; ?>
                <?php if($video_intro_description): ?>
                    <div class="dp-1 cl-white"><?php echo $video_intro_description;?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="container-fluid container-fluid-center pb-5">
        <div class="row">
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
    