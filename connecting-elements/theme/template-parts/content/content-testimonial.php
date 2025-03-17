<?php
/**
 * Template part for displaying single testimonials
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package connecting-elements
 */

$title = get_the_title(); 
$id = get_the_id(); 
$description = get_field('content', $id);
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<section class="hero-default-section max-w-full h-[13em] xl:h-[344px] relative rounded-[0px_0px_50px_50px] bg-primary">
    
    <div class="overlay flex flex-col h-full w-full justify-end items-start text-left absolute z-[2] top-0 left-0">
     <div class="w-full mx-auto">       
        <?php if ($title) : ?>
            <h1 class="text-secondary max-w-fit bg-white rounded-tr-[50px] pt-[35px] lg:pt-[40px] pl-[20px] pr-[1.5em] lg:pr-[80px] -mb-[1px] animate__animated" data-animation="fadeIn" data-duration="1.2s">
                <?php echo $title; ?>
            </h1>
        <?php endif; ?>       
         </div>
   </div>
</section>
<section class="flex flex-col lg:flex-row items-start lg:gap-[60px] gap-[23px] padding-small">
    <div class="container mx-auto">  
    <div class="w-full bg-[rgba(182,184,186,0.10)] p-[22px] lg:p-[88px] lg:max-w-[90%] mx-auto rounded-tl-[50px] rounded-br-[50px] " >   
        <?php if($description): ?>
        <div class="font-text-font text-foreground style-disc mt-[10px] mb-3" >                 
            <?php echo $description; ?>                   
        </div>
        <?php endif; ?>        
        </div>           
    </div> 
</section><!-- .entry-content -->

</article><!-- #post-${ID} -->
