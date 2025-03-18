   <section class="section-info-contact">
       <div class="container-fluid pt-5 pb-5">
            <div class="row">
                <div class="col-md-12 pt-5">                   
                        <h1 class="title-section cl-l-blue text-center"><?php echo the_title();?></h1>
                 </div>
            </div>   
            <?php  $contact_form = get_field('contact_form'); 
             if($contact_form): ?>
                <div class="row justify-content-center">
                   <div class="col-md-12 col-lg-10 pb-5 pt-lg-0 pt-5 col-box-contact">
                      <div class="box-contact-form">
                        <?php echo $contact_form; ?>
                      </div>
                   </div>
                </div>
            <?php endif; ?>         
       </div>
    </section>


