<div class="row module module-block-quote justify-content-center pb-md-5 pb-4">
    <?php $quote_text = get_sub_field('quote_text'); $quote_info = get_sub_field('quote_info'); ?>
    <div class="col-lg-7">
        <?php if($quote_text): ?>
            <div class="quote-text"><?php echo $quote_text;?><?php if($quote_info): ?><span><?php echo $quote_info;?></span><?php endif; ?></div>
        <?php endif; ?>
    </div>
</div>