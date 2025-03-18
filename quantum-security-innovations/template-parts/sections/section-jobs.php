<?php if ( have_rows( 'job_openings' ) ):  
    while( have_rows('job_openings') ): the_row();  
    $heading = get_sub_field('heading');    
    $description = get_sub_field('description');  
    $bg_color = get_sub_field('bg_color'); 
    $add_padding_top = get_sub_field('add_padding_top'); 
    $add_padding_bottom = get_sub_field('add_padding_bottom');?>
    <section class="section-job-oppening <?php if( !$add_padding_top ): ?> p-t0<?php endif; ?> <?php if( !$add_padding_bottom ): ?> p-b0<?php endif; ?>" <?php if($bg_color ): ?>style="background-color: <?php echo $bg_color;?>" <?php endif; ?> >
        <div class="container">
            <?php if ($heading) : ?>
            <div class="row center-xs">                    
                <div class="col-xs-12 col-lg-7">  
                    <h2 class="section-title text-uppercase cl-black mt-0 mb-10px animate__animated" data-animation="fadeBottom" data-duration="1s"><?php echo esc_html($heading); ?></h2>    
                    <?php if ($description) : ?>
                        <div class="dp-1 dp-2 cl-black animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo wp_kses_post($description); ?></div>
                    <?php endif; ?>                               
                </div>
            </div>
            <?php endif; ?>      
            <?php $i = 1; if ( have_rows( 'jobs_list' ) ):  ?>
                <div class="row center-xs m-t1">                    
                   <div class="col-xs-12 col-lg-9"> 
                    <div class="accordeon-content animate__animated" data-animation="fadeBottom" data-duration="2s">
                    <?php while( have_rows('jobs_list') ): the_row(); 
                        $job_title = get_sub_field('title');
                        $job_text = get_sub_field('info');                        
                        $link_job = get_sub_field('link_job');
                        $link_apply = get_sub_field('link_apply'); ?>
                        <?php if($job_title): ?>
                            <button class="accordion" title="Accordeon"><?php echo $job_title; ?></button>
                        <?php endif; ?>               
                        <div class="panel">
                            <div class="row">
                               <div class="col-xs-12">
                               <?php if ($job_text) : ?>
                                    <div class="dp-1 dp-2 cl-black cl-black"><?php echo wp_kses_post($job_text); ?></div>
                                <?php endif; ?>
                               </div>
                               <?php if( $link_job ):
                                $link_url = $link_job['url'];
                                $link_title = $link_job['title'];
                                $link_target = $link_job['target'] ? $link_job['target'] : '_self'; ?>  
                                 <div class="col-xs-12 col-md-6">
                                    <a tabindex="0" id="openModalBtnJob-<?php echo $i;?>" class="cta-link cl-black flex middle-xs m-md-t2" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>">
                                    <?php echo esc_html( $link_title ); ?>
                                    <svg class="arrow-passive" width="21" height="16" viewBox="0 0 21 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20.7071 8.70711C21.0976 8.31658 21.0976 7.68342 20.7071 7.29289L14.3431 0.928932C13.9526 0.538408 13.3195 0.538408 12.9289 0.928932C12.5384 1.31946 12.5384 1.95262 12.9289 2.34315L18.5858 8L12.9289 13.6569C12.5384 14.0474 12.5384 14.6805 12.9289 15.0711C13.3195 15.4616 13.9526 15.4616 14.3431 15.0711L20.7071 8.70711ZM0 9H20V7H0V9Z" fill="black"/>
                                    </svg>
                                    <svg class="arrow-active" xmlns="http://www.w3.org/2000/svg" width="39" height="16" viewBox="0 0 39 16" fill="none">
                                        <path d="M38.7071 8.70711C39.0976 8.31658 39.0976 7.68342 38.7071 7.29289L32.3431 0.928932C31.9526 0.538408 31.3195 0.538408 30.9289 0.928932C30.5384 1.31946 30.5384 1.95262 30.9289 2.34315L36.5858 8L30.9289 13.6569C30.5384 14.0474 30.5384 14.6805 30.9289 15.0711C31.3195 15.4616 31.9526 15.4616 32.3431 15.0711L38.7071 8.70711ZM0 9H38V7H0V9Z" fill="black"/>
                                    </svg>
                                    </a> 
                                </div> 
                                <?php endif; ?> 
                               
                                <?php if( $link_apply ):
                                    $link_url = $link_apply['url'];
                                    $link_title = $link_apply['title'];
                                    $link_target = $link_apply['target'] ? $link_apply['target'] : '_self'; ?>
                                    <div class="col-xs-12 col-md-6 col-apply-btn">
                                        <div class="button-wrapper green p-t05">
                                            <a tabindex="0" class="button cl-green cl-white-h bg-green-h" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>" aria-label="<?php echo esc_html( $link_title ); ?>" title="<?php echo esc_html( $link_title ); ?>"><?php echo esc_html( $link_title ); ?></a>                            
                                        </div>
                                    </div> 
                                <?php endif; ?>                            
                            </div>                           
                        </div> 
                    <?php $i++; endwhile; ?>
                    </div>
                </div>
               </div>              
            <?php endif; ?>   
        </div> 
        <?php $i = 1; if ( have_rows( 'jobs_list' ) ): 
                while( have_rows('jobs_list') ): the_row();   $full_job_description = get_sub_field('full_job_description');  ?>
               <div id="jobModal-<?php echo $i;?>" class="modal">
                    <div class="modal-content">
                        <div class="modal-header flex flex-row align-center justify-between">
                            <h3 class="text-uppercase cl-black text-center">FULL JOB DESCRIPTION</h3>
                            <span id="closeModalBtnJob-<?php echo $i;?>" class="close">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path d="M3.90708 24.2881L0.589233 20.9703L9.12085 12.4387L0.589233 3.96629L3.90708 0.648438L12.4387 9.18005L20.9111 0.648438L24.2289 3.96629L15.6973 12.4387L24.2289 20.9703L20.9111 24.2881L12.4387 15.7565L3.90708 24.2881Z" fill="#005B29"/>
                            </svg>
                            </span>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <?php if ($full_job_description) : ?>
                                        <div class="dp-1 dp-2 cl-black"><?php echo wp_kses_post($full_job_description); ?></div>
                                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>			
                    </div>
                </div> 
            <?php $i++; endwhile; endif; ?>   
    </section> 
<?php endwhile;  endif; ?>