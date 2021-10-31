<?php get_header(); ?>
  <section class="s-content">
    <div class="row masonry-wrap">
      <div class="masonry">
        <div class="grid-sizer"></div>
        
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