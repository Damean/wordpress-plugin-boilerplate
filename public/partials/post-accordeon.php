<div class="wedo-plugin owl-carousel">
  <?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
    $post_categories = get_the_category();
    $post_classes = "";
    foreach ($post_categories as $cat) {
      $post_classes .= "wedo_" . $cat->name . " ";
    }
  ?>
  <div>
    <div class="container-fluid <?php echo $post_classes; ?>">
      <div class="row">
        <div class="col-12 col-md-4">
          <?php if ( has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >      
              <?php the_post_thumbnail( 'medium_large', ['class' => 'img-fluid wedo-post-thumbnail'] ); ?>
            </a>
          <?php endif; ?>
        </div>
        <div class="col-12 col-md-8">
          <div class="wedo-date-category"> <?php echo get_the_date('F j, Y'); ?> | <?php the_category(', '); ?> </div>
          <a href="<?php the_permalink(); ?>"> <h3 class="wedo-post-title"> <?php the_title(); ?> </h3> </a>
          <div class="wedo-post-excerpt"> <?php the_excerpt(); ?> </div>
        </div>
      </div>
    </div>
  </div>
  <?php endwhile; ?>
</div>