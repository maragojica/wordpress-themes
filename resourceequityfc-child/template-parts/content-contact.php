<?php
/**
 * Displays the content when the contact template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<div class="section-contact-page section-p60">
    <div class="container">
        <div class="row row-info m-auto">
            <div class="col-md-4">
               <?php $title = get_field('title_contact_page');
               $subtitle = get_field('subtitle_contact_page');
               $subtitlemv = get_field('subtitle_mv_contact_page');
               $text = get_field('text_contact_page');?>
                <?php if( $title ): ?>
                    <h2 class="title-section text-uppercase cl-light-blue"><?php echo $title;?></h2>
                <?php endif; ?>
                <?php if( $subtitle ): ?>
                    <div class="copy-text cl-dark pt-4 d-flex justify-content-between">
                        <p class="hide-md"><?php echo $subtitle;?></p>
                    <?php if( $subtitlemv ): ?>
                        <p class="show-md"><?php echo $subtitlemv;?></p>
                    <?php endif; ?>
                        <img class="arrow-contact-page show-md" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-blue-down.png">
                    </div>
                <?php endif; ?>
                <div class="d-flex justify-content-end hide-md">
                    <img class="arrow-contact-page" src="<?php echo get_stylesheet_directory_uri(); ?>/assest/arrow-blue.png">
                </div>

                <?php if( $text ): ?>
                    <div class="copy-info cl-dark-2 pt-4 hide-md"><?php echo $text;?></div>
                <?php endif; ?>
            </div>
            <div class="col-md">
                <div class="box-contact-page">
                    <?php echo do_shortcode('[contact-form-7 id="171" title="Contact Form"]'); ?>
                </div>
            </div>
            <div class="col-md-12 show-md">
                <?php if( $text ): ?>
                    <div class="copy-info cl-dark-2 pt-4 mt-4 mr-4 ml-4"><?php echo $text;?></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>