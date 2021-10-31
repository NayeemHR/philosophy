<?php 
/*
* Template Name: Contact Page
*/
the_post(  );
get_header(); ?>
<section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-standard">
        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                <?php the_title(); ?>
            </h1>

        </div>
        <div class="s-content__media col-full">
            <?php 
            if(is_active_sidebar("contact_map")){
                dynamic_sidebar("contact_map");
            }
            ?>
        </div>
        <div class="col-full s-content__main">
            <?php the_content(); ?>
        </div>
        <div class="row block-1-2 block-tab-full">
            <?php 
            if(is_active_sidebar("contact_info")){
                dynamic_sidebar("contact_info");
            }
            ?>
        </div>
        <div class="row">
            <h3><?php _e('Say Hello.', 'philosophy') ?></h3>
            <?php if(get_field("contact_form_shortcode")){
            echo do_shortcode( get_field("contact_form_shortcode") );
        } ?>
        </div>
    </article>



</section>
<?php get_footer(); ?>php