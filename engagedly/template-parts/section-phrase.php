<?php
$phrase = get_sub_field('phrase');
$phrase_author = get_sub_field('author');
$phrase_title = get_sub_field('title');
$phrase_button_title = get_sub_field('button_title');
$phrase_button_link = get_sub_field('button_link');
$phrase_link = get_sub_field('link');
$phrase_link_image = get_sub_field('link_image');
?>

<section id="content-shape-banner" class="bg-gray content-higher position-relative z-index-1">
    <div class="container">
        <div class="row flex-lg-row-reverse align-items-start justify-content-center">
            <div class="col-lg-6">
                <h5 class="info-case-study cl-white font-adrianna"><?php echo $phrase_title ?></h5>
                <div class="stack-btn row">
                    <div class="col-md-12">
                        <a href="<?php echo $phrase_button_link ?>" class="btn btn-orange text-uppercase mr-lg-3"><?php echo $phrase_button_title ?></a>
                        <a href="<?php echo $phrase_link ?>" target="_blank" class="stack-logo"><img src="<?php echo $phrase_link_image['url'] ?>" alt="Experian"></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="blockquote-row bg-gray">
                    <div class="row">
                        <div class="col-1 col-lg-2 pr-0 text-right"><span class="text-blockquote cl-white">&ldquo;</span></div>
                        <div class="col col-text-blockquote">
                            <p><em><?php echo $phrase ?></em></p>
                            <h6 class="name-blockquote cl-white pt-3 mb-0"><?php echo $phrase_author ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
