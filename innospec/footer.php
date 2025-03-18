<div id="wrap-responsive-sidebar-image-questions" class="text-center"></div>
<footer id="footer">
        <div class="container custom-fluid">
            <div class="row">
                <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-logo') ) : ?> <?php endif; ?>
                <div class="col-xl-10 col-lg-12 ar wrap-menu ac-resp">
                    <?php $menu = array(
              						'theme_location' => 'footer-menu',
              						'container' => false,
              						'menu_class'=>  'menu'
              					);

                    wp_nav_menu( $menu ); ?>
                    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer-copy-right') ) : ?> <?php endif; ?>
                </div>
            </div>
        </div>
    </footer>

    <!-- lightbox -->
    <script src="<?php bloginfo('template_url') ?>/assets/js/simple-lightbox.js?v2.2.1"></script>
    <script>
        (function() {
            var $gallery = new SimpleLightbox('.gallery a', {

            });
        })();
    </script>
    <!-- end lightbox -->

<script type="text/javascript"> _linkedin_partner_id = "2556114"; window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || []; window._linkedin_data_partner_ids.push(_linkedin_partner_id); </script><script type="text/javascript"> (function(){var s = document.getElementsByTagName("script")[0]; var b = document.createElement("script"); b.type = "text/javascript";b.async = true; b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js"; s.parentNode.insertBefore(b, s);})(); </script> <noscript> <img height="1" width="1" style="display:none;" alt="linkedin" src="https://px.ads.linkedin.com/collect/?pid=2556114&fmt=gif" /> </noscript>
</body>

</html>


<!-- Button trigger modal -->
<!--
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
l
</button>
-->
<!-- MODALS CONTACT FORM -->

        <?php
          $page = get_the_id();
            if ($page === 400 ) {
                ?>
                  <div class="modal fade" id="cmweamericas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 4, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="cmweamericas22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 22, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="cmweamericas26" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 26, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweamericas27" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 27, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweamericas28" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 28, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweamericas29" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 29, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweamericas34" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 34, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>                  

                  <div class="modal fade" id="cmweamericas23" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 23, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="cmweamericas123" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 51, false, false, false, '', true, 10, false ); ?>

                             <script>
                                jQuery( document ).ready(function() {
                                    const address = "Papette a island lost on the test";

                                    jQuery("#input_51_12").val(address);
                                });
                             </script>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  <div class="modal fade" id="cmoilfeamericas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 13, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmoilfeamericas24" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 24, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmoilfeamericas25" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 25, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="modal fade" id="cmwemea" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 7, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmwemea30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 30, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>                  
                  <div class="modal fade" id="cmwemea31" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 31, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>                  
                  <div class="modal fade" id="cmwemea32" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 32, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="modal fade" id="cmwemea33" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 33, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="modal fade" id="cmwemea35" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 35, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="modal fade" id="cmwemea36" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 36, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>      
                  <div class="modal fade" id="cmwemea37" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 37, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>  
                  <div class="modal fade" id="cmwemea38" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 38, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="modal fade" id="cmwemea40" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 40, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div> 
                  <div class="modal fade" id="cmwemea41" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 41, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>   
                  <div class="modal fade" id="cmwemea42" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 42, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>         
                  <div class="modal fade" id="cmwemea43" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 43, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>                                              

                  <div class="modal fade" id="cmweasp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 15, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweasp39" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 39, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>  
                  <div class="modal fade" id="cmweasp44" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 44, false, false, false, '', true, 10, false ); ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweasp45" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 45, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweasp46" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 46, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="modal fade" id="cmweasp47" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 47, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>                  

                  <div class="modal fade" id="cmwiberia" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                             <?php echo gravity_form( 16, false, false, false, '', true, 10, false ); ?>

                        </div>
                      </div>
                    </div>
                  </div>

                <?php
            }
          ?>

<!-- END MODALS CONTACT FORM -->

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
           <?php echo gravity_form( 49, false, false, false, '', false, 10, false ); ?>
      </div>
    </div>
  </div>
</div>


<!-- others modals -->
<div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><strong>Send Message</strong></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php
          $page = get_the_id();

          ?>
      </div>
    </div>
  </div>
</div>
<script src="https://kit.fontawesome.com/2e81787de8.js" crossorigin="anonymous"></script>
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "hmda4dbo2d");
</script>

<!-- Initialise ExtraMile Analytics -->
<?php
  $ID = get_the_id();
  if ($ID != '2') {
  } else {
      ?>
      <script type="text/javascript">
          jQuery( document ).ready(function() {
              jQuery(".wrap-banner").css("visibility", "visible");
          });
      </script>
      <?php
  }
?>
<script>
   var cid = 8321;
   (function() {
   window.extramilecommunications = 'extramilecommunications';
   window.extramilecommunications = window.extramilecommunications || function(){
   (window.extramilecommunications.q = window.ga.q || []).push(arguments)
   },
   window.extramilecommunications.l = 1 * new Date();
   var a = document.createElement('script');
   var m = document.getElementsByTagName('script')[0];
   a.async = 1;
   a.src = "https://api1.websuccess-data.com/wltracker.js";
   m.parentNode.insertBefore(a,m)
   })()
</script>

<?php wp_footer(); ?>

