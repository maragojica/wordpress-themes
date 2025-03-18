<?php
//Template name: Page FAQ

get_header();
?>
<div class="investors">
    <section id="hero" style="background:url(/wp-content/uploads/2022/05/hero-investors.jpg) no-repeat !important;background-size: cover!important;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    <h1 class="headline-hero"><?php the_title(); ?></h1>
                </div>
                <div class="col-md-5"> 
                    
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-lg-12">
                <nav class="breadcrumb">
                <?php if(function_exists('bcn_display'))
                    {
                        bcn_display();
                    }?>
                </nav>
            </div>
        </div>
        <div class="row intro">
            <div class="col-lg-12">
                <?php the_content(); ?>
            </div>
        </div>
        
    </section>
    
    <?php get_template_part( 'footer-investors' ); ?>
    
</div>

<?php

get_footer();

?>
