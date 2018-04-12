<?php get_header(); ?>

  <div class="container">
    <div class="row reading-field">
      <div class="col-md-10 col-md-offset-1">
        <div class="col-md-12 bottom">
          <div class="row">

            <div>

            </div>

            <?php
              $args=array('post_type'=>'testimonials', 'orderby'=>'rand', 'posts_per_page'=>'2');
              $postslist = get_posts('post_type=book&orderby=rand&numberposts=2');
              foreach ($postslist as $post) :
                setup_postdata($post);
            ?>

            <div class="col-xs-6 center">
            <?php
              $thumbnail_id = get_post_thumbnail_id();
              $thumbnail_url = wp_get_attachment_image_src( $thumbnail_id, 'thumbnail-size', true );
            ?>

              <p>
                <a   href="<?php the_permalink(); ?>">
                  <img  class="book-main" src="<?php echo $thumbnail_url[0]; ?>" alt="<?php the_title();?> graphic">
                </a>
              </p>
            </div>
            <?php endforeach ?>
          </div>
        </div>

        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div class="page-header">
            <h1 ><?php the_title(); ?></h1>
            <p class="meta">On <?php echo the_time('F j, Y');?> </p>
            <p class="meta meta-bottom">In <?php the_category( ', ' ); ?>.</p>
          </div>
          <?php the_content(); ?>
          <?php if (in_category( 'voices')) { ?>
            <div class="row">
            <div class="col-md-3" >
              <?php echo get_wp_user_avatar(get_the_author_meta('ID'), 150); ?>
            </div>
            <div class="col-md-9" >
              <h3><b><?php the_author_posts_link(); ?> </b></em></h3>

              <ul class="icons">
                <?php
                  $rss_url = get_the_author_meta( 'rss_url' );
                  if ( $rss_url && $rss_url != '' ) {
                    echo '<li class="rss"><a href="' . esc_url($rss_url) . '"></a></li>';
                  }

                  $google_profile = get_the_author_meta( 'google_profile' );
                  if ( $google_profile && $google_profile != '' ) {
                    echo '<li class="google"><a href="' . esc_url($google_profile) . '" rel="author"></a></li>';
                  }

                  $twitter_profile = get_the_author_meta( 'twitter_profile' );
                  if ( $twitter_profile && $twitter_profile != '' ) {
                    echo '<li class="twitter"><a href="' . esc_url($twitter_profile) . '"></a></li>';
                  }

                  $facebook_profile = get_the_author_meta( 'facebook_profile' );
                  if ( $facebook_profile && $facebook_profile != '' ) {
                    echo '<li class="facebook"><a href="' . esc_url($facebook_profile) . '"></a></li>';
                  }

                  $linkedin_profile = get_the_author_meta( 'linkedin_profile' );
                  if ( $linkedin_profile && $linkedin_profile != '' ) {
                         echo '<li class="linkedin"><a href="' . esc_url($linkedin_profile) . '"></a></li>';
                  }
                ?>
              </ul>
              <?php echo get_the_author_meta('description'); ?>
            </div>
            </div >
          <?php } ?>
        <?php endwhile; else: ?>
          <div class="page-header">
            <h1>Oh no!</h1>
          </div>
          <p>No content is appearing for this page!</p>
        <?php endif; ?>
      </div>
    </div>




<?php get_footer(); ?>
