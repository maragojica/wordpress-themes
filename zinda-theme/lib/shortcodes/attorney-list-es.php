<?php

function attorneys_list_es($atts = null)
{

    ob_start();
    //BEGIN OUTPUT
    ?>
    <div class="team-members">
        <a href="<?= site_url('/es/perfiles-de-abogado/john-jack-zinda/') ?>" class="double-width"
           title="John C. (Jack) Zinda, Founder, Attorney">
            <img src="<?= CHILD_URL ?>/assets/app/img/images/new-attorney-jack-zinda.jpg" width="379" height="227"
                 alt="John C. (Jack) Zinda, Founder, Attorney" loading="lazy"/>
        </a>

        <?php if (have_rows('attorney_list_global_es', 'option')):
            while (have_rows('attorney_list_global_es', 'option')): the_row();
                $attName = get_sub_field('name', 'option');
                $attURL = get_sub_field('attorney_link', 'option');
                $attimg = get_sub_field('image', 'option');
                $attcity = get_sub_field('city', 'option');
                $attposition = get_sub_field('position', 'option');
                ?>

                <?php if (!empty($attimg)): ?>

                    <a href="<?php echo $attURL; ?>" title="<?php echo $attName; ?>"
                       class="<?php echo str_replace([' ', 'ñ'], ['-', 'n'], strtolower($attName)); ?> <?php if ($i > 6) {
                           echo "mobilehide";
                       } ?>">
                        <img src="<?php echo $attimg; ?>" width="180" height="190"
                             alt="<?php echo $attName; ?>, Attorney">
                        <p><?php echo $attName; ?></p>
                    </a>

                <?php endif; ?>
            <?php endwhile; endif; ?>
    </div>
    <?php
    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}


add_shortcode('attorneys-list-es', 'attorneys_list_es');