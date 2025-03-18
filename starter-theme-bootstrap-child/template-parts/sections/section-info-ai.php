<?php 
$titlesection = get_the_title();
$main_title = get_field('main_title'); 
$main_description = get_field('main_description'); ?>
    <section class="section-services section-services-ai">
       <div class="container-fluid pt-5 pb-1 pb-md-5">
            <div class="row">
                <div class="col-md-12 pt-5 pb-5 pt-lg-0 pb-lg-0">
                    <?php if($titlesection): ?>
                        <h1 class="title-section cl-l-blue text-center"><?php echo $titlesection;?></h1>
                     <?php endif; ?> 
                </div>
            </div>   
            <?php if($main_title || $main_description): ?>
                <div class="row justify-content-center">
                   <div class="col-md-12 col-lg-10 pb-5">
                      <div class="box-main-services">
                          <?php if($main_title): ?>
                              <div class="title-main-services mb-lg-4 mb-2"><?php echo $main_title;?></div>
                           <?php endif; ?> 
                           <?php if($main_description): ?>
                              <div class="descr-main-services"><?php echo $main_description;?></div>
                           <?php endif; ?> 
                      </div>
                   </div>
                </div>
            <?php endif; ?>         
       </div>
    </section>


