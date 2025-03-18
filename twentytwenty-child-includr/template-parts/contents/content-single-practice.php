<?php
/**
 * The default template for displaying single practice content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<div class="section section-main-single mt-lg-0 mt-5">
		<div class="container">
			<div class="row row-center-lg equal ml-md-auto align-items-md-center">
				<div class="col-md-7 col-lg-10">
					<?php the_title( '<h1 class="title-post cl-dark pb-4 text-md-left text-center">', '</h1>' ); ?>
				</div>
				<div class="col-md-7">
					<div class="copy-text-lg cl-dark-3 text-md-left text-center"><?php the_excerpt(); ?></div>
					<div class="row equal justify-content-sm-between align-items-center">
						<div class="col-lg-7 text-md-left text-center">
							<div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
								<div>
									<h4 class="title-info title-info-cate cl-red pb-3">In Practice</h4>
									<span class="date-post cl-dark-3 hide-md">
										<?php the_time('F') ?> <?php the_time('d') ?>, <?php the_time('Y') ?>
									</span>
								</div>
								<div class="quote-author quote-author-sm d-flex align-items-center justify-content-center">
                                    <?php $authorimg = get_field('author_photo_pract');
                                    if( !empty($authorimg) ){ ?>
                                        <img class="rounded-circle img-quote" src="<?php echo esc_url($authorimg['url']);?>" alt="<?php echo esc_attr($authorimg['alt']);?>" width="53px">
                                    <?php }else{ ?>
                                        <img class="rounded-circle img-quote" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/img-author.png;" alt="Author" width="53px">
                                    <?php }?>
									<div class="pl-3 text-left">
                                        <?php $author = get_field('author_name_pract');
                                        if( $author ){
                                            $author_name = $author;
                                        }else{ $author_name = get_the_author();}?>

                                        <span class="cl-dark font-bold">
											By <?php echo $author_name;?>
										</span>
										<span class="date-post cl-dark-3 hide-tb d-block">
										<?php the_time('F') ?> <?php the_time('d') ?>, <?php the_time('Y') ?>
									</span>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg text-center text-lg-right pt-lg-0 pt-5">
							<?php echo do_shortcode('[addtoany]'); ?>
						</div>
					</div>
					<div class="mt-5 pt-3 featured-img-full-md">
						<?php if ( has_post_thumbnail() ) {
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); ?>
							<img class="img-fluid w-100" src="<?php echo $featured_img_url;?>">
						<?php } ?>
					</div>
					<div class="pod-description mt-md-5 mt-4 mb-md-5">
						<div class="copy-text copy-blockquote cl-dark-3 mt-md-4"><?php the_content(); ?></div>
					</div>
					<?php
					$number_percent = get_field('number_percent_pract');
					$img_percent = get_field('image_percent_pract');
					$text_percent = get_field('text_percent_pract');
					if( $text_percent ): ?>
						<hr>
						<div class="d-flex align-items-sm-center justify-content-around pt-md-2 pb-md-2">
							<div class="position-relative pr-md-5 pr-sm-3 box-percent-number">
								<?php if( !empty($img_percent) ): ?>
									<img class="image_percent" src="<?php echo esc_url($img_percent['url']); ?>" alt="<?php echo esc_attr($img_percent['alt']); ?>" />
								<?php endif; ?>
								<?php if( $number_percent ): ?>
									<div class="overlay-percent d-flex align-items-center justify-content-end pl-sm-4"><?php echo $number_percent;?></div>
								<?php endif; ?>
							</div>
							<?php if( $text_percent ): ?>
								<h3 class="title-percent pl-md-4 pl-xs-5 pl-4"><?php echo $text_percent;?></h3>
							<?php endif; ?>
						</div>
						<hr>
					<?php endif; ?>
					<?php $textinfo1 = get_field('info_text_1_pract'); ?>
					<?php if( $textinfo1 ): ?>
						<div class="mt-5">
							<div class="copy-text copy-blockquote cl-dark-2">
								<?php echo $textinfo1 ;?>
							</div>
						</div>
					<?php endif; ?>
					<?php $titletinfo1 = get_field('title_info_text_1_pract'); ?>
					<?php if( $titletinfo1 ): ?>
						<div class="m-less">
							<hr>
							<div class="pt-md-3 pb-md-3">
								<div class="copy-text-title cl-dark">
									<?php echo $titletinfo1 ;?>
								</div>
							</div>
							<hr>
						</div>
					<?php endif; ?>
					<?php $textinfo2 = get_field('info_text_2_pract'); ?>
					<?php if( $textinfo2 ): ?>
						<div class="mt-5 pt-md-4">
							<div class="copy-text cl-dark-2 copy-blockquote">
								<?php echo $textinfo2 ;?>
							</div>
						</div>
					<?php endif; ?>
					<?php if( have_rows('list_related_pract') ):
						$title = get_field('title_related_pract');
						$count = count(get_field('list_related_pract'));?>
						<div class="mt-5 pt-5">
							<?php if( $title ): ?>
								<h4 class="title-info cl-green-dark mb-md-5 mb-4"><?php echo $title;?></h4>
							<?php endif; ?>
							<?php $i=1; while( have_rows('list_related_pract') ) : the_row();
								$image = get_sub_field('image_related_pract');
								$name = get_sub_field('name_related_pract');
								$position = get_sub_field('position_related_pract');
								$text = get_sub_field('text_related_pract');
								?>
								<div class="list-person">
									<div class="quote-author d-flex align-items-center align-items-md-start justify-content-start">
										<?php if( !empty($image) ): ?>
											<img class="rounded-circle img-quote" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
										<?php endif; ?>
										<div class="pl-md-5 pl-3">
											<span class="cl-gray"><span class="cl-dark font-bold"><?php echo $name;?><?php if( $position ): ?>,<?php endif; ?></span> <?php if( $position ): echo $position; endif; ?></span>
											<?php if( $text ): ?>
												<div class="copy-text hide-md cl-dark-2 mt-2">
													<?php echo $text;?>
												</div>
											<?php endif; ?>
										</div>
									</div>
									<?php if( $text ): ?>
										<div class="copy-text hide-tb cl-dark-2 mt-3"><?php echo $text;?></div>
									<?php endif; ?>
								</div>
								<?php if($i < $count) : ?><hr><?php endif; ?>
								<?php $i++; endwhile; ?>
						</div>
					<?php endif; ?>
					<?php
					$id = get_the_ID();
					$terms = wp_get_post_terms( $id , 'practice_tag' );
					if ( $terms != null ){?>
						<div class="mt-5 pt-5 related-tags">
							<p class="cl-gray">Related tags:
								<?php $j = 1; foreach( $terms as $term ) { ?>
									<?php if($j>1){ ?>, <?php } ?><a class="cl-gray" href="<?php echo get_tag_link($term->term_id);?>"><?php echo $term->name; ?></a>
									<?php $j++;} ?>
							</p>

						</div>
					<?php } ?>
				</div>
				<?php
				$query = array(
						'post_type' => array('perspective', 'practice'),     //Most Popular 4 Articles (perspective and practice)
						'post_status' => 'publish',
						'meta_key' => 'wpb_post_views_count',
						'order' => 'desc',
						'posts_per_page' => 4,
						'post__not_in' => array(get_the_ID())

				);
				$all_articles = new WP_Query($query);
				if ( $all_articles->have_posts() ) : $total = $all_articles->post_count;?>
					<div class="col-md col-right-sidebar col-list-options mt-md-0 mt-5">
						<div class="box-list-group ml-md-auto bg-ligth p-md-5">
							<h3 class="list-group-title pb-md-4 pb-5">Our
								<svg class="icon-category mr-2 ml-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px">
									<image  x="0px" y="0px" width="18px" height="18px"  xlink:href="data:img/png;base64,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" />
								</svg>
								Picks
							</h3>
							<?php $i = 0; while($all_articles->have_posts()) : $all_articles->the_post();
								$post_type = $all_articles->posts[$i]->post_type;
								if($post_type == 'perspective'){
									$taxslug = "perspective_cat";
									$color = get_field('posttype-purple');
								}
								elseif($post_type == 'practice'){
									$taxslug = "practice_cat";
									$color = get_field('posttype-red');
								}?>
								<?php if($i == 0){ ?>
									<div class="card-post <?php echo esc_attr($color['value']); ?>">
										<div class="row equal align-items-start">
											<div class="col-4 col-md-12 order-2 order-md-1">
												<?php if ( has_post_thumbnail() ) {
													$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
													$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
													$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
													<a href="<?php the_permalink(); ?>">
														<div class="box-card-img box-card-sidebar mb-md-4">
															<img class="img-fluid w-100 h-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
														</div>
													</a>
												<?php } ?>
											</div>
											<div class="col-8 col-md-12 order-1 order-md-2">
												<?php $arcticle_terms = wp_get_object_terms( $post->ID,  $taxslug );
												if ( ! empty( $arcticle_terms ) ) {
													if ( ! is_wp_error( $arcticle_terms ) ) { ?>
														<div class="category-post pb-3">
															<?php if($post_type == 'perspective'){ ?>
																<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
																	<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,iVBORw0KGgoAAAANSUhEUgAAAfQAAAH0CAMAAAD8CC+4AAAABGdBTUEAALGPC/xhBQAAACBjSFJNAAB6JgAAgIQAAPoAAACA6AAAdTAAAOpgAAA6mAAAF3CculE8AAAANlBMVEX///9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv9iUv////+dKa9iAAAAEHRSTlMA0MCAYEAgoHAw8FCwkOAQY24VfwAAAAFiS0dEAIgFHUgAAAAHdElNRQflBBcQOwCSh6U/AAASyklEQVR42u2dCYLqIBBEyyXuS+5/2u8yfo0as0EXdPFOUM4boGlIgvrJbH5hsVgsq2qFggNWVbW8CL16nb2IRt3GbL5ebKotO3dhONtqs1g3NDdpl/5gd5G/L+6zYLu/yN51Ku2W/hj4h6I+YS66D7O+LntLvzM/bor5xKg2x/kwiwOl/5lflkIvCVbLob5HS7+yO5Qhz2W7OXSv3mGlF/FMJgifKv0uvkz1tqyWk4SHkH7ldNyz/xIq7I+nAMJCSK9vA/7M/oN45zx9iIeVfmW2KRN9NFab3rtwU+nFeyyCGg8uvXgPT2jjMaRfKOt7MC7reARBMaRf6rp1qecDsF9HsRNJ+oXTokzzk1gtQuzObKVfOJThPpp9jGndQnoZ7iOJOMgNpF9YV+w/YW5UkVZyQ+mXTdyS/WfMiWXwDRpF+qWYX5Q9XC/Oi0CN1gSkX/dwZXHvZLU2UW4m/ULR/ptV9KWcIL2u56Wma6Uac+0pB+lFexumyq2lF+3fMFZuL/2ivdyra2CunCG9lHSvGJZvXOkX7WXffoOinCW9tGuuGLVikpF+0S7fnF2SlBOl1/VMupCvDHrsCUqv64NsRbeKeVyetnTVpf28oP7VydLr+iR4u2Yf94pE+tL15njuzJ6I9Mscz/ZgCWub9grYAa7MZDqzW2LN/gTsAHeOEgXd+cj+O98BO8AfJ4FNe8Uu4B6AHeA/3gd7KsO8Tkm688GezDCvk5J+GexsM/FIZ5jXiUl3W8anUbT/B+wAb2zYfmKwYf9V3wA7wDtzd/Xc2f4+VAdgB/hg56ye2yfQgnsD7ABfcFXPJVXB/QF2gG/M3JzBrNKq4P4AO8BXdk4OXBOc2q+AHaAFFydv5LsSrYAdoI38q/j0qvYHYAdo5ZR5o2abUN/1DbADtJP3JWneBeduwA7wi4z3binu1P4DdoCf5Lqwp7uc3wA7wG/yPIFJ7HzlA7ADdJBjU7ZKeDm/AXaATrIr55bsv1gnYAfoJrNyLukS7g7YAXqwZnscAueJ82GAHaAPs2yK+HPiJdwdsAP0IhfreTjPRHomPdmEO68NwA7Qk10G1repb9UegB2gL+lbz8Z5PtKTP39J+YTlDbADDCBp6+m3ZJ6AHWAICVvPyXle0tO1npXzzKSnaj0v57lJT9N6Zs6zk56i9dyc5yc9PevZOc9QemrW83Oeo/S0rGfoPEvpKVnP0Xme0utk+vBb9l9iFGAHGEUqpy/5nLE0ADvAONKwnqnzXKXXuwTu0pwzdZ6t9ARuUGVyN+oLYAcYDdt6vs4zls6+GZ3DXecWwA4wAar1jJ1nLZ3ZpMmyKfMA7ACToL2PaM/+5ZMAO8AkWNv1XDfof4AdYBonSgl/zuShhjbADjCRGUN6vpu1O2AHmAqhhM+5cL8BdoDJmJfwWRfuN8AOMB3jYi7P09QGYAeYju3ZS7anLC+AHSAApsVc7kXcFbADhMDwrTQZvFGmG7ADBMGsmMu/iLsCdoAgWHXmMu/EPQA7QBhsDtczPkJvAHaAQJj0aLLvyvwBdoBQGBy4+VjQa0fSd9E/9rPysaDXjqTH3607WdBrT9Jjf+sn1a/wjADsAAGJ+pbwiv3rAgJ2gIDEvFGR+72JBmAHCEnEfZuX3doNsAMEJdq+Le+LkO+AHSAosU5ZPZynvgB2gLAc4kg/sH9XWMAOEJgoE7yvyd2f9BgTvLPJ3Z/0GBO8s8ndofTwLRpPbZk7YAcITugWjau2zB2wA4Qn8I05F7fimoAdIAJB7045uOb+AdgBIhD0kNXPgeoTsAPEYBPO+Yb9W2IAdoAYhNusu9ui3wA7QBSCHbe5Olz7D9gB4hBos+5vi34D7ABxmIeR7rGKq91KD/Ogk5s7z2+AHSASIWo5n1Vc7Vd6iLuxju6/NgE7QDQmP/ywYv+CaIAdIBqTt20+t2tXwA4Qj4kteKfbtStgB4jHxG3bnJ0/HmAHiMikDo3jge5a+qTTNqd9mRtgB4jJhA6N177MDbADxOQ0Xrq/O1IvgB0gKqOHuuuB7lz66KHueqA7lz52qPse6N6ljxzqvge6d+njhrrzge5e+qih7nygu5c+Zqh7H+j+pY8Y6t4Hun/pwzvw3p5G/wTsANEZfNjm+HjtD7ADxGfgUPd8vPYH2AHiM/AKjbtXEHwCdgADBt2W83sz7gnYAQwYNNT93ox7AnYAA4bcgXd71/0VsANYMODRZZePJr8DdgALBjRo3DdmroAdwITerxT035i5AnYAE3q/XM5/Y+YK2AFs6LlrU9iv1TLSe75mzOHrw74BdgAbdv2kK+zXahnp/Y7V3R+k/wF2ACN6nbVplHE60vuUciJlnJD0Hm+mcPvmiXfADmBFj66cRDfuCtgBzOi8SyFwe+IPsAOY0XnAqnCoegfsAGZ0HbBKHKreATuAHR1bdZVNei0lvePUReBu3AOwAxjyc34/s9MZAnYAQ37O70Kzu5T0n/O70OwuJf3X/K40u2tJ/zG/K83uWtJ/zO9Ks7uW9Pb5XWp2F5PeOr9Lze5i0lvnd6nZXUx661U5djBbxH5uy1MPGs84/AfsALa0nK/qnKreADuALS33Z2TuzNwBO4AxX7/x4fFz2b8AO4AxX59alng++QWwAxjz9f67yn33B2AHMP/B8hs2QelfNm1iGzZB6V+eXxV5VvUJ2AGs+fIJJ88fZvoK2AHM+Thp0zphuwJ2AHP28ku6oPSj/JIuKH0mv6QLSn9f1PWWdEXpe/UlXVH62+sJZF5F8ATsAPa8td/VGu+1pPS39js7DeMPwA5AoHGmrnaWfgXsAAQaZ+pqZ+lXwA5AoHFRTux63A2wAxBotGf0WjOa0mvxOk5T+svbxXTeI/YC2AEYbLTrOE3pa+06TlP6S09OsB8nKr3WruNEpf9/D7hiP05V+v/TVcFz1VpV+v/TVcFz1VpV+v83Umi9geIB2AEozKWLd1HptXTxrir9r3yX+VRPE7ADcKiEO++y0jfCnXdZ6QvlHZuq9Lly8V6kKwJ2ANbvFt6xFemKqP7uSnjHVqQrAnYAEhvhbbqs9IXwNl1W+lH2VmStK30uvE0v0hUBOwCJ24c9dD6e3QTsALQfrtubKdIVkf3hW9VL77Ww9Eq3IVekKwJ2ABaV6uMttbD0hW4XtkhXBOwALIp0QYp0Qda6h2y60ue65y1FuiJgB2BRpAtSpAtSpAtSpAtSpAtSpAtSpAtykX5iZ2ABdgAWc90rckW6IrK/vEzvgpRCTpAiXZAiXZAiXZAiXZAiXZAiXZAiXZAiXZByBVqQ8rCDIEW6IEW6IEW6IOWlBIKU148IUqQLUl4pJkh5eaAgRboe5YXAgpRXfwtSpAtSPuchSPlwjyDlE12ClI/xCVKkC1I+sCtIka7H/C5ddKMOdgAORbogi7t00Y062AE4bO7SRTfqYAfgUN2li+7ZwA7AYXWXvmLn4AB2ANLPhvKeTfNnzx/SNct3sANQODykH9hJKIAdgMLiIV1zzwZ2AAr7h3TNh1zADkBh9ZCuefUd7ACcXw3p8l3yV8+f0iXLd7ADMFg/pUvejQQ7AIPNU7pk9x3sAAyqp3TJ7jvYASg/GtqVnOKPnr1Kn7HTEAA7AIH1q3TFSg7sAAQ2r9IVKzmwAxDYvkpX7MmBHYDxmyFeyQn+5nlTumBPDuwA9iya0gVPV8EOYM++KV3wdBXsAPacm9LP7Dz2gB3AnBne0GvPgB3AnOO79CM7kTlgBzBn/y5db1EHO4A553fpeos62AGs+VjSBRd1sANYc/yULreogx3Amv2ndLlFHewA5j/4C+xM5n8DdgBj5t+kq7XfwQ5gzOabdLUzdbADGLP9Jl3tTB3sALac8JUTO5ctYAewZf1duthFObAD2LL/Ll1s0wZ2AFN2aIEdzBatn3tok671RgqwA5iybJO+ZCczBewAppzbpGudtIEdwJLW2V1sfgc7gCXLdulS8zvYASw5t0uXmt/BDmDIj9lda34HO4Ahy1/SleZ3sAMYcv4lXWl+BzuAHT9nd6n5HewAdix/Sxea38EOYMbu/Fv6WefD2mAHMGONDnTOV8EOYEbVJV3n7WJgB7Di1OVc6P4M2AGsWHRLl3k9AdgBrFh1S5f5jA/YAYyYdzvXuf8OdgAjln2kq2zVwQ5gw66Pc0Bkqw52ABuO/aSLPL8KdgAbepRxQqUc2AFMOPRzrlLKgR3AhH1f6RpPPYAdwIIe3bgHEl05sANYsOkvXeKpZbADGNB1qPqKxAEr2AEM6DxUfUXhgBXsAAb03K/dUdi1gR0gPoMGusRdObADxKfz9kQTgbsUYAeITq/ztVf8N2jADhCdgQNdoUEDdoDYDGjMPHDfoAE7QGx6HaQ3cX+sDnaAyIwY6P6HOtgBIjNioPsf6mAHiMuoge5+qIMdIC6jBrr7oQ52gKiMHOjehzrYAaIycqB7H+pgB4jJ6IHufKiDHSAmowe686EOdoCIzMY79/0JJ7ADRGRw1/0Vz4dtYAeIx+DjtSaOD9vADhCP7TTpjoc62AGiMfDCzCd+b8uBHSAag27GfcPvbTmwA8Six5snunD7ZgqwA0RiyF33NtzegQc7QCQm9GWeeO3QgB0gDhO3aw+cdmjADhCHSX2ZJ063bWAHiMLk7doDn9s2sAPEIEQVd8dnLQd2gBgMeDS5C5ePLoMdIAKTTtfe8VjLgR0gAhOb7k08fmYb7ADh6fn6sL44fM0Y2AGCcwpWxd05+7s5BXaA4ATaoj/xt1kHO0Boer8yrj/uXlMAdoDAhNuiv0zw3jbrYAcITO/XBA7B2xPrYAcIS4TJ3eEED3aAoMSY3B1O8GAHCEqUyd3fBA92gJAEO1z7xNVxG9gBAhK6LfOKqxYN2AECErwt84qnFg3YAcIR4P7rLxzdjQU7QDCCHqh+w88hK9gBQrGb/HBDFys3+zawA4Qi2m7tiZsb0WAHCETE3doTL/s2sAOEYRZxt/bk7GRZBztAEHZBb0i1s/WxrIMdIAhBHmLqg49lHewAIQh8K+4XLm7MgR0gANF36K94WNbBDjCdWOep3/Fwygp2gOkYFXEPHFyEBzvAZMyKuAf5F3NgB5iKSVemSfY9GrADTMS0iHuQezEHdoBpxLw30U7uNyrADjAJq07cO5l35sAOMAmDo7Xv5H1REuwAUzAv3J9kXcKDHWAChML9Sc4lPNgBxkN1nrV1sAOMxuYIvZ2MD9fBDjAWtvOcrYMdYCS2pywt1nPduIEdYBysDXqTXLfrYAcYRRrOs7UOdoBRJOI813NWsAOMgdiUeSfLJg3YAUaQkPM8rYMdYDhJOc/SOtgBBpOY8xytgx1gKMk5z9A62AEGkqDz/KyDHWAYSTrPzjrYAQaRqPPcrIMdYAjJOs/MOtgBBpCw87ysgx2gN7uknV+s59OHBztAX1I5Y2knn9MXsAP0JH3nGVkHO0A/Thk4v1jP5CEIsAP0gn83qh+Z3KACO0AfcnGei3WwA/SAfNd5GDncjAY7QDeGb5QJQQZvpQE7QCeJb88/Sb9NA3aADnZR3+cdhyr1rRvYAX4zy2Kr9s428XIO7AA/mWdTtjc5z9l/uZ+AHeAXmZVwryRdzoEdoJ3UT1h+k/L5C9gBWsmj89pOwj1ZsAO0kety/iTdhR3sAC1E/gqPDal+6wfsAF/Z0d4gFJZ9mgs72AG+MYv+ER4rVknu2MEO8IWMd2qfpLh3AzvABzk2Xn+RYFMW7ADv5F+1v5NeFQ92gDc2bEUx2LD/qm+AHaBBnucr3SR2AgN2gFdcVXBNkqrnwA7w5OSsgmtSJdSVBTvAf47uKrgm53QGO9gB/vA9zO8kM9jBDnBn4XyY30llsIMd4IrXov2TNMp4sAPU9c7l3ryNRQINOrAD1Ac3pyv9WB3Yf3G69JOTQ9Qh7NkFHVf6TqOAe+dMvl1Bla42sz/hzvFE6TOBrXk7FbGOp0nP+4JzCHiXpEnSRRfzJmfW9o0jfS27mDdZcZ5mZ0gvyp9QtNtLn8v0XPtR2d+mspY+ly7Zv2Ou3VZ6Uf4dY+2W0ovydky120kv5dtvDEs6I+m7oryb1dpo324ivbRiemLUrjGQPpNvuA5hadCTjy59Xaq3gVTRF/e40k+LspSPYLWIe80ipvSD4K2YUOxjHrhHk14G+UQiDvc40ndlJQ/BPtIeLob0w7Ls0AJxXsaY5oNLn23KtB6U1Sb4Ji6s9GI8CqG9B5RejEckqPdA0ndlHY/OZX0PVNeFkH46lg25EftjiH3cVOmXIV4mdVNW0wf8FOm7w6bcd6Ow3UwSP1Z6Ec5mgvgx0ufHMqWnwWp5HHPNaqD0+bEM8NTYboaa7y19dljsi+9k2e4Xh947+W7pu/m66M6Ei/r1vHulb5c+u8jeVMV2hmyrzUX+rJf02fzCYrFYVlUp1FywqqrlRejV6+u/wD9g98TcZn4FYwAAAABJRU5ErkJggg==" />
																</svg>
															<?php } elseif($post_type == 'practice'){ ?>
																<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
																	<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
																</svg>
															<?php } ?>
															<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
																<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
																<?php if($j <= 3):?>
																	<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
																<?php endif; ?>
																<?php $j++; } ?>
														</div>
													<?php } }?>
												<h5 class="title-post cl-dark"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title();?></a></h5>
											</div>
										</div>
									</div>
									<hr>
								<?php }else{ ?>
									<div class="card-post <?php echo esc_attr($color['value']); ?>">
										<div class="row equal align-items-start">
											<div class="col-8 col-md-12">
												<?php $arcticle_terms = wp_get_object_terms( $post->ID,  $taxslug );
												if ( ! empty( $arcticle_terms ) ) {
													if ( ! is_wp_error( $arcticle_terms ) ) { ?>
														<div class="category-post pb-3">
															<?php if($post_type == 'perspective'){ ?>
																<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
																	<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
																</svg>
															<?php } elseif($post_type == 'practice'){ ?>
																<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
																	<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
																</svg>
															<?php } ?>
															<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
																<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
																<?php if($j <= 3):?>
																	<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
																<?php endif; ?>
																<?php $j++; } ?>
														</div>
													<?php } }?>
												<h5 class="title-post cl-dark"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title();?></a></h5>
											</div>
											<div class="col-4 hide-tb">
												<?php if ( has_post_thumbnail() ) {
													$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
													$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
													$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
													<a href="<?php the_permalink(); ?>">
														<div class="box-card-img">
															<img class="img-fluid h-100 w-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
														</div>
													</a>
												<?php } ?>
											</div>
										</div>
									</div>
									<?php if($i < ($total - 1)): ?><hr><?php endif; ?>
								<?php } ?>
								<?php $i++; endwhile; ?>
						</div>
					</div>
				<?php endif; wp_reset_postdata();?>
			</div>
		</div>
	</div>
	<?php
	$query = array(
			'post_type' => array('perspective', 'practice'),     //Last 4 Articles (perspective and practice) order by date
			'post_status' => 'publish',
			'orderby' => 'post_date',
			'order' => 'desc',
			'posts_per_page' => 4,
			'post__not_in' => array(get_the_ID())

	);
	$all_articles = new WP_Query($query);?>
	<?php if ( $all_articles->have_posts() ) : ?>
		<div class="section-recent-articles section-all-stories mb-0 pt-5">
			<div class="container">
				<div class="row hide-md">
					<div class="col-md-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4 class="title-post cl-dark pb-5 pt-3">Related Articles</h4>
					</div>
				</div>
				<div class="row equal">
					<?php $i = 0; while($all_articles->have_posts()) : $all_articles->the_post();
						$post_type = $all_articles->posts[$i]->post_type;
						if($post_type == 'perspective'){
							$taxslug = "perspective_cat";
							$color = get_field('posttype-purple');
						}
						elseif($post_type == 'practice'){
							$taxslug = "practice_cat";
							$color = get_field('posttype-red');
						}?>
						<div class="col-md-4 col-lg-3 mb-md-4 col-post-items">
							<div class="card-post <?php echo esc_attr($color['value']); ?>">
								<div class="row equal align-items-start">
									<div class="col-4 col-md-12 order-2 order-md-1">
										<?php if ( has_post_thumbnail() ) {
											$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
											$thumbnail_id = get_post_thumbnail_id( get_the_ID() );
											$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);?>
											<div class="box-card-img pb-md-4">
												<a href="<?php the_permalink(); ?>">
													<img class="img-fluid w-100 h-100" src="<?php echo $featured_img_url;?>" alt="<?php echo $alt;?>">
												</a>
											</div>
										<?php } ?>
									</div>
									<div class="col-8 col-md-12 order-1 order-md-2">
										<?php $arcticle_terms = wp_get_object_terms( $post->ID,  $taxslug );
										if ( ! empty( $arcticle_terms ) ) {
											if ( ! is_wp_error( $arcticle_terms ) ) { ?>
												<div class="category-post pb-3 pb-lg-4">
													<?php if($post_type == 'perspective'){ ?>
														<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
															<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
														</svg>
													<?php } elseif($post_type == 'practice'){ ?>
														<svg class="icon-category mr-2 d-inline" xmlns="http://www.w3.org/2000/svg"	xmlns:xlink="http://www.w3.org/1999/xlink" width="12px" height="12px">
															<image  x="0px" y="0px" width="12px" height="12px"  xlink:href="data:img/png;base64,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" />
														</svg>
													<?php } ?>
													<?php $j = 1; foreach( $arcticle_terms as $term ) { ?>
														<?php if($j > 1 && $j <= 3):?>, <?php endif; ?>
														<?php if($j <= 3):?>
															<a href="<?php echo esc_url( get_term_link( $term->slug, $taxslug ) );?>"><?php echo esc_html( $term->name );?></a>
														<?php endif; ?>
														<?php $j++; } ?>
												</div>
											<?php } }?>
										<h5 class="title-post cl-dark pb-md-3"><a href="<?php the_permalink(); ?>" class="cl-dark"><?php the_title();?></a></h5>
										<div class="copy-post"><?php the_excerpt(); ?></div>
									</div>
								</div>
							</div>
							<hr class="hide-tb">
						</div>
						<?php $i++; endwhile; ?>
				</div>
			</div>
		</div>
	<?php endif; wp_reset_postdata();?>
</article><!-- .post -->