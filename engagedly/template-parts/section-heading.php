<?php
$s_title = get_sub_field('title');
$s_type = get_sub_field('type');
switch ($s_type) {
    case "Heading 2":
        $heading = 'h2';
        break;
	case "Heading 3":
		$heading = 'h3';
		break;
	case "Heading 4":
		$heading = 'h4';
		break;
    default:
	    $heading = 'h1';
}
?>
<<?php echo $heading; ?> class="title-page pb-4 mb-0 cl-gray"><?php echo $s_title; ?></<?php echo $heading; ?>>