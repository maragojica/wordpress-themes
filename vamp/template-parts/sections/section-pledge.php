<?php
if (have_rows('pledge')) {
    while (have_rows('pledge')) {
        the_row(); 
        $section_id = get_sub_field('section_id'); 
        $image = get_sub_field('image');
        $heading = get_sub_field('heading'); 
        $description = get_sub_field('description'); 
        $author = get_sub_field('author'); 
        $author_title = get_sub_field('author_title'); 
?>
    <section <?php if($section_id): ?> id="<?php echo $section_id;?>" <?php endif; ?> class="section-pledge">
        <div class="container-fluid">
            <div class="row middle-xs">

                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="animate__animated" data-animation="fadeLeft" data-duration="2.45s">
                        <div class="media-item">
                            <?php if ($image) : ?>
                                <?php echo wp_get_attachment_image($image['ID'], 'full'); ?> 
                            <?php endif; ?>
                        </div>
                    </div>
                </div>


                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 text-area">
                    <?php if($heading): ?>
                        <div class="animate__animated" data-animation="fadeBottom" data-duration="2.45s">
                            <div class="heading"> 
                                <h2 class="cl-blue mt-0 mb-05"><?php echo $heading; ?></h2>
                            </div>
                        </div>
                    <?php endif; ?>  
                    <?php if($description): ?>
                        <div class="animate__animated" data-animation="fadeBottom" data-duration="2.65s">
                            <div class="cl-purple mt-0 mb-1 description"><?php echo $description; ?></div>
                        </div>
                    <?php endif; ?>  

                    <div class="author-section flex col end-xs">
                        <?php if($author): ?>
                            <div class="animate__animated" data-animation="fadeBottom" data-duration="2.65s">
                                <div class="pledge-author cl-blue m-t1 mb-1"><?php echo $author; ?></div>
                            </div>
                        <?php endif; ?>  

                        <?php if($author_title): ?>
                            <div class="animate__animated" data-animation="fadeBottom" data-duration="2.65s">
                                <div class="cl-black mt-0 mb-1"><?php echo $author_title; ?></div>
                            </div>
                        <?php endif; ?>  

                    </div>
                    

                </div>
            </div>
        </div>
    </section>
<?php
    }
}
?>
