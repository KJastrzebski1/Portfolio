<?php get_header(); ?>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
</header>
<div class="container portfolio">
    <div class="row">
        <div class="col-sm-8">
            <?php $the_query = new WP_Query(['post_type' => 'portfolio-app']); ?>
            <?php if ($the_query->have_posts()) : while ($the_query->have_posts()) : $the_query->the_post(); ?>
                    <div class="col-sm-6">

                        <div class="proj">

                            <div class="logo"><?php the_post_thumbnail('full'); ?></div>
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
                                    foreach ($posttags as $tag) {
                                        echo '<li><span class="glyphicon glyphicon-ok my_mark"></span> ' . $tag->name . '</li>';
                                    }
                                }
                                ?></ul>
                        </div>


                    </div>
                    <?php
                endwhile;
            else :
                ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
        </div>
        <div class="col-sm-4" id="sidebar">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>