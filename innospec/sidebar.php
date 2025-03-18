<div class="header-title-page mb-3">
    <?php
    $parents = get_post_ancestors( $post->ID );
    if(count($parents) == 0)
        $id = $post->ID;
    else
        $id = end($parents);

    echo get_the_title($id);
    ?>
</div>
<section class="sidebar-categories mb-3">
    <?php
        echo wpb_list_child_pages($id);
    ?>
</section>
<section id="sidebar-image-questions" class="sidebar-custom mb-3">

    <?php
        $img = array(
            '1' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_01.png',
            '2' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_02.png',
            '3' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_03.png',
            '4' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_04.png',
            '5' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_05.png',
            '6' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_06.png',
            '7' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_07.png',
            '8' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_08.png',
            '9' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_09.png',
            '10' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_10.png',
            '11' => 'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_11.png',
            '12' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_12.png',
            '13' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_13.png',
            '14' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_14.png',
            '15' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_15.png',
            '16' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_16.png',
            '17' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_17.png',
            '18' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_18.png',
            '19' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_19.png',
            '20' =>  'https://innospec.com/wp-content/uploads/2020/09/Questions_Button_20.png'
        );
        $n = rand(1,20);

    global $post;     // if outside the loop

    //if ( is_page() && $post->post_parent ) {
                    // This is a subpage
    $page = get_the_id();
    if ( $page != 2 ) {

        $_POST['form'] = 1;
        ?>
            <div class="module-image">
                <a href="#?form=1" data-toggle="modal" data-target="#testModal">
                    <img src="<?php echo $img[$n]; ?>" style="max-width: 100%;">
                </a>
            </div>

        <?php
    }
    //}
    ?>

</section>
