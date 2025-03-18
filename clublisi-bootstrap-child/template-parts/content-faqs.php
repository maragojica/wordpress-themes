<?php
/**
 * The template for displaying content in the page-faqs.php template.
 *
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php $title_page = get_field('title_page_faqs');
$title_modal = get_field('title_modal_faqs');
if( have_rows('list_faqs') ): ?>
    <section class="section-services pt-5 pb-5">
        <div class="container position-relative pt-md-5">
            <?php if($title_page): ?>
                <div class="title-services title-faqs d-flex align-items-center"><?php echo $title_page;?></div>
            <?php endif; ?>
            <div class="row justify-content-center row-list-faqs">
            <?php $i = 1; while ( have_rows('list_faqs') ) : the_row();
                $number = get_sub_field('number_faq');
                $question = get_sub_field('question');
                $answer = get_sub_field('answer');?>
                <div class="col-md-12 pt-md-5 pt-3 pb-3 pb-md-2 col-services pe-0 ps-0">
                    <?php if($number): ?>
                        <div class="number"><?php echo $number;?></div>
                    <?php endif; ?>
                    <?php if($question): ?>
                        <div class="dp-1 cl-dark d-flex justify-content-between align-items-center pe-md-4">
                            <a class="link-modal-faqs cl-dark text-decoration-none" href="#modal-faqs-<?php echo $i;?>" uk-toggle>
                                <i><?php echo $question;?></i>
                            </a>
                            <div class="se-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 411.79 271.53"><path d="M299.95 9.95c-5.42-6.39-15.02-7.18-21.44-1.74-6.4 5.44-7.19 15.04-1.74 21.44l76.61 90.17H22.22c-8.41 0-15.22 6.81-15.22 15.22s6.81 15.22 15.22 15.22h331.15l-76.61 90.19c-5.45 6.4-4.67 16 1.74 21.44 2.87 2.44 6.36 3.63 9.84 3.63 4.32 0 8.6-1.83 11.61-5.36l106.3-125.11-106.3-125.1z"></path></svg></div>
                        </div>
                    <?php endif; ?>
                </div>
                <div id="modal-faqs-<?php echo $i;?>" class="uk-modal-full modals-faqs" uk-modal>
                    <div class="uk-modal-dialog h-100">
                        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
                        <div class="uk-grid-collapse pt-5" uk-grid>
                            <div class="container pt-5 pb-5 position-relative">
                                <?php if($title_modal): ?>
                                    <div class="title-modal cl-white d-flex align-items-center"><?php echo $title_modal;?></div>
                                <?php endif; ?>
                                <?php if($number): ?>
                                    <div class="number cl-white pt-4 ps-4"><?php echo $number;?></div>
                                <?php endif; ?>
                                <?php if($question): ?>
                                    <div class="dp-1 cl-white ps-4 position-relative text-question-modal"><i><?php echo $question;?></i></div>
                                <?php endif; ?>
                                <?php if($answer): ?>
                                    <div class="dp-3 cl-white pt-md-5 pt-4 ps-4"><?php echo $answer;?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php $i++; endwhile; ?>
            </div>
        </div>
    </section>
<?php endif; ?>
    <?php  $cta_1_praise = get_field('cta_1_faqs'); $cta_2_praise = get_field('cta_2_faqs'); ?>
    <section class="section-bottom-faqs pt-5 pb-5">
        <div class="container pt-5 pb-5">
            <div class="row row-bottom-praise">
                <div class="col-6">
                    <?php if($cta_1_praise) {
                        $link_url = $cta_1_praise['url'];
                        $link_title = $cta_1_praise['title'];
                        $link_target = $cta_1_praise['target'] ? $cta_1_praise['target'] : '_self';?>
                        <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                            <div class="line-cta"></div>
                        </a>
                    <?php } ?>
                </div>
                <div class="col-6">
                    <?php if($cta_2_praise) {
                        $link_url = $cta_2_praise['url'];
                        $link_title = $cta_2_praise['title'];
                        $link_target = $cta_2_praise['target'] ? $cta_2_praise['target'] : '_self';?>
                        <a class="link-post d-flex justify-content-center flex-column align-items-center text-center" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>" aria-label="<?php echo $link_title; ?>"><?php echo $link_title;?>
                            <div class="line-cta"></div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>
</article>
<!-- #post-## -->