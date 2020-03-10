<?php

/**
 * The default template for displaying content
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

  <?php

  get_template_part('template-parts/entry-header');

  if (!is_search()) {
    get_template_part('template-parts/featured-image');
  }

  ?>

  <div class="post-inner <?php echo is_page_template('templates/template-full-width.php') ? '' : 'thin'; ?> ">

    <div class="entry-content">

      <?php
      if (is_search() || !is_singular() && 'summary' === get_theme_mod('blog_content', 'full')) {
        the_excerpt();
      } else {
        the_content(__('Continue reading', 'twentytwenty'));
      }

      /* only show the metadata on posts, not static pages */
      if (!is_page()) { ?>

        <ul class="metadata">
          <li><span>Object Title:</span> <?php the_field('object_title'); ?></li>
          <li><span>Object Name:</span> <?php the_field('object_name'); ?></li>
          <li><span>Object Number:</span> <?php the_field('object_number'); ?></li>
          <li><span>Description:</span> <?php the_field('description'); ?></li>
          <li><span>Dimensions:</span> <?php the_field('dimensions'); ?></li>
          <li><span>Material:</span> <?php the_field('material'); ?></li>
          <li><span>Geography:</span> <?php the_field('geography'); ?></li>
          <li><span>Period:</span> <?php the_field('period'); ?></li>
          <li><span>Date:</span> <?php the_field('date'); ?></li>
          <li><span>Field Collector:</span> <?php the_field('field_collector'); ?></li>
          <li><span>Museum Collector:</span> <?php the_field('museum_collector'); ?></li>
          <li><span>1953 Archaeological Context:</span> <?php the_field('1953_archaeological_context'); ?></li>
          <li><span>Excavation Number:</span> <?php the_field('excavation_number'); ?></li>
          <li><span>Cross References:</span> <?php the_field('cross_references'); ?></li>
          <li><span>Published References:</span> <?php the_field('published_references'); ?></li>
        </ul>

      <?php } ?>



    </div><!-- .entry-content -->

  </div><!-- .post-inner -->

  <div class="section-inner">
    <?php
    wp_link_pages(
      array(
        'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__('Page', 'twentytwenty') . '"><span class="label">' . __('Pages:', 'twentytwenty') . '</span>',
        'after'       => '</nav>',
        'link_before' => '<span class="page-number">',
        'link_after'  => '</span>',
      )
    );

    edit_post_link();

    // Single bottom post meta.
    twentytwenty_the_post_meta(get_the_ID(), 'single-bottom');

    if (is_single()) {

      get_template_part('template-parts/entry-author-bio');
    }
    ?>

  </div><!-- .section-inner -->

  <?php

  if (is_single()) {

    get_template_part('template-parts/navigation');
  }

  /**
   *  Output comments wrapper if it's a post, or if comments are open,
   * or if there's a comment number – and check for password.
   * */
  if ((is_single() || is_page()) && (comments_open() || get_comments_number()) && !post_password_required()) {
  ?>

    <div class="comments-wrapper section-inner">

      <?php comments_template(); ?>

    </div><!-- .comments-wrapper -->

  <?php
  }
  ?>

</article><!-- .post -->