<?php get_header(); ?> 


<section class="posts">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="item">

  <a href="<?php the_permalink();?>" id="permalink">

    <?php the_post_thumbnail( 'small' ); ?>

    <?php

      // ECHOES THE FIRST CATEGORY NAME
      $posttags = get_the_tags();
      $result = '';
      
      if ($posttags) {
        foreach($posttags as $tag) {
          $result .= $tag->name . ' / ';
        }

        $tags_text = rtrim($result, ' / ');
      }

      $title_text = trim(the_title( '', '', FALSE));

    ?>

    <div class="color-overlay hide"><?php if(!(empty($title_text) && empty($tags_text)))  : ?>

				<div class="item-info hide">
					<span class="hide" id="title"><?php echo $title_text;?><br class="hide"></span><span class="hide" id="sub"><?php echo $tags_text; ?></span>
				</div>

		<?php endif; ?></div>

  </a>
  </div>

<?php endwhile; ?>

  <div class="main-pagination">
    <!-- <div class="nav-next"><?php previous_posts_link( '<<' ); ?></div>
    <div class="nav-previous"><?php next_posts_link( '>>' ); ?></div> -->
    <?php wpbeginner_numeric_posts_nav(); ?>
  </div>

<?php else : ?>

  <div class="no-posts-message item">
    <h1><?php _e( ":'(" ); ?></h1>
    <h2><u><?php _e( "404" ); ?></u></h2><br>

    <h2><?php _e( "There's nothing in here." ); ?></h2>
    <h2><?php _e( "--" ); ?></h2>
    <h2><?php _e( "No hay nada por aquí." ); ?></h2>
  </div>

<?php endif; ?>

</section>

<script>
    var prevScrollpos = window.pageYOffset;
window.onscroll = function() {
  var currentScrollPos = window.pageYOffset;
  if (prevScrollpos > currentScrollPos) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-50px";
  }
  prevScrollpos = currentScrollPos;
}
</script>

<?php get_footer(); ?>