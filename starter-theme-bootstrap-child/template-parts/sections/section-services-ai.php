<?php 
$title_services = get_field('title_services');  
$subtitle_services = get_field('subtitle_services');  
$description_services = get_field('description_services');  

?>
<div class="scroll-info"><span id="scrollPos"></span></div>
<section class="section-services-ai">
   <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($title_services): ?>
                    <div class="title-section-service cl-orange text-center"><?php echo $title_services;?></div>
                <?php endif; ?> 
                <div class="service-ai-text">
                    <div class="title"><?php echo $subtitle_services;?></div>
                    <div class="text">
                        <?php echo $description_services;?>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="wrap-startups">
            <div class="row">
                <div class="col-md-6">
                    <div class="ai-wrap ai-startups">
                        <?php if( have_rows('ai_startups_group') ): ?>
                        <?php while( have_rows('ai_startups_group') ): the_row(); ?>
                        <div class="box-title"><?php echo get_sub_field('headline'); ?></div>
                        <div class="box-content" style="display:none;">
                            <?php if(have_rows('ai_startups_block_1')): $i=0; ?>
                            <div class="wrap-items wrap-items-top">
                                <?php while(have_rows('ai_startups_block_1')): the_row(); ?>
                                <div class="item <?php echo $i==0?"open":""; ?>">
                                    <div class="item-title"><?php echo get_sub_field('title'); ?></div>
                                    <div class="item-content" <?php echo $i!=0?"style='display:none;'":"";  ?>>
                                        <?php echo get_sub_field('text'); ?>
                                    </div>
                                </div>
                                <?php $i++; endwhile; ?>
                            </div><!-- wrap-items-top -->
                            <?php endif; ?>

                            <?php if(have_rows('ai_startups_block_2')): $i=0; ?>
                            <div class="wrap-items wrap-items-bottom">
                                <?php while(have_rows('ai_startups_block_2')): the_row(); ?>
                                <div class="item">
                                    <div class="item-title"><?php echo get_sub_field('title'); ?></div>
                                    <div class="item-content" style='display:none;'>
                                        <?php echo get_sub_field('text'); ?>
                                    </div>
                                </div>
                            <?php $i++; endwhile; ?>
                            </div><!-- wrap-items-bottom -->
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- ai-startups -->
                    
                </div>
                <div class="col-md-6">
                    <div class="ai-wrap ai-enterprice">
                        <?php if( have_rows('enterprise_ai_group') ): ?>
                        <?php while( have_rows('enterprise_ai_group') ): the_row(); ?>
                        <div class="box-title"><?php echo get_sub_field('headline'); ?></div>
                        <div class="box-content" style="display:none;">
                            <?php if(have_rows('enterprise_ai_block_1')): $i=0; ?>
                            <div class="wrap-items wrap-items-top">
                                <?php while(have_rows('enterprise_ai_block_1')): the_row(); ?>
                                <div class="item <?php echo $i==0?"open":""; ?>">
                                    <div class="item-title"><?php echo get_sub_field('title'); ?></div>
                                    <div class="item-content" <?php echo $i!=0?"style='display:none;'":"";  ?>>
                                        <?php echo get_sub_field('text'); ?>
                                    </div>
                                </div>
                                <?php $i++; endwhile; ?>
                            </div><!-- wrap-items-top -->
                            <?php endif; ?>

                            <?php if(have_rows('enterprise_ai_s_block_2')): $i=0; ?>
                            <div class="wrap-items wrap-items-bottom">
                                <?php while(have_rows('enterprise_ai_s_block_2')): the_row(); ?>
                                <div class="item">
                                    <div class="item-title"><?php echo get_sub_field('title'); ?></div>
                                    <div class="item-content" style='display:none;'>
                                        <?php echo get_sub_field('text'); ?>
                                    </div>
                                </div>
                            <?php $i++; endwhile; ?>
                            </div><!-- wrap-items-bottom -->
                            <?php endif; ?>
                        </div>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </div><!-- ai-startups -->
                </div>
            </div>
        </div><!-- wrap-startups -->
        
   </div>
</section>


