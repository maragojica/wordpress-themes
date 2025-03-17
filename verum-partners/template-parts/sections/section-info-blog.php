<?php   
     $title_list_id = get_field('title_list_id'); 
    $content = get_the_content();
    $content_with_ids = "";

   $headings = get_post_headings($content);
   if(!empty($headings[0])){
    list($toc, $modified_headings) = generate_toc($headings); 
    
    foreach ($headings[0] as $index => $original_heading) {
        $content_with_ids = str_replace($original_heading, $modified_headings[$index], $content_with_ids);
    }
	   $content_with_ids = wpautop($content);
  }else{
	   $content_with_ids = wpautop($content);
   }

?> 
<section class="section-info-blog">
    <div class="container">
        <div class="row row-post justify-center"> 
            <div class="col-xs-12 col-lg-8"> 
                <div class="dp-1 p-lg-t2 cl-off-black wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.2s">
                    <?php echo $content_with_ids; ?>
                </div>                                             
            </div>
            <?php if(!empty($headings[0])):  ?>
            <div class="col-xs-12 col-lg-4 m-b2 ps-lg-2">
                <div class="single-sidebar">
                <?php if ($title_list_id) : ?>
                    <h3 class="text-uppercase cl-green mt-0 mb-10px wow fadeInUp" data-wow-duration="0.8s" data-wow-delay="0.3s"><?php echo $title_list_id; ?></h3>
                <?php endif; ?>  
                <div class="post-toc"><?php echo $toc; ?></div>                          
                </div>                        
            </div>
            <?php endif; ?>
        </div>
    </div>            
</section>
