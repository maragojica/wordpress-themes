<?php

function sidebar_form_shortcode($atts = null) {
    ob_start();
    //BEGIN OUTPUT
    ?>

    <div class="sidebar-form">
        <span class="contact-subtitle">
              <?php if (is_custom_locations('/es/')) { ?>
                  Contáctenos
              <?php } else if ((is_page("Zinda Law Group Make a Difference Scholarship"))) {
          ?> Scholarship  Form
           
        <?php } else { ?>
                  Contact Us
              <?php } ?>
        </span>
        <h2 class="center-line">
            <?php if (is_custom_locations('/es/')) { ?>
                OBTENGA SU CONSULTA <br>GRATUITA
            <?php }  else if ((is_page("Zinda Law Group Make a Difference Scholarship"))) {
          ?> MAKE A DIFFERENCE SCHOLARSHIP
           
        <?php } else {  ?>
                GET YOUR FREE CONSULTATION 
            <?php } ?>
            </h2>
        <?php
        if (is_custom_locations('/es/')) {
            echo do_shortcode('[contact-form-7 title="SideBar Contact Spanish"]');
        } else if ((is_page("Zinda Law Group Make a Difference Scholarship"))) {?>
        <div class="scholarship-form"><?
            echo do_shortcode('[contact-form-7 id="1673397" title="Make A Difference Scholarship"]');
           
        }else{
            echo do_shortcode('[contact-form-7 title="SideBar Contact"]');
        }
        ?>
        <span class="contact-dsc">
                                  <?php if (is_custom_locations('/es/')) { ?>
                                      Al enviar esta información, acepta ser contactado por Zinda Law Group a través de teléfono, mensaje de texto o correo electrónico. Se aplicarán las tarifas de mensajería estándar.
                                  <?php } else { ?>
                                      By submitting this information you agree to be contacted by Zinda Law Group via phone, text, or email. Standard messaging rates will apply.
                                  <?php } ?>
                            </span>
    </div>

    <?php
    //END OUTPUT (And actually output it!)
    $output = ob_get_contents();
    ob_end_clean();
    return  $output;
}

add_shortcode('sidebar-form', 'sidebar_form_shortcode');