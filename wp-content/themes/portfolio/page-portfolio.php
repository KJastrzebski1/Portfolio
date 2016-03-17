<?php get_header(); ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
</head>
</header>
<div class="parallel">
    <div id="background_p" class="layer-0">
        <div class="transbox">

        </div>
        <div id="planet-1" class="planet layer-1">
            <div id="planet-2" class="planet layer-2">

            </div>

        </div>


    </div>
    <h1 class="intro-text">
        KRZYSZTOF JASTRZEBSKI
    </h1>
</div>

<div class="container portfolio">

    <div class="row">

        
            <?php $the_query = new WP_Query(['post_type' => 'portfolio-app']); ?>
            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-sm-6">

                        <div class="proj" >
                            <img src='<?php the_post_thumbnail_url('full');?>'>
                            <div class="attributes">
                                
                                <?php $mykey_values = get_post_custom_values('URL'); ?>
                                <a href="<?php echo $mykey_values[0]; ?>">
                                    <div class="my_title"> 
                                        <h2> <?php the_title(); ?>  <span class="glyphicon glyphicon-chevron-right"></span> </h2>
                                    </div>
                                </a>
                                <p> <?php the_content(); ?> </p>
                                <ul>
                                    <?php
                                    $posttags = get_the_tags();
                                    if ($posttags) {
                                        foreach ($posttags as $tag) {  ?>
                                            <li><span class="glyphicon glyphicon-ok my_mark"></span> <?php echo $tag->name; ?> </li><?php
                                        }
                                    }?>
                                    
                                </ul>
                            </div>
                        </div>
                    </div>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        
        
    </div>
</div>
<script>
    jQuery(document).ready(function(){
        jQuery('.proj').fadeIn(2000);
    });
</script>
<?php get_footer(); ?>