<?php
if(get_sub_field('padding') == 'yes' )
	$padding = 3;
else
	$padding = 0;
?>
<div class="copy-text font-adrianna cl-black pb-4 pl-<?php echo $padding; ?> pr-<?php echo $padding; ?>"><?php echo get_sub_field('content') ?></div>