<style type="text/css">
    .wrap-startups{
        background:#C9E7E7;
        border-radius: 100px;
        margin-bottom: 3.3rem;
        padding:5.5rem 5rem;
    }
    .ai-wrap{
        background: #F1F3F3;
        border-radius: 45px;
        overflow: hidden;

        border: 1px solid #2567B8;
        box-shadow: 0px 3.42px 3.42px 0px rgba(0, 0, 0, 0.25);
    }
    .ai-wrap.ai-enterprice{
        border: 1px solid #EA5E29;
    }
    .ai-wrap .box-title{
        color:white;
        font-family: "Lora", serif;
        font-size: 34px;
        padding:2rem;
        text-align: center;
    }
    .ai-wrap .box-title:hover{
        cursor:pointer;
    }
    .ai-startups .box-title{
        background: #2567B8;
    }
    .ai-enterprice .box-title{
        background: #EA5E29;
    }
    .ai-wrap .box-content{
        padding: 2.3rem;
    }
    .ai-wrap .wrap-items .item{
        border:1px solid #2567B8;
        border-radius: 4px;
        margin-bottom: 14px;
    }
    .ai-wrap.ai-enterprice .wrap-items .item{
        border:1px solid #EA5E29;
    }
    .ai-wrap .wrap-items .item-title{
        color:black;
        font-family: "Avenir Next LT Pro Regular", serif !important;
        font-size: 22px;
        font-weight: 600;
        padding:7px 25px 7px 75px;
        position: relative;
    }
    .ai-wrap .wrap-items .item-title:hover{
        cursor:pointer;
    }
    .ai-wrap .wrap-items .item-title:before{
        background-image: url(data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMjEiIGhlaWdodD0iMTYiIHZpZXdCb3g9IjAgMCAyMSAxNiIgZmlsbD0ibm9uZSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj4KPHBhdGggZD0iTTEuNSA2LjgzNjNDMC45NDc3MTUgNi44MzYzIDAuNSA3LjI4NDAyIDAuNSA3LjgzNjNDMC41IDguMzg4NTkgMC45NDc3MTUgOC44MzYzIDEuNSA4LjgzNjNMMS41IDYuODM2M1pNMjAuMjA3MSA4LjU0MzQxQzIwLjU5NzYgOC4xNTI4OSAyMC41OTc2IDcuNTE5NzIgMjAuMjA3MSA3LjEyOTJMMTMuODQzMSAwLjc2NTIzN0MxMy40NTI2IDAuMzc0NzEzIDEyLjgxOTUgMC4zNzQ3MTMgMTIuNDI4OSAwLjc2NTIzN0MxMi4wMzg0IDEuMTU1NzYgMTIuMDM4NCAxLjc4ODkzIDEyLjQyODkgMi4xNzk0NUwxOC4wODU4IDcuODM2MzFMMTIuNDI4OSAxMy40OTMyQzEyLjAzODQgMTMuODgzNyAxMi4wMzg0IDE0LjUxNjggMTIuNDI4OSAxNC45MDc0QzEyLjgxOTUgMTUuMjk3OSAxMy40NTI2IDE1LjI5NzkgMTMuODQzMSAxNC45MDc0TDIwLjIwNzEgOC41NDM0MVpNMS41IDguODM2M0wxOS41IDguODM2MzFMMTkuNSA2LjgzNjMxTDEuNSA2LjgzNjNMMS41IDguODM2M1oiIGZpbGw9IiMyMzJGM0UiLz4KPC9zdmc+Cg==);
        background-repeat: no-repeat;
        content:'';
        
        width: 22px;
        height: 16px;
        display: inline-block;
        position: absolute;
        top: 0px;
        left: 20px;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
    }
    .ai-wrap .wrap-items .item.open .item-title:before{
        transform: rotate(90deg);
    }
    .ai-wrap .wrap-items .item.open .item-title{
        color:#2567B8;
        font-size: 22px;
    }
    .ai-wrap.ai-enterprice .wrap-items .item.open .item-title{
        color:#EA5E29;
    }
    .ai-wrap .wrap-items .item-content{
        border-top:1px solid #2567B8;
        color:black;
        font-family: "Avenir Next LT Pro Regular", serif !important;
        font-size: 22px;
        font-weight: 400;
        padding:10px 22px;
    }
    .ai-wrap.ai-enterprice .wrap-items .item-content{
        border-top:1px solid #EA5E29;
    }
    .wrap-items-top{
        margin-bottom: 3rem;
    }
    .scroll-info {
        position: fixed;
        top: 10px;
        left: 10px;
        background: rgba(0, 0, 0, 0.0);
        color: #fff;
        padding: 5px;
        z-index: 1000;
    }
    @media(max-width:767px){
        .wrap-startups{
            border-radius: 40px;
            margin-bottom: 3.3rem;
            padding: 1rem 1rem;
        }
        .ai-wrap .box-title {
            font-size: 24px;
            padding: 1rem;
            line-height: 1;
        }
        .ai-wrap.ai-startups{margin-bottom: 1rem;}
        .ai-wrap .box-content {
            padding: 1rem;
        }
        .ai-wrap .wrap-items .item-title {
            padding: 7px 15px 7px 35px;
        }
        .ai-wrap .wrap-items .item-title:before{
            background-size: 100% 100%;
            left: 10px;
            width: 15px;
            height: 12px;
        }
        .ai-wrap .wrap-items .item-title,
        .ai-wrap .wrap-items .item-content {
            font-size: 18px;
        }
        .ai-wrap .wrap-items .item-content{
            padding: 10px 15px;
        }
        .ai-wrap .wrap-items .item.open .item-title {
            font-size: 18px;
        }
        .section-services-ai .title-section-service {
            margin-bottom: 20px;
            margin-top: 0px;
        }
        .section-services-ai .service-ai-text {
            font-size: 22px;
            line-height: 30px;
        }
        .section-services-ai .service-ai-text {
            margin-bottom: 2rem;
        }
        .ai-wrap {
            border-radius: 30px;
        }
    }
</style>