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
 * @since Twenty Twenty 1.0
 */

?>

<?php 
	
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	echo "<script>console.log('current link " . $actual_link . "')</script>";
	

	if ($actual_link == $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"] 
		|| $actual_link == $GLOBALS["ADMIN_HOME_URL_WITH_SSL"] 
		|| strstr($actual_link, $GLOBALS["ADMIN_HOME_URL_WITH_SSL"].'?mode')
		|| strstr($actual_link, $GLOBALS["ADMIN_HOME_URL_WITHOUT_SSL"].'?mode')
		){
		if ($GLOBALS["PREVENT_DUPLICATE"] == 0){
			include get_theme_file_path( "/home/home.php" );
			$GLOBALS["PREVENT_DUPLICATE"]++;
		}
	} else if ($actual_link == $GLOBALS["LOGIN_URL_WITHOUT_SSL"] || $actual_link == $GLOBALS["LOGIN_URL_WITH_SSL"]){
		include get_theme_file_path( "/login/login.php" );
	} else {
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php
	
	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );
	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-full-width.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
				the_content( __( 'Continue reading', 'twentytwenty' ) );
			}
			?>

		</div><!-- .entry-content -->

	</div><!-- .post-inner -->

	<div class="section-inner">
		<?php
		wp_link_pages(
			array(
				'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
				'after'       => '</nav>',
				'link_before' => '<span class="page-number">',
				'link_after'  => '</span>',
			)
		);

		edit_post_link();

		// Single bottom post meta.
		twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

		if ( post_type_supports( get_post_type( get_the_ID() ), 'author' ) && is_single() ) {

			get_template_part( 'template-parts/entry-author-bio' );

		}
		?>

	</div><!-- .section-inner -->

	<?php

	if ( is_single() ) {

		get_template_part( 'template-parts/navigation' );

	}

	/**
	 *  Output comments wrapper if it's a post, or if comments are open,
	 * or if there's a comment number – and check for password.
	 * */
	if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
		?>

		<div class="comments-wrapper section-inner">

			<?php comments_template(); ?>

		</div><!-- .comments-wrapper -->

		<?php
	}
	?>

</article>

<?php 
	}

		
?>
