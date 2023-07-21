<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Blog Studio
 */

/**
 *
 * @hooked blog_studio_footer_start
 */
do_action( 'blog_studio_action_before_footer' );

/**
 * Hooked - blog_studio_footer_top_section -10
 * Hooked - blog_studio_footer_section -20
 */
do_action( 'blog_studio_action_footer' );

/**
 * Hooked - blog_studio_footer_end. 
 */
do_action( 'blog_studio_action_after_footer' );

wp_footer(); ?>

</body>  
</html>