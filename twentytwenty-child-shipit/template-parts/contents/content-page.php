<?php
/**
 * Displays the content when the default page template is used.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<section class="section-decription-single bg-white wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
     <div class="container">
         <div class="row justify-content-center">
             <div class="col-md-12">
                 <h2 class="headline-section cl-ultra-violet text-center pb-5"><?php the_title(); ?></h2>
                 <div class="copy-description cl-black pb-5">
                 <?php the_content(); ?>
                 </div>
             </div>
         </div>
     </div>
</section>