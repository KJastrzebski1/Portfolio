<?php

/**
 * Adds Foo_Widget widget.
 */
class Slider_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
        parent::__construct(
                'proj_slider', // Base ID
                __('Project Slider', 'text_domain'), // Name
                array('description' => __('Slider with portfolio projects', 'text_domain'),) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget($args, $instance) {
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . apply_filters('widget_title', $instance['title']) . $args['after_title'];
        }
        ?>

    <div class="slider">
        <br>
        <?php
        $array = ['post_type' => ['portfolio-app']];
        $query = new WP_Query($array);
        ?>
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                
                
                <?php
                $num = $query->post_count;
                for ($i = 1; $i < $num; $i++) { ?>
                   <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class></li>
                <?php  } ?>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php if ($query->have_posts()) : ?>
                    <div class="item active">
                        <?php $query->the_post(); ?>
                        <?php  echo the_post_thumbnail('large'); ?>
                        <div class="carousel-caption">
                            <h2><?php the_title(); ?></h2>
                            <p><?php the_excerpt(); ?></p>
                        </div>
                    </div>
                    <?php while ($query->have_posts()) : $query->the_post(); ?>


                        <div class="item">
                            <?php  echo the_post_thumbnail('large'); ?>
                            <?php $mykey_values = get_post_custom_values('URL'); ?>
                                <a href="<?php echo $mykey_values[0]; ?>">
                            <div class="carousel-caption">
                                <h2><?php the_title(); ?></h2>
                                <p><?php the_excerpt(); ?></p>
                            </div></a>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>

                <?php else : ?>
                    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
                <?php endif; ?>

                
            </div>
        </div>

    </div>
       
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form($instance) {
        
        echo 'Nothing to see here ';?>
        
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance) {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title']) ) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }

}

// class 