<h1 class="title-page pb-4 mb-0 cl-white text-uppercase text-center mt-0"><?php echo get_sub_field('search_block_title') ?></h1>
<form name="search" method="get" action="/" class="form-search">
    <div class="input-group">
        <span class="input-group-btn group-img-search"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/ios-search.svg" border="0"> </span>
        <input type="text" class="form-control" name="s" id="search" placeholder="Search terms, topics, or questions.">
        <span class="input-group-btn group-btn-search"> <button type="submit" class="btn btn-default btn-search">SEARCH</button> </span>
    </div>
</form>
