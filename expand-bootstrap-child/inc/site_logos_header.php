<div class="contact-header d-flex align-items-center justify-content-between">
    <?php if( have_rows('logos_header', $widget_id) ):
    while( have_rows('logos_header', $widget_id) ) : the_row();
        $logowhite = get_sub_field('logo_header', $widget_id);
        $logodark = get_sub_field('logo_header_dark', $widget_id);
        $logolink = get_sub_field('link_logo_header', $widget_id); ?>
        <?php  if($logolink) {
        $link_url = $logolink['url'];
        $link_title = $logolink['title'];
        $link_target = $logolink['target'] ? $logolink['target'] : '_self'; } ?>

        <div class="box-logos">
            <?php if( !empty($logowhite) ): ?>
                <?php  if($logolink) { ?>
                <a class="w-100 h-100 logo-link" aria-label="<?php echo $link_title;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php } ?>
                  <img class="img-fluid logo-white" src="<?php echo esc_url($logowhite['url']); ?>" alt="<?php echo esc_attr($logowhite['alt']); ?>" />
                <?php  if($logolink) { ?></a><?php } ?>
            <?php endif; ?>
            <?php if( !empty($logodark) ): ?>
            <?php  if($logolink) { ?>
                <a class="w-100 h-100 logo-link" aria-label="<?php echo $link_title;?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>"><?php } ?>
                <img class="img-fluid logo-dark" src="<?php echo esc_url($logodark['url']); ?>" alt="<?php echo esc_attr($logodark['alt']); ?>" />
            <?php  if($logolink) { ?></a><?php } ?>
            <?php endif; ?>
        </div>
    <?php endwhile;  endif; ?>
</div>


