<?php
/**
 * The template for displaying content in the page-about.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $title_page = get_field('title_page');
if($title_page): ?>
    <section class="section-title-page pt-5">
        <div class="container pt-md-5 pb-md-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h2 class="headline text-center"><?php echo $title_page;?></h2>
                </div>
            </div>
        </div>
    </section>
 <?php endif; ?>
 <?php $intro_title = get_field('intro_title');
 $intro_text = get_field('intro_text');
 $year_intro = get_field('year_intro'); ?>
   <section class="section-intro pb-md-5">
       <div class="container ps-lg-5 pe-lg-5">
           <?php if($intro_title): ?>
               <div class="row row-intro">
                   <div class="col-md-12 px-md-5">
                       <div class="intro-title pb-2"><?php echo $intro_title;?></div>
                   </div>
               </div>
           <?php endif; ?>
           <div class="row">
               <div class="col-md-5 col-lg-4 px-md-5 pt-lg-5 pt-4">
                   <?php if ( $intro_text ):  ?>
                       <div class="dp-1 cl-dark pt-lg-4 pt-2"><?php echo $intro_text;?></div>
                   <?php endif; ?>
               </div>
               <div class="col-md-7 col-lg-8 px-md-4 pt-lg-5 pt-4 pb-4 col-r-home">
                   <div class="box-about px-lg-5 px-md-4 pt-4 pt-md-0">
                       <?php if($year_intro): ?>
                           <div class="intro-title text-end"><?php echo $year_intro;?></div>
                       <?php endif; ?>
                       <?php if( have_rows('intro_slider') ): ?>
                           <div class="slider-intro owl-carousel mt-3 mb-3">
                           <?php while ( have_rows('intro_slider') ) : the_row();
                               $slide_image = get_sub_field('image_slider'); ?>
                               <div class="item animated fadeIn item-timeline">
                                   <div class="box-intro-slider w-100">
                                       <?php if ( !empty($slide_image)) : ?>
                                           <img class="img-fluid fit-cover-center w-100 h-100" width="702" height="634" src="<?php echo esc_url($slide_image['url']); ?>" alt="<?php echo esc_attr($slide_image['alt']); ?>" />
                                       <?php endif; ?>
                                   </div>
                               </div>
                           <?php endwhile; ?>
                           </div>
                       <?php endif; ?>
                       <?php
                       $cta_intro = get_field('cta_intro');
                       if($cta_intro) {
                           $link_url = $cta_intro['url'];
                           $link_title = $cta_intro['title'];
                           $link_target = $cta_intro['target'] ? $cta_intro['target'] : '_self';?>
                           <a class="link-post d-flex justify-content-start" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> <div class="se-icon ps-2"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div></a>
                       <?php } ?>
                   </div>
               </div>
           </div>
       </div>
   </section>
    <?php
    $title_team = get_field('title_team');
    $subtitle_team = get_field('subtitle_team'); ?>
    <section class="section-team pt-5 pb-5 position-relative">
        <div class="container mt-md-5 position-relative">
        <?php if($title_team || $subtitle_team): ?>
            <div class="title-team d-flex align-items-center"><?php echo $title_team;?><span><?php echo $subtitle_team;?></span></div>
        <?php endif; ?>
         <?php  if( have_rows('list_team') ): ?>
        <?php while ( have_rows('list_team') ) : the_row();
            $number_list_team = get_sub_field('number_list_team');
            $name_list_team = get_sub_field('name_list_team');
            $position_list_team = get_sub_field('position_list_team');
            $photo_list_team = get_sub_field('photo_list_team');
            $phone = get_sub_field('phone_list_team');
            $email = get_sub_field('email_list_team');
            $linkedin = get_sub_field('linkedin_list_team');
            $info_1_list_team = get_sub_field('info_1_list_team');
            $info_2_list_team = get_sub_field('info_2_list_team');?>
            <div class="row equal pb-5">
                <?php if ( !empty($slide_image)) : ?>
                    <div class="col-md-5 col-lg-4 pb-4">
                        <div class="h-100 w-100 position-relative box-photo-team">
                            <?php if($number_list_team): ?><div class="number-team"><?php echo $number_list_team;?></div><?php endif; ?>
                            <img class="photo-team img-fluid fit-cover-center w-100 h-100" width="290" height="470" src="<?php echo esc_url($photo_list_team['url']); ?>" alt="<?php echo esc_attr($photo_list_team['alt']); ?>" />
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($name_list_team || $position_list_team || $info_1_list_team): ?>
                    <div class="col-md col-lg pb-4 hide-md">
                        <div class="w-100 h-100">
                            <?php if($name_list_team): ?><h2><?php echo $name_list_team;?></h2><?php endif; ?>
                            <?php if($position_list_team): ?><div class="position-team"><?php echo $position_list_team;?></div><?php endif; ?>
                            <?php if ( $info_1_list_team ):  ?>
                                <div class="dp-1 cl-dark pt-lg-5 pt-3"><?php echo $info_1_list_team;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if($info_2_list_team): ?>
                    <div class="col-md col-lg pb-4 hide-md">
                        <div class="w-100 h-100">
                            <?php if ( $info_2_list_team ):  ?>
                                <div class="dp-1 cl-dark pt-5"><?php echo $info_2_list_team;?></div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="col-md-12 pb-5">
                    <div class="box-contact-items d-flex">
                        <div class="phone box-contact-team d-flex justify-content-between align-items-center me-md-4 mb-4">
                            <span class="title-contact-team">phone</span>
                            <?php if($phone) {
                                $link_url = $phone['url'];
                                $link_title = $phone['title'];
                                $link_target = $phone['target'] ? $phone['target'] : '_self';?>
                                <a class="link-contact-team" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> </a>
                            <?php } ?>
                        </div>
                        <div class="email box-contact-team d-flex justify-content-between align-items-center me-md-4 mb-4">
                            <span class="title-contact-team">email</span>
                            <?php if($email) {
                                $link_url = $email['url'];
                                $link_title = $email['title'];
                                $link_target = $email['target'] ? $email['target'] : '_self';?>
                                <a class="link-contact-team" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> </a>
                            <?php } ?>
                        </div>
                        <div class="linkedin box-contact-team d-flex justify-content-between align-items-center">
                            <span class="title-contact-team">linkedin</span>
                            <?php if($linkedin) {
                                $link_url = $linkedin['url'];
                                $link_title = $linkedin['title'];
                                $link_target = $linkedin['target'] ? $linkedin['target'] : '_self';?>
                                <a class="link-contact-team" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?> </a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
        <?php endif; ?>
         <?php $title_avengers = get_field('title_avengers');
          $subtitle_avengers = get_field('subtitle_avengers');
         $icon_avengers = get_field('icon_avengers');?>
            <div class="row equal box-contact-items">
                <div class="col-md-12">
                    <?php if($title_avengers): ?>
                        <h2><?php echo $title_avengers;?></h2>
                    <?php endif; ?>
                    <?php if($subtitle_avengers): ?>
                        <div class="dp-1 cl-dark pt-1"><?php echo $subtitle_avengers;?></div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row equal pt-4 position-relative box-contact-items row-avengers">
                <?php if ( !empty($icon_avengers)) : ?>
                    <img class="icon-avengers" width="75" height="51" src="<?php echo esc_url($icon_avengers['url']); ?>" alt="<?php echo esc_attr($icon_avengers['alt']); ?>" />
                <?php endif; ?>
            <?php  if( have_rows('list_avengers') ): ?>
                <div class="col-lg-6 col-avenger-l">
                    <?php while ( have_rows('list_avengers') ) : the_row();
                        $name_list_avengers = get_sub_field('name_list_avengers');
                        $position_list_avengers = get_sub_field('position_list_avengers');
                        $phone_list_avengers = get_sub_field('phone_list_avengers');?>
                        <div class="phone box-contact-team d-flex justify-content-between align-items-start align-items-lg-center flex-column flex-lg-row me-md-4 mb-4 w-100">
                            <?php if($name_list_avengers): ?><span class="title-contact-team"><?php echo $name_list_avengers;?></span><?php endif; ?>
                            <?php if($phone_list_avengers) {
                                $link_url = $phone_list_avengers['url'];
                                $link_title = $phone_list_avengers['title'];
                                $link_target = $phone_list_avengers['target'] ? $phone_list_avengers['target'] : '_self';?>
                                <a class="link-contact-team" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $position_list_avengers;?> </a>
                            <?php } ?>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
                <?php  if( have_rows('list_avengers_2') ): ?>
                    <div class="col-lg-6 col-avenger-r">
                        <?php while ( have_rows('list_avengers_2') ) : the_row();
                            $name_list_avengers = get_sub_field('name_list_avengers2');
                            $position_list_avengers = get_sub_field('position_list_avengers2');
                            $phone_list_avengers = get_sub_field('phone_list_avengers2');?>
                            <div class="phone box-contact-team d-flex justify-content-between align-items-start align-items-lg-center flex-column flex-lg-row me-md-4 mb-4 w-100">
                                <?php if($name_list_avengers): ?><span class="title-contact-team"><?php echo $name_list_avengers;?></span><?php endif; ?>
                                <?php if($phone_list_avengers) {
                                    $link_url = $phone_list_avengers['url'];
                                    $link_title = $phone_list_avengers['title'];
                                    $link_target = $phone_list_avengers['target'] ? $phone_list_avengers['target'] : '_self';?>
                                    <a class="link-contact-team" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $position_list_avengers;?> </a>
                                <?php } ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php $image_banner_bottom = get_field('image_banner_bottom');
    $title_banner_bottom = get_field('title_banner_bottom');
    $text_banner_bottom = get_field('text_banner_bottom');
    $cta_banner_bottom = get_field('cta_banner_bottom');
    if ( !empty($image_banner_bottom)) : ?>
       <section class="section-banner">
           <div class="section-banner-info position-relative m-md-5 m-3">
               <?php if ( !empty($image_banner_bottom)) : ?>
                   <img class="img-fluid fit-cover-center-top w-100 h-100" width="1618" height="559" src="<?php echo esc_url($image_banner_bottom['url']); ?>" alt="<?php echo esc_attr($image_banner_bottom['alt']); ?>" />
               <?php endif; ?>
               <div class="overlay overlay-banner d-flex align-items-center justify-content-center">
                   <div class="container">
                       <div class="row justify-content-center">
                           <div class="col-md-6">
                               <?php if($title_banner_bottom): ?>
                                   <div class="title-banner cl-white pb-5"><?php echo $title_banner_bottom;?></div>
                               <?php endif; ?>
                               <?php if($text_banner_bottom): ?>
                                   <div class="headline text-center cl-white"><?php echo $text_banner_bottom;?></div>
                               <?php endif; ?>
                               <?php
                               if($cta_banner_bottom) {
                                   $link_url = $cta_banner_bottom['url'];
                                   $link_title = $cta_banner_bottom['title'];
                                   $link_target = $cta_banner_bottom['target'] ? $cta_banner_bottom['target'] : '_self';?>
                                   <a class="link-post link-line d-flex justify-content-center cl-white" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?></a>
                               <?php } ?>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
    <?php endif; ?>
</article>
<!-- #post-## -->