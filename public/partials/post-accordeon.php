<div class="post-accordeon <?php echo $accordeon_identifier; ?>">
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
        <div class="col-12 col-md-4 text-center">
          <?php if ( has_post_thumbnail()) : ?>
            <a href="<?php echo get_post_meta(get_the_ID(), 'custom_post_link', true); ?>" title="<?php the_title_attribute(); ?>" target="_blank">      
              <?php the_post_thumbnail( 'category-thumb', ['class' => 'img-fluid'] ); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="col-12 col-md-8">
          <div class="post-excerpt"> <?php the_content(); ?> </div>
          <a href="<?php echo get_post_meta(get_the_ID(), 'custom_post_link', true); ?>" class="post-gradient-button" target="_blank">see more...</a>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-8 post-bottom-line"></div>
      </div>
    </div>
  <?php endwhile; ?>
</div>