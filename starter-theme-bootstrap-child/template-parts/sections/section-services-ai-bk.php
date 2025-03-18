<?php 
$title_services = get_field('title_services');  ?>
    <section class="section-services-ai">
       <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if($title_services): ?>
                        <div class="title-section-service cl-orange text-center"><?php echo $title_services;?></div>
                     <?php endif; ?> 
                </div>
            </div> 
            <?php if (have_rows('list_services')) :  ?>
                <div class="equal row row-services-ai">
                <?php  while (have_rows('list_services')) : the_row();  
                 $title_services = get_sub_field('title_services'); 
                 $subtitle_services = get_sub_field('subtitle_services'); 
                 $description_services = get_sub_field('description_services');  ?>
                   <div class="col-md-6 col-lg-4">
                      <div class="box-ai w-100 h-100">
                          <?php if($title_services): ?>
                            <div class="title-ai"><?php echo $title_services;?></div>
                           <?php endif; ?> 
                           <?php if($subtitle_services): ?>
                            <div class="subtitle-ai mb-2 mb-md-4"><?php echo $subtitle_services;?></div>
                           <?php endif; ?> 
                           <?php if($description_services): ?>
                            <div class="descr-ai"><?php echo $description_services;?></div>
                           <?php endif; ?> 
                      </div>
                   </div>
                <?php endwhile; ?>
                </div>
            <?php endif; ?>
       </div>
    </section>


