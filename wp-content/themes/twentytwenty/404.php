<?php
/**
 * The template for displaying the 404 template in the Twenty Twenty theme.
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

get_header();
?>

<main id="site-content" role="main">

	<div class="section-inner thin error404-content">

		<h1 class="entry-title"><?php _e( "Không có bài viết nào", 'twentytwenty' ); ?></h1>

		<div class="intro-text"><p><?php _e( 'Không tìm bài viết nào.Có thể bài viết này đã bị xóa bỏ', 'twentytwenty' ); ?></p></div>
		<div class="intro-text"><a style="text-decoration:none" href=<?php echo $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"]; ?>>Trở về trang chủ</a></div>
		<?php
// 		get_search_form(
// 			array(
// 				'label' => __( '404 not found', 'twentytwenty' ),
// 			)
// 		);
		?>

	</div><!-- .section-inner -->

</main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();
