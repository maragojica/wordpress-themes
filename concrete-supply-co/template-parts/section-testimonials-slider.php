<?php if ( have_rows( 'testimonials' ) ): ?>
    <?php while( have_rows('testimonials') ): the_row();
    // Get sub field values.        
    $testimonials_list = get_sub_field('testimonials_list');
    ?>    
    <section class="section-testimonials-slider bg-lightgray">   
        <div class="container position-relative">    
            <div class="testimonial-interior text-center"> 
                <?php if ( $testimonials_list ): ?>
                <div class="testimonials-slider">
                <?php foreach( $testimonials_list as $featured_testimonial ):                
                        $name = get_the_title( $featured_testimonial->ID );
                        $content = get_field( 'content', $featured_testimonial->ID );   
                        $position = get_field( 'position', $featured_testimonial->ID );   
                        ?>
                    <div class="testimonials-slide">
                        <div class="quote-icon animate__animated" data-animation="fadeBottom" data-duration="1s">
                        <svg xmlns="http://www.w3.org/2000/svg" width="84" height="74" viewBox="0 0 84 74" fill="none">
                            <g filter="url(#filter0_d_2_114)">
                                <path d="M4 29.1012L30.3732 0L26.9225 29.1012H39V66H4V29.1012Z" fill="#0088CE"/>
                            </g>
                            <g filter="url(#filter1_d_2_114)">
                                <path d="M45 29.1012L71.3732 0L67.9225 29.1012H80V66H45V29.1012Z" fill="#0088CE"/>
                            </g>
                            <defs>
                                <filter id="filter0_d_2_114" x="0" y="0" width="43" height="74" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_114"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_114" result="shape"/>
                                </filter>
                                <filter id="filter1_d_2_114" x="41" y="0" width="43" height="74" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                                <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                                <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                                <feOffset dy="4"/>
                                <feGaussianBlur stdDeviation="2"/>
                                <feComposite in2="hardAlpha" operator="out"/>
                                <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0"/>
                                <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_2_114"/>
                                <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_2_114" result="shape"/>
                                </filter>
                            </defs>
                            </svg>
                        </div>
                        <?php if($content): ?>
                            <div class="description animate__animated" data-animation="fadeBottom" data-duration="1.75s"><?php echo $content; ?></div>
                        <?php endif; ?>
                        <?php if($name): ?>
                            <div class="name-testimonials animate__animated" data-animation="fadeBottom" data-duration="2s"><?=$name; ?></div>
                        <?php endif; ?>         
                        <?php if($position): ?>
                            <div class="position-testimonials animate__animated" data-animation="fadeBottom" data-duration="2.5s"><?=$position; ?></div>
                        <?php endif; ?>        
                    </div>                       
                    <?php endforeach; ?>
                </div>
            </div>  
        <button aria-label="Previous" class="glider-prev animate__animated" data-animation="fadeLeft">       
            <svg fill="#000000" xmlns="http://www.w3.org/2000/svg" width="118" height="16" viewBox="0 0 118 16" fill="none">
            <path d="M0.292892 7.29289C-0.0976333 7.68341 -0.0976334 8.31658 0.292892 8.7071L6.65685 15.0711C7.04738 15.4616 7.68054 15.4616 8.07107 15.0711C8.46159 14.6805 8.46159 14.0474 8.07107 13.6568L2.41422 7.99999L8.07107 2.34314C8.46159 1.95262 8.46159 1.31945 8.07107 0.928927C7.68054 0.538403 7.04738 0.538403 6.65685 0.928927L0.292892 7.29289ZM118 7L1 6.99999L1 8.99999L118 9L118 7Z" fill="black"/>
            </svg>
        </button>
        <button fill="#000000" aria-label="Next" class="glider-next animate__animated" data-animation="fadeRight">           
            <svg xmlns="http://www.w3.org/2000/svg" width="118" height="16" viewBox="0 0 118 16" fill="none">
            <path d="M117.707 8.7071C118.098 8.31658 118.098 7.68341 117.707 7.29289L111.343 0.928927C110.953 0.538403 110.319 0.538403 109.929 0.928927C109.538 1.31945 109.538 1.95262 109.929 2.34314L115.586 7.99999L109.929 13.6568C109.538 14.0474 109.538 14.6805 109.929 15.0711C110.319 15.4616 110.953 15.4616 111.343 15.0711L117.707 8.7071ZM4.37114e-08 9L117 8.99999L117 6.99999L-4.37114e-08 7L4.37114e-08 9Z" fill="black"/>
            </svg>
        </button>
        <?php endif; ?>
        </div>   
    </section>
    <?php endwhile; ?>
    <?php endif; ?>