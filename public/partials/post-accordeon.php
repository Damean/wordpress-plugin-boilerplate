<div class="post-accordeon <?php echo $accordeon_identifier; ?>">
  <div class="post-accordeon-top-shadow"></div>
  <?php if ( !empty($content) ) { ?>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <?php echo $content; ?>
        </div>
      </div>
    </div>
  <?php } ?>
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
    $post_categories = get_the_category();
    $post_classes = "";
    foreach ($post_categories as $cat) {
      $post_classes .= "" . $cat->slug . " ";
    }
  ?>
    <div class="container <?php echo $post_classes; ?>">
      <div class="row">
        <div class="col-12 col-md-4">
          <?php if ( has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >      
              <?php the_post_thumbnail( 'medium_large', ['class' => 'img-fluid'] ); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="col-12 col-md-8">
          <div class="post-excerpt"> <?php the_content(); ?> </div>
          <a href="<?php the_permalink(); ?>" class="post-gradient-button">see more...</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8 post-bottom-line"></div>
      </div>
    </div>
  <?php endwhile; ?>
  <div class="post-accordeon-bottom-shadow"></div>
</div>