<?php if( have_rows('logos_footer', $widget_id) ): ?>
    <div class="d-flex align-items-center justify-content-lg-start justify-content-center flex-column flex-md-row">
   <?php while( have_rows('logos_footer', $widget_id) ) : the_row();
    $logo = get_sub_field('logo_footer', $widget_id);
    $logolink = get_sub_field('link_logo_footer', $widget_id); ?>
    <?php  if($logolink) {
        $link_url = $logolink['url'];
        $link_title = $logolink['title'];
        $link_target = $logolink['target'] ? $logolink['target'] : '_self'; } ?>
        <div class="col-footer-logos pb-md-0 pb-5">
            <div class="d-flex align-items-center">
                <?php if( !empty($logo) ): ?>
                    <?php  if($logolink) { ?>
                        <a class="logo-footer" aria-label="<?php echo $link_title;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php } ?>
                    <img class="img-fluid" src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" width="214" height="40"/>
                    <?php  if($logolink) { ?></a><?php } ?>
                <?php endif; ?>
            </div>
        </div>
    <?php endwhile; ?>
    </div>
<?php endif; ?>