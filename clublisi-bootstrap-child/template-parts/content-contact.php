<?php
/**
 * The template for displaying content in the page-contact.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $image_contact_page = get_field('image_contact_page');
$title_contact_page = get_field('title_contact_page');
$subtitle_contact_page = get_field('subtitle_contact_page');
$text_contact_page = get_field('text_contact_page');
$phone_contact_page = get_field('phone_contact_page');
$email_contact_page = get_field('email_contact_page');
$shortcode_contact_page = get_field('shortcode_contact_page');
if ( !empty($image_contact_page)) : ?>
   <section class="section-banner">
       <div class="section-contact position-relative m-md-5 m-3">
           <?php if ( !empty($image_contact_page)) : ?>
               <img class="img-fluid fit-cover-center-top w-100 h-100" width="1618" height="559" src="<?php echo esc_url($image_contact_page['url']); ?>" alt="<?php echo esc_attr($image_contact_page['alt']); ?>" />
           <?php endif; ?>
           <div class="overlay overlay-banner d-flex align-items-center justify-content-center">
               <div class="container">
                   <div class="row justify-content-center">
                       <div class="col-md-6">
                           <?php if($title_contact_page): ?>
                               <div class="headline text-center cl-white pb-3"><?php echo $title_contact_page;?></div>
                           <?php endif; ?>
                           <?php if($subtitle_contact_page): ?>
                               <div class="title-banner cl-white"><?php echo $subtitle_contact_page;?></div>
                           <?php endif; ?>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
<?php endif; ?>
<section class="section-info-contact pt-5 pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 col-lg-9">
                <div class="row">
                    <div class="col-md-6 col-lg-8 pe-md-5 position-relative col-contact-r">
                        <?php if ( $text_contact_page ):  ?>
                            <div class="dp-1 cl-dark pt-lg-4 pt-2"><?php echo $text_contact_page;?></div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 col-lg-4 ps-md-5">
                        <?php if($phone_contact_page) {
                            $link_url = $phone_contact_page['url'];
                            $link_title = $phone_contact_page['title'];
                            $link_target = $phone_contact_page['target'] ? $phone_contact_page['target'] : '_self';?>
                            <a class="link-phone d-flex justify-content-start align-items-end" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><span class="pe-2">PH // </span> <?php echo $link_title;?></a>
                        <?php } ?>
                        <?php if($email_contact_page) {
                            $link_url = $email_contact_page['url'];
                            $link_title = $email_contact_page['title'];
                            $link_target = $email_contact_page['target'] ? $email_contact_page['target'] : '_self';?>
                            <a class="link-email d-flex justify-content-start align-items-end mt-3" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><span class="pe-2">EM // </span> <?php echo $link_title;?></a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <?php if($shortcode_contact_page): ?>
                <div class="col-md-8 pt-5">
                    <div class="box-contact pt-md-5"><?php echo $shortcode_contact_page; ?></div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
</article>
<!-- #post-## -->