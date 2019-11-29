<?php get_header(); ?>


<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">

                    <?php if (is_active_sidebar('cart-shop')) : ?>

                    <?php dynamic_sidebar('cart-shop'); ?>

                    <?php endif; ?>

                </div>
            </div>
            <div class="col-sm-9">
                <div class="blog-post-area">
                    <h2 class="title text-center">Latest From our Blog</h2>
                    <?php
                    while (have_posts()) : the_post();
                        $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

                        ?> <div class="single-blog-post">
                        <h3>the_title();</h3>
                        <div class="post-meta">
                            <ul>
                                <li><i class="fa fa-user"></i> <?php the_author(); ?></li>
                                <li><i class="fa fa-clock-o"></i> <?php echo get_post_time('g:i a', true, get_the_id(), true); ?></li>
                                <li><i class="fa fa-calendar"></i><?php echo get_post_time('F j, Y', true, get_the_id(), true); ?></li>
                            </ul>
                            
                        </div>
                        <a href="<?php echo  $feat_image; ?>">
                            <?php get_the_post_thumbnail(get_the_id(),'medium') ?>
                            <img src="<?php echo  $feat_image; ?>" alt="">
                        </a>
                        <?php the_content();?>


                        <?php




                            // If comments are open or we have at least one comment, load up the comment template.
                            if (comments_open() || get_comments_number()) :
                                comments_template();
                            endif;
                            ?> <?php
                                endwhile; // End of the loop.
                                ?>


                    </div>
                </div>
            </div>
        </div>
</section>
<?php get_footer(); ?>