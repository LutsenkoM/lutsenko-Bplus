<?php
get_header('custom'); ?>
    <div class="container blog-page">
        <h2 class="title"><?php echo get_theme_mod('blog_title'); ?></h2>
        <p class="subtitle"><?php echo get_theme_mod('blog_subtitle'); ?></p>
        <?php
        if ( have_posts() ) :

            if ( is_home() && ! is_front_page() ) :
            endif;

            /* Start the Loop */
            while ( have_posts() ) : the_post(); ?>
                <div class="blog-item d-flex">
                    <div class="avatar-author"><?php echo get_avatar('', '', '', '', array('class'=>'img-fluid'));?></div>
                    <div>
                        <h3><?php the_title(); ?></h3>
                        <p>Posted dy: <?php the_author(); ?>, <?php the_date(); ?></p>
                        <?php the_post_thumbnail('full',array('class'=>'img-fluid margin-bottom')); ?>
                        <article><?php the_excerpt(); ?></article>
                        <a href="<?php the_permalink(); ?>" class="link-style float-right">Read more</a>
                    </div>
                </div>

            <?php endwhile;
        else :

            get_template_part( 'template-parts/content', 'none' );

        endif; ?>
        <!--            PAGINATION-->
        <div class="pag-wrap col-sm-12 center-xs d-flex justify-content-center">
            <?php
            global $wp_query;

            $big = 999999999; // need an unlikely integer

            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'total' => $wp_query->max_num_pages,
                'prev_text' => '',
                'next_text' => ''
            ));
            ?>
        </div>
        <!--            PAGINATION END-->
    </div>
<?php
get_footer();