<?php
if (have_rows('form_box')) {
    while (have_rows('form_box')) {
        the_row(); 
        $form_shortcode = get_sub_field('form_shortcode'); 
		$heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); 
        ?>
       <section class="section-form-shape animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.5s"></section>
        <section class="section-form-box">            
            <div class="container">                
                <?php if ($form_shortcode): ?>
                    <div class="inner-form-box bg-white shadow auto animate__animated fadeBottom" data-animation="fadeBottom" data-duration="1.75s">
						  <?php if($heading): ?>
                                <h2 class="mb-30 cl-blue text-center"><?php echo $heading; ?></h2>
                            <?php endif; ?> 
                            <?php if($description): ?>
                                <div class="dp-1 mt-0 cl-dark text-center">
                                    <?php echo $description; ?>
                                </div>
                            <?php endif; ?>
                        <?php echo $form_shortcode ?>
                    </div>
                <?php endif; ?>                                     
            <div>                    
        </section>           
<?php }
} ?>