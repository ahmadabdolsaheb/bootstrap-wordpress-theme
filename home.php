<?php get_header(); ?>
  <div class="container reading-field">
    <div class="row">
      <div class="col-md-7 col-md-offset-1">
        <div class="page-header">
          <h1><?php wp_title(''); ?></h1>
        </div>
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <article class="post">
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p class="meta">On <?php echo the_time('F j, Y');?> </p>
            <p class="meta meta-bottom">In <?php the_category( ', ' ); ?>.</p>
            <hr>
          </article>
        <?php endwhile;?>
        <ul class="pager">
          <li><?php previous_posts_link('<i class="icon-chevron-left"></i>&nbsp;Previous ') ?></li>
          <li><?php next_posts_link('Next &nbsp;<i class="icon-chevron-right"></i>') ?></li>
        </ul>
        <?php else: ?>
          <div class="page-header">
            <h1>Oh no!</h1>
          </div>
          <p>No content is appearing for this page!</p>
        <?php endif; ?>
      </div>
      <?php get_sidebar( 'blog' ); ?>
    </div>
<?php get_footer(); ?>
