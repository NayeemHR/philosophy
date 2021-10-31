<?php 
$philosophy_video_file = "";
if(function_exists("the_field")){
  $philosophy_video_file = get_field("source_file");
}

?>
<article class="masonry__brick entry format-video" data-aos="fade-up">
  <div class="entry__thumb video-image">
    <a href="<?php echo esc_url($philosophy_video_file); ?>?color=01aef0&amp;title=0&amp;byline=0&amp;portrait=0" data-lity>

      <?php the_post_thumbnail('philosophy-square'); ?>

    </a>
  </div>
  <?php get_template_part("template-parts/common/summary"); ?>
</article>