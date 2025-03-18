<section class="module module-block-donors pt-5 pb-5" <?php if(get_sub_field('section_id_donors')):?>id="<?php the_sub_field('section_id_donors'); ?>" <?php endif; ?>>

    <div class="container pb-md-5">

        <?php $title = get_sub_field('title_section_donors');

        if($title):?>

            <div class="row wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">

                <div class="col-md-12 pb-md-5 pb-4 wow fadeInUp ">

                    <div class="title-section position-relative"><?php echo $title; ?></div>

                </div>

            </div>

        <?php endif; ?>

     </div>

    <?php if( have_rows('donors_list_donors') ): ?>

        <div class="container-fluid pe-0">

            <div class="slider-donors owl-carousel">

                <?php while ( have_rows('donors_list_donors') ) : the_row();

                    $text = get_sub_field('donors_info');  ?>

                    <div class="item h-100 animated fadeIn item-icon" data-dot="<button class='slide-donor'></button>">

                        <?php if($text): ?>

                            <div class="donors-text cl-black">

                                <?php echo $text; ?>

                            </div>

                        <?php endif; ?>

                    </div>

                <?php endwhile; ?>

            </div>

        </div>

    <?php endif; ?>

   <div class="container pt-5">

       <?php $text = get_sub_field('info_section_donors');

       if($text):?>

           <div class="row">

               <div class="col-md-12">

                   <div class="dp-1 dp-3 cl-grey p-grey-under"><?php echo $text; ?></div>

               </div>

           </div>

       <?php endif; ?>

       <div class="row">

           <div class="col-lg-12 pt-5">

               <div class="divide"></div>

           </div>

       </div>

   </div>

</section>

