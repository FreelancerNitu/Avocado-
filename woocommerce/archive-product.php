<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );
if(is_active_sidebar('avocado_woocommerce')){
	$main_col = 'col-md-9';
}else{
	$main_col = 'col';
}
?>

<div class="row">
  <?php if(is_active_sidebar('avocado_woocommerce')) : ?>
  <div class="col-md-3">
    <?php dynamic_sidebar('avocado_woocommerce'); ?>
  </div>
  <?php endif; ?>

  <div class="<?php echo $main_col; ?>">

    <?php if(is_product_category() == true) :
			 $cat_thumb_id = get_woocommerce_term_meta( get_queried_object_id(), 'thumbnail_id', true );
			 $cat_thumb_url = wp_get_attachment_image_url($cat_thumb_id, 'large' );
		?>
    <?php if(!empty($cat_thumb_id)) : ?>
    <div class="cat-wide-thumb" style="background-image:url(<?php echo $cat_thumb_url; ?>)"></div>
    <?php endif; ?>

    <?php endif; ?>
    <header class="woocommerce-products-header">
      <?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
      <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
      <?php endif; ?>


      <?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	//do_action( 'woocommerce_archive_description' );
	?>
    </header>


    <?php if(is_product_category() == true) : 
			
			$childrens = get_term_children( get_queried_object_id(), 'product_cat');
			
			?>
    <!-- Category Child Starts Here  -->
    <?php if(!empty($childrens)) : ?>
    <div class="row">
      <?php foreach($childrens as $children) :
				 $child_thumb_id = get_woocommerce_term_meta( $children, 'thumbnail_id', true );
				 $child_thumb_url = wp_get_attachment_image_url($child_thumb_id, 'thumbnail' );
				 $child_info = get_term($children, 'product_cat');
			?>
      <div class="col my-auto">
        <div class="child-wrapper">
          <a href="<?php echo get_term_link($children, 'product_cat'); ?>" class="child-link">
            <?php if(!empty($child_thumb_id)) : ?>
            <img src=" <?php echo $child_thumb_url; ?>" alt="" class="child-img">
            <?php endif; ?>
            <?php echo $child_info->name; ?>
          </a>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <!-- Category Child Ends Here  -->

    <?php endif; ?>





    <?php
if ( woocommerce_product_loop() ) { 
 
    do_action('woocommerce_before_shop_loop');
     woocommerce_product_loop_start();

    if ( wc_get_loop_prop( 'total' ) ) {
    while ( have_posts() ) {
    the_post();

    /**
    * Hook: woocommerce_shop_loop.
    */
    do_action( 'woocommerce_shop_loop' );

    wc_get_template_part( 'content', 'product' );
    }
    }

    woocommerce_product_loop_end();

    /**
    * Hook: woocommerce_after_shop_loop.
    *
    * @hooked woocommerce_pagination - 10
    */
    do_action( 'woocommerce_after_shop_loop' );
    } else {
    /**
    * Hook: woocommerce_no_products_found.
    *
    * @hooked wc_no_products_found - 10
    */
    do_action( 'woocommerce_no_products_found' );
    }

    /**
    * Hook: woocommerce_after_main_content.
    *
    * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
    */
    do_action( 'woocommerce_after_main_content' );?>

  </div>
</div>

<?php get_footer( 'shop' ); ?>