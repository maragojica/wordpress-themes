<?php
/**
 * The template for displaying content in the single.php template.
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="section-single">
       <div class="container-fluid pt-5 pb-5">
            <div class="row">
                <div class="col-md-12 pt-5 pb-5">                   
                      <h1 class="title-section cl-l-blue text-center"><?php the_title(); ?></h1>
                </div>
            </div>
            <div class="content-services">          
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="box-info-single">                       
                        <div class="desc-service"><?php echo the_content();?></div>
                    </div>
                </div>
            </div>           
           
           </div>
       </div>
    </section>		
</article><!-- /#post-<?php the_ID(); ?> -->
