<?php get_header(); ?>
<section class="s-content">
    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h1><?php single_cat_title(); ?></h1>
            <p class="lead">
                <?php echo category_description(); ?>
            </p>
        </div>
    </div>
    <div class="row masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>

        <?php if(!have_posts()) : ?>
            <h4 class="text-center"><?php _e("There is no post in this category.","philosophy") ?></h4>
        <?php endif; ?>
        <?php 
        while(have_posts(  )){
          the_post(  );
          get_template_part( "template-parts/post-formats/post", get_post_format() );
        }
        ?>

        </div>
    </div>
    <div class="row">
        <div class="col-full">
            <nav class="pgn">
                <?php philosophy_pagination(); ?>
            </nav>
        </div>
    </div>
</section>
<?php get_footer(); ?>