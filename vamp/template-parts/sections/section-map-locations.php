<?php 
    $headline = get_field('heading_locations'); 
    $list_column_1 = get_field('list_column_1'); 
    $list_column_2 = get_field('list_column_2');
    $map_shortcode = get_field('map_shortcode'); 
    $reverse_mobile = get_field('reverse_mobile_locations'); 
        ?>
        <section class="section-info-locations">
            <div class="container">
                <div class="flex row center-xs middle-xs <?php if($reverse_mobile): ?> mobile-reverse-xl<?php endif; ?>">                    
                    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 w-100 <?php if($reverse_mobile): ?> m-t2 mt-md-0 <?php endif; ?>">
                        <?php if ( $map_shortcode): ?>                           
                               <div class="locations-map w-100 animate__animated fadeLeft" data-animation="fadeLeft" data-duration="2s"><?php echo $map_shortcode;?></div>
                         <?php endif; ?>
                    </div>   
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 flex col text-column ps-lg-5">
                        <div class="text-column-inner animate__animated fadeRight" data-animation="fadeRight" data-duration="3s">
                            <?php if($headline): ?>
                                <h2 class="mb-30 cl-blue animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2s"><?php echo $headline; ?></h2>
                            <?php endif; ?> 
                           <div class="row">
                               <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <?php if($list_column_1): ?>
                                    <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                        <?php echo $list_column_1; ?>
                                    </div>
                                <?php endif; ?>    
                                </div>
                                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                                <?php if($list_column_2): ?>
                                    <div class="dp-1 mt-0 cl-dark animate__animated fadeBottom" data-animation="fadeBottom" data-duration="2.75s">
                                        <?php echo $list_column_2; ?>
                                    </div>
                                <?php endif; ?>    
                                </div>
                           </div>                             
                        </div>                                         
                    </div>                          
                </div>                    
          <div>
       </section>           
