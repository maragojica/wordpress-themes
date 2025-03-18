<section <?php if(get_sub_field('id_section_retailers')): ?>id="<?php echo the_sub_field('id_section_retailers');?>" <?php endif;?> class="module module-retailers pt-5 pb-5 bg-white wow fadeIn" data-wow-duration="0.2s" data-wow-delay="0.2s">
    <?php
    $idsection = get_sub_field('id_section_retailers');
    $title = get_sub_field('title_retailers');
    $subtitle = get_sub_field('subtitle_retailers');
    $type = get_sub_field('type_retailers');?>
    <div class="container pt-0 pt-md-5 pb-0">
        <div class="row justify-content-center">
            <div class="col-md-12 pt-md-5 pb-md-5">
               <?php if($subtitle): ?>
                   <div class="text-facts text-uppercase cl-ultra-violet pb-3"><?php echo $subtitle;?></div>
               <?php endif; ?>
                <?php if( $title ): ?>
                    <h2 class="headline-section cl-stormy-sea pb-md-5"><?php echo $title;?></h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if($type['value'] == "retailers"): ?>
        <div class="row row-search pt-4 pb-5">
            <div class="col-md-12">
                <div class="d-flex align-items-center flex-lg-row flex-column cl-grey-2">
                    <div class="input-group">
                            <span class="input-group-text" id="button-search">
                                <i class="fas fa-search cl-stormy-sea"></i>
                            </span>
                        <input class="form-control" type="text" id="quicksearch" placeholder="Search retailers" aria-label="Search retailers" aria-describedby="Search retailers">
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
       <div class="box-retailers">
           <?php $overall_title = get_sub_field('overall_title');
           $end_port_pollution_titlle = get_sub_field('end_port_pollution_titlle');
           $abandon_dirty_ships_title = get_sub_field('abandon_dirty_ships_title');
           $put_zero_at_the_helm_title = get_sub_field('put_zero_at_the_helm_title'); ?>
           <div class="row row-title-table align-items-center me-0 ms-0 equal pt-5 mt-md-5">
               <?php if($title): ?>
                   <div class="col text-center ps-0 pe-0">
                       <div class="title-table"><?php echo $title;?></div>
                   </div>
               <?php endif; ?>
               <?php if($overall_title): ?>
                   <div class="col text-center ps-0 pe-0">
                       <div class="title-table"><?php echo $overall_title;?></div>
                   </div>
               <?php endif; ?>
               <?php if($end_port_pollution_titlle): ?>
                   <div class="col text-center ps-0 pe-0">
                       <div class="title-table"><?php echo $end_port_pollution_titlle;?></div>
                   </div>
               <?php endif; ?>
               <?php if($abandon_dirty_ships_title): ?>
                   <div class="col text-center ps-0 pe-0">
                       <div class="title-table"><?php echo $abandon_dirty_ships_title;?></div>
                   </div>
               <?php endif; ?>
               <?php if($put_zero_at_the_helm_title): ?>
                   <div class="col text-center ps-0 pe-0">
                       <div class="title-table"><?php echo $put_zero_at_the_helm_title;?></div>
                   </div>
               <?php endif; ?>
           </div>
           <div id="noresources" class="hide">
               <div class="row">
                   <div class="col-md-12">
                       <div class="title-table pt-5 mt-md-5 text-center">No results found</div>
                   </div>
               </div>
           </div>
           <?php if( have_rows('retailers_list') ): ?>
               <div class="grid row-retailers type-<?php echo esc_attr($type['value']); ?>">
                   <?php $i=1; while( have_rows('retailers_list') ) : the_row();
                       $name = get_sub_field('retailers_name');
                       $logo = get_sub_field('retailers_logo');
                       $overall_score = get_sub_field('overall_score');
                       $overall_color = get_sub_field('overall_color');
                       $end_port_pollution_score = get_sub_field('end_port_pollution_score');
                       $abandon_dirty_ships_score = get_sub_field('abandon_dirty_ships_score');
                       $put_zero_at_the_helm_score = get_sub_field('put_zero_at_the_helm_score');
                       $retailers_text_popup = get_sub_field('retailers_text_popup');?>
                       <a href="#modal-<?php echo $idsection."-".$i;?>" class="element-item" id="modal-<?php echo $idsection."-".$i;?>" uk-toggle>
                           <div class="row align-items-center row-retailers me-0 ms-0 equal w-100 h-100">
                               <?php if($name || (!empty($logo))): ?>
                                   <div class="col text-center ps-0 pe-0">
                                       <div class="col-logo w-100 h-100">
                                           <div class="title-table"><?php echo $name;?></div>
                                           <?php if(!empty($logo)): ?>
                                               <img width="110" height="71" class="img-fluid m-auto logo-retailers" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                           <?php endif; ?>
                                       </div>
                                   </div>
                               <?php endif; ?>
                               <?php if($overall_score): ?>
                                   <div class="col text-center ps-0 pe-0">
                                       <div class="score-table final-score cl-white d-flex align-items-center justify-content-center" style="background-color: <?php echo $overall_color;?>"><?php echo $overall_score;?></div>
                                   </div>
                               <?php endif; ?>
                               <?php if($end_port_pollution_score): ?>
                                   <div class="col text-center ps-0 pe-0">
                                       <div class="score-table cl-stormy-sea"><?php echo $end_port_pollution_score;?></div>
                                   </div>
                               <?php endif; ?>
                               <?php if($abandon_dirty_ships_score): ?>
                                   <div class="col text-center ps-0 pe-0">
                                       <div class="score-table cl-stormy-sea"><?php echo $abandon_dirty_ships_score;?></div>
                                   </div>
                               <?php endif; ?>
                               <?php if($put_zero_at_the_helm_score): ?>
                                   <div class="col text-center ps-0 pe-0">
                                       <div class="score-table cl-stormy-sea"><?php echo $put_zero_at_the_helm_score;?></div>
                                   </div>
                               <?php endif; ?>
                           </div>
                       </a>
                       <?php if(isset($_GET['popup']) and $_GET['popup'] == "modal-".$idsection."-".$i): ?>
                       <script type="text/javascript">
                            jQuery(window).on("load", function(){
                                setTimeout( function() { document.getElementById("modal-<?php echo $idsection."-".$i;?>").click(); }, 500); 
                            });
                        </script>
                        <?php endif; ?>
                       <div id="modal-<?php echo $idsection."-".$i;?>" class="uk-flex-top modal-retailers modal-type-<?php echo esc_attr($type['value']); ?>" uk-modal>
                           <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                               <button class="uk-modal-close-default" type="button" uk-close></button>
                               <div class="uk-modal-header d-flex align-items-center justify-content-center py-4">
                                   <?php if(!empty($logo)): ?>
                                       <img width="177" height="115" class="img-fluid logo-retailers" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" />
                                   <?php endif; ?>
                                   <?php if($overall_score): ?>
                                       <div class="text-center ml-md-5 ml-3">
                                           <div class="score-table final-score cl-white d-flex align-items-center justify-content-center" style="background-color: <?php echo $overall_color;?>"><?php echo $overall_score;?></div>
                                       </div>
                                   <?php endif; ?>
                               </div>
                               <?php if($retailers_text_popup): ?>
                                   <div class="uk-modal-body p-5">
                                       <div class="copy-description cl-stormy-sea p-md-5">
                                           <?php echo $retailers_text_popup;?>
                                           <div class="social social-report d-flex justify-content-start align-items-center pt-5">
                                               <a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                                                   <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="12.000000px" height="23.000000px" viewBox="0 0 12.000000 23.000000"  preserveAspectRatio="xMidYMid meet">
                                                       <g transform="translate(0.000000,23.000000) scale(0.007895,-0.007797)"  fill="#3825FD" stroke="none">
                                                           <path d="M923 2935 c-171 -31 -324 -148 -401 -306 -67 -136 -72 -168 -72 -465 0 -213 -3 -264 -14 -273 -10 -9 -74 -12 -216 -10 -155 1 -204 -2 -210 -12 -9 -13 -12 -503 -4 -531 5 -16 24 -18 219 -18 185 0 214 -2 219 -16 3 -9 6 -303 6 -654 l0 -638 98 -7 c105 -8 406 -1 434 10 17 7 18 50 20 654 l3 646 210 3 c115 1 213 6 217 10 4 4 21 116 38 248 16 133 33 256 36 273 l7 31 -241 0 c-132 0 -247 3 -256 6 -14 5 -16 33 -16 205 0 208 6 246 48 292 42 46 68 52 272 57 l195 5 0 250 0 250 -260 2 c-179 1 -283 -3 -332 -12z"/>
                                                       </g>
                                                   </svg>
                                               </a>
                                               <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                                                   <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="25.000000px" height="20.000000px" viewBox="0 0 25.000000 20.000000" preserveAspectRatio="xMidYMid meet">
                                                       <g transform="translate(0.000000,20.000000) scale(0.006667,-0.006780)" fill="#3825FD" stroke="none">
                                                           <path d="M2460 2936 c-144 -31 -263 -93 -365 -188 -172 -161 -253 -356 -243 -589 l4 -109 -40 6 c-127 17 -232 37 -316 60 -418 113 -809 363 -1087 697 -36 42 -69 74 -75 71 -18 -11 -77 -150 -95 -221 -22 -91 -22 -266 1 -358 29 -120 95 -242 182 -334 63 -67 72 -81 54 -81 -38 0 -141 30 -208 61 -36 16 -66 29 -68 29 -9 0 -3 -115 10 -184 30 -155 94 -274 211 -391 87 -86 160 -135 258 -170 59 -22 61 -23 33 -30 -16 -4 -85 -5 -153 -2 l-125 5 6 -27 c4 -14 27 -68 53 -120 37 -77 61 -110 127 -176 116 -117 237 -183 395 -215 l85 -17 -57 -36 c-165 -106 -370 -184 -572 -219 -102 -17 -147 -20 -298 -15 -97 3 -175 1 -172 -3 9 -14 162 -104 265 -155 137 -69 273 -117 455 -163 212 -53 330 -66 535 -59 273 10 450 40 670 113 537 179 978 579 1230 1119 122 260 185 516 206 833 l6 103 77 58 c113 87 315 301 298 317 -3 3 -47 -8 -99 -25 -98 -31 -261 -65 -280 -59 -6 2 5 14 25 27 64 39 181 174 225 259 60 114 57 120 -30 76 -86 -43 -285 -110 -356 -120 -51 -6 -52 -6 -104 41 -101 90 -201 146 -323 179 -84 23 -264 29 -345 12z"/> 									</g>
                                                   </svg>
                                               </a>
                                               <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" class="pr-4">
                                                   <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="22.000000px" height="22.000000px" viewBox="0 0 22.000000 22.000000" preserveAspectRatio="xMidYMid meet">
                                                       <g transform="translate(0.000000,22.000000) scale(0.007383,-0.007458)" fill="#3825FD" stroke="none">
                                                           <path d="M273 2936 c-23 -7 -62 -25 -86 -39 -167 -98 -218 -339 -106 -506 155 -233 502 -206 626 49 24 48 27 68 28 150 0 82 -4 103 -26 151 -37 79 -90 133 -166 171 -54 26 -79 32 -146 35 -51 2 -98 -2 -124 -11z"/>
                                                           <path d="M2060 2005 c-104 -29 -216 -91 -289 -163 -37 -37 -77 -80 -89 -97 l-21 -30 -1 128 0 127 -300 0 -300 0 0 -985 0 -985 309 0 309 0 5 562 c3 463 7 575 20 629 29 125 83 201 177 250 39 21 59 24 155 24 135 0 187 -20 240 -94 77 -106 84 -177 85 -833 l0 -538 311 0 310 0 -4 667 c-4 725 -7 764 -63 932 -70 210 -207 339 -419 397 -87 23 -361 29 -435 9z"/>
                                                           <path d="M70 985 l0 -985 310 0 310 0 0 985 0 985 -310 0 -310 0 0 -985z"/>
                                                       </g>
                                                   </svg>
                                               </a>
                                               <a href="mailto:type%20email%20address%20here?subject=I%20wanted%20to%20share%20this%20post%20with%20you%20from%20<?php bloginfo('name'); ?>&body=<?php the_title(); ?> - <?php the_permalink(); ?>" title="Email to a friend/colleague" target="_blank" class="pr-4">
                                                   <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="27.000000px" height="21.000000px" viewBox="0 0 27.000000 21.000000" preserveAspectRatio="xMidYMid meet">
                                                       <g transform="translate(0.000000,21.000000) scale(0.007317,-0.007119)" fill="#3825FD" stroke="none">
                                                           <path d="M263 2936 c-106 -34 -195 -115 -235 -215 l-23 -56 0 -1195 0 -1195 27 -57 c35 -76 99 -143 173 -181 l60 -32 1580 0 1580 0 63 34 c75 41 135 103 170 179 l27 57 0 1200 0 1200 -32 66 c-39 79 -102 140 -181 177 l-57 27 -1555 2 c-1266 1 -1563 -1 -1597 -11z m850 -828 c397 -248 727 -451 732 -451 6 0 335 203 732 451 398 249 725 452 728 452 3 0 5 -78 5 -173 l0 -173 -727 -455 c-400 -250 -732 -454 -738 -454 -6 0 -338 204 -738 454 l-727 455 0 173 c0 95 2 173 5 173 3 0 330 -203 728 -452z"/>
                                                       </g>
                                                   </svg>
                                               </a>
                                           </div>
                                       </div>
                                   </div>
                               <?php endif; ?>
                           </div>
                       </div>
                       <?php $i++; endwhile; ?>
               </div>
           <?php endif; ?>
       </div>
</section>