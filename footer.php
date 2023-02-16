<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Avocado
 */

?>

</div>
</div>
</div>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <?php dynamic_sidebar('footer-1'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('footer-2'); ?>
      </div>
      <div class="col-md-4">
        <?php dynamic_sidebar('footer-3'); ?>
      </div>
    </div>

    <div class="row">
      <div class="col text-center">
        <div class="site-info">
          <a href="<?php echo esc_url( __( 'https://wordpress.org/', 'avocado' ) ); ?>">
            <?php
							/* translators: %s: CMS name, i.e. WordPress. */
							printf( esc_html__( 'Proudly powered by %s', 'avocado' ), 'WordPress' );
							?>
          </a>
          <span class="sep"> | </span>
          <?php
							/* translators: 1: Theme name, 2: Theme author. */
							printf( esc_html__( 'Theme: %1$s by %2$s.', 'avocado' ), 'avocado', '<a href="http://iamrasel.com">Na Shree Nitu</a>' );
							?>
        </div><!-- .site-info -->
      </div>
    </div>
  </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>