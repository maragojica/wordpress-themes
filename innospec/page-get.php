<?php
//Template name: Page Getfile with cookie
get_header();
?>
    <section class="container defaulttemplate">
        <div class="row">
            <div class="col-lg-9 content-main">
                <div class="row">

                        <div class="<?php echo $col1; ?>">

                            <div class="wrap-product wrap-content">


                                <div class="content-text">
                                   

                                    <?php
                                    if (isset ( $_COOKIE['first_time'])) {

                                        if (isset($_GET['doc'])) {

                                            switch ($_GET['doc']) {
                                                case 'OctamarBT25':
                                                    wp_redirect( "https://innospec.com/wp-content/uploads/2021/08/Octamar-BT25-Case-History-Tank-Cleaning.pdf" ); 
                                                    exit;
                                                    break;
                                                case 'Trident290CH':
                                                    wp_redirect( "https://innospec.com/wp-content/uploads/2021/08/Trident-290-Case-History-Blending-Economics.pdf" ); 
                                                    exit;
                                                    break;
                                                case 'Trident290CaseHTSPC':
                                                    wp_redirect( "https://innospec.com/wp-content/uploads/2021/08/Trident-290-Case-History-TSP-Creep.pdf" ); 
                                                    exit;
                                                    break;                                                                                                    
                                                default:
                                                     echo 'This is an unauthorized access to this page';
                                                    break;
                                            }

                                        } else {

                                            echo 'This is an unauthorized access to this page';
                                        }


                                    } else {                                                

                                        ?>
                                        <script type="text/javascript">
                                            jQuery(document).ready(function() {

                                                jQuery('#reguser').modal('show');

                                            });
                                            </script>
                                        <?php

                                    } 

                                    ?>


                                </div>
                            </div><!-- wrap-product -->

                        </div>

                </div>
            </div>
        </div>
    </section>



                  <div class="modal fade" id="reguser" tabindex="-1" role="dialog" aria-labelledby="reguserModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Please enter your name and email address to gain access to our resources</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 49, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>
<?php

get_footer();

?>
