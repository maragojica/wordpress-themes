<?php
/**
 * The template for displaying content in the page-contact.php template.
 *
 */

?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section class="section-contact section-inside bg-new-blue">
        <div class="container pt-md-5 pt-4 pb-md-5 pb-3">
            <div class="row">
                <div class="col-md-5 col-lg-4 pe-lg-5 pb-md-0 pb-4">
                    <?php $title_page_contact = get_field('title_page_contact');
                    if($title_page_contact): ?>
                    <h3 class="cl-dark-ocean text-md-start text-center"><?php echo $title_page_contact;?></h3>
                    <?php endif; ?>
                    <div class="dp-2 cl-black pt-md-5 pt-3 text-md-start text-center"><?php echo the_content();?></div>
                </div>
                <?php $contact_form_info = get_field('contact_form_info');
                if($contact_form_info): ?>
                    <div class="col-md col-lg ps-lg-5">
                        <div class="w-100 h-100 box-contact dp-2"><?php echo $contact_form_info;?></div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->