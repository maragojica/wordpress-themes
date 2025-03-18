<div class="row module module-block-cta justify-content-center pb-5">
    <?php $cta = get_sub_field('cta'); ?>
    <div class="col-lg-7">
        <?php if($cta):
            $link_url = $cta['url'];
            $link_title = $cta['title'];
            $link_target = $cta['target'] ? $cta['target'] : '_self';?>
            <div class="box-cta-btn d-flex align-items-center">
                <a class="cta-btn d-flex align-items-center cl-blue bg-accent-grey-1 bg-white-h border-white border-blue-h" aria-label="<?php echo $link_title; ?>" href="<?php echo $link_url; ?>" target="<?php echo $link_target;?>">
                    <?php echo $link_title; ?>
                    <span class="cta-arrows d-flex align-items-center">
                        <svg class="arrow-short" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1329_11274)">
                                <path d="M14 6.5H32" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1329_11274">
                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                </clipPath>
                            </defs>
                        </svg>
                        <svg class="arrow-long" width="33" height="13" viewBox="0 0 33 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_1305_3418)">
                                <path d="M1 6.5L32 6.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M27 1.5L32 6.5L27 11.5" stroke="#3877EC" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </g>
                            <defs>
                                <clipPath id="clip0_1305_3418">
                                    <rect width="33" height="12" fill="white" transform="translate(0 0.5)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>