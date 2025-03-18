<?php
            $idsection = get_sub_field('id_section');
            $add_padding_top = get_sub_field('add_padding_top');
            $add_padding_bottom = get_sub_field('add_padding_bottom');
            $add_margin_top = get_sub_field('add_margin_top');
            $add_margin_bottom = get_sub_field('add_margin_bottom');
            $title = get_sub_field('title_section');
            $subtitle = get_sub_field('subtitle_section');
            $desc = get_sub_field('description_section');
            $cta = get_sub_field('cta');
            ?>
            <section class="module-text-two-columns bg-white <?php if($add_padding_bottom): ?> pb-md-5 pb-4<?php endif;?> <?php if($add_padding_top): ?> pt-md-5 pt-4<?php endif; ?> <?php if($add_margin_top): ?> mt-4 <?php endif;?> <?php if($add_margin_bottom): ?> mb-4 <?php endif;?>" <?php if($idsection):?>id="<?php echo $idsection;?>" <?php endif;?>>
                <div class="container pt-md-5 pb-md-5">
                    <div class="row justify-content-between">
                        <?php if($title || $subtitle || $desc): ?>
                            <div class="col-lg-4">
                                <?php if($title): ?>
                                    <h2 class="cl-dark-green mb-4"><?php echo $title; ?></h2>
                                <?php endif; ?>
                                <?php if($subtitle): ?>
                                    <h3 class="cl-dark mb-4"><?php echo $subtitle; ?></h3>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <?php if($desc || $cta): ?>
                            <div class="col-lg-7">
                                <?php if($desc): ?>
                                    <div class="dp-1 cl-dark mb-tb-0"><?php echo $desc; ?></div>
                                <?php endif; ?>
                                <?php
                                if($cta) {
                                    $link_url = $cta['url'];
                                    $link_title = $cta['title'];
                                    $link_target = $cta['target'] ? $cta['target'] : '_self';?>

                                    <div class="box-cta-btn d-flex align-items-center pt-md-5 pt-3 pb-md-0 pb-5">
                                        <a class="cta-btn cta-btn-md d-flex align-items-center cl-dark-green cl-dark-green-h bg-white bg-white-h border-dark-green border-dark-green-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                                            <span class="cta-title"><?php echo $link_title; ?></span>
                                        <span class="cta-arrows d-flex align-items-center">
                                            <svg class="arrow-short" width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_412_77)">
                                                    <path d="M2.32498 10.5H16.875" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                    <path d="M11.5167 3.83331L17.15 10.025C17.3833 10.2833 17.3833 10.7083 17.15 10.9666L11.5167 17.1583" stroke="#028A8B" stroke-linecap="round" stroke-linejoin="round"/>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_412_77">
                                                        <rect width="20" height="20" fill="white" transform="translate(0 0.5)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                      </span>
                                        </a>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php endif; ?>
                    </div>                    
            </section>