<section class="s-extra">
  <div class="row top">
    <div class="col-eight md-six tab-full popular">
      <h3><?php _e("Popular Posts","philosophy") ?></h3>
      <div class="block-1-2 block-m-full popular__posts">
        <?php $philosophy_popular_post = new WP_Query(array(
            'posts_per_page' => 6,
            'ignore_sticky_posts' => 1,
            'orderby' => 'comment_count'
          )); 
          while($philosophy_popular_post->have_posts(  )){
            $philosophy_popular_post->the_post(  );
            ?>
        <article class="col-block popular__post">
          <a href="<?php the_permalink( ); ?>" class="popular__thumb">
            <?php the_post_thumbnail(); ?>
          </a>
          <h5><a href="<?php the_permalink( ); ?>"><?php the_title(); ?></a></h5>
          <section class="popular__meta">
            <span class="popular__author"><span><?php _e("By", "philosophy") ?></span> <a
                href="<?php echo esc_url( get_author_posts_url(get_the_author_meta("ID")) ); ?>">
                <?php the_author(); ?></a></span>
            <span class="popular__date"><span><?php _e("On", "philosophy") ?></span> <time
                datetime="2017-12-19"><?php echo get_the_date('M j, Y'); ?></time></span>
          </section>
        </article>
        <?php
          }
          wp_reset_query(  );
          ?>
      </div>
    </div>
    <div class="col-four md-six tab-full about">
      <?php 
      if(is_active_sidebar( "before_footer_right" )){
        dynamic_sidebar( "before_footer_right" );
      }
      ?>
      <ul class="about__social">
        <li>
          <a href="#0"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-instagram" aria-hidden="true"></i></a>
        </li>
        <li>
          <a href="#0"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
        </li>
      </ul>
    </div>
  </div>
  <div class="row bottom tags-wrap">
    <div class="col-full tags">

      <h3><?php _e("Tags","philosophy") ?></h3>
      <div class="tagcloud">
        <?php $tags = get_tags(array(
          'get'=>'all'
        ));
       
        if($tags) {
        foreach ($tags as $tag):
          echo '<a href="'. get_term_link($tag).'">'. $tag->name .'</a>';
        endforeach;
        } else {
        _e('No tags created.', 'philosophy');
        }

        ?>
      </div>
    </div>
  </div>
</section>

<footer class="s-footer">
  <div class="s-footer__main">
    <div class="row">
      <div class="col-two md-four mob-full s-footer__sitelinks">
        <h4><?php _e("Quick Links","philosophy") ?></h4>
        <?php 
        wp_nav_menu(array(
          'theme_location' => 'footer-left',
          'menu_id'        => 'footer_left',
          'menu_class'     => 's-footer__linklist',
        )); 
        ?>

      </div>
      <div class="col-two md-four mob-full s-footer__archives">
        <h4><?php _e("Archives","philosophy") ?></h4>
        <?php 
        wp_nav_menu(array(
          'theme_location' => 'footer-middle',
          'menu_id' => 'footer_middle',
          'menu_class' => 's-footer__linklist',
        )); 
        ?>
      </div>
      <div class="col-two md-four mob-full s-footer__social">
        <h4><?php _e("Social","philosophy") ?></h4>
        <?php 
        wp_nav_menu(array(
          'theme_location' => 'footer-right',
          'menu_id' => 'footer_right',
          'menu_class' => 's-footer__linklist',
        )); 
        ?>
      </div>
      <div class="col-five md-full end s-footer__subscribe">
        <?php 
        if(is_active_sidebar("footer-right")){
          dynamic_sidebar("footer-right");
        } 
        ?>
        <div class="subscribe-form">
          <form id="mc-form" class="group" novalidate>
            <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required>
            <input type="submit" name="subscribe" value="Send">
            <label for="mc-email" class="subscribe-message"></label>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="s-footer__bottom">
    <div class="row">
      <div class="col-full">
      <?php 
        if(is_active_sidebar("footer-bottom")){
          dynamic_sidebar("footer-bottom");
        } 
        ?>
        <div class="go-top">
          <a class="smoothscroll" title="Back to Top" href="#top"></a>
        </div>
      </div>
    </div>
  </div>
</footer>

<div id="preloader">
    <div id="loader">
      <div class="line-scale">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>
<?php wp_footer(); ?>
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];

  function gtag() {
    dataLayer.push(arguments);
  }
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>
<script defer src="../../../static.cloudflareinsights.com/beacon.min.js"
  data-cf-beacon='{"rayId":"66a1166829b72f8b","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2021.6.0","si":10}'>
</script>
</body>


</html>