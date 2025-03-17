<?php $info_note = get_field('info_note');
if($info_note): ?>
<section class="section-info-note p-t0 p-b0">
    <div class="container">
        <div class="row center-xs">
           <div class="col-xs-12 col-lg-6 text-center">
           <?php if ($info_note) : ?>
                        <div class="dp-1 m-b30 cl-slate wow fadeInUp" data-wow-duration="0.7s" data-wow-delay="0.2s"><?php echo wp_kses_post($info_note); ?></div>
                    <?php endif; ?> 
           </div>
        </div>
    </div>
</section>
<?php endif; ?>