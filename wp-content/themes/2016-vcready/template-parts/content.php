<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
			<span class="sticky-post"><?php _e( 'Featured', '2016-vcready' ); ?></span>
		<?php endif; ?>

		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		<!-- post details -->
		<div class="post-meta">
			<span class="author"><?php _e( 'By', '2016-vcready' ); ?> <?php the_author_posts_link(); ?> - </span>
			<span class="date"><?php the_time(get_option('date_format')); ?></span>
			<span class="comments"> <?php if (comments_open( get_the_ID() ) ) comments_popup_link( __( 'Leave your thoughts', '2016-vcready' ), __( '1 Comment', '2016-vcready' ), __( '% Comments', '2016-vcready' )); ?></span>
		</div>	
			<!-- /post details -->
	</header><!-- .entry-header -->

	<?php twentysixteen_excerpt(); ?>

	<?php twentysixteen_post_thumbnail(); ?>
        
        <!-- .Post Content--> 
        
	<div class="entry-content entry-content-home">
	
	<?php if ( true == get_theme_mod( 'read_more_button', true ) ) : ?>	    
		<?php if( strpos( get_the_content(), 'more-link' ) === false ) { // Strip Content + Add Button
            $content = get_the_content();
            $content = strip_tags($content);
            echo substr($content, 0, 350);
            echo '&hellip;<br />';
            echo '<div class="custom-button-container">';
		    echo '<button>';
		    echo '<a href="'.get_the_permalink().'" class="custom-button-read-more">' .  __( 'Read More', '2016-vcready' ) . '</a>';
		    echo '</button>' .'</div>';
            }
        else { // If user adds more tag then add Continue Reading text link
                the_content(__('Continue reading', '2016-vcready'));
            }
        ?>

    <?php else : ?>

<?php if( strpos( get_the_content(), 'more-link' ) === false ) { // Strip Content + Add Button
            $content = get_the_content();
            $content = strip_tags($content);
            echo substr($content, 0, 350);
            echo '&hellip;<br />'; } ?>
<?php endif; ?>       
         <!-- .Continue-->   
			
		<?php 	
			wp_link_pages( array(
				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', '2016-vcready' ) . '</span>',
				'after'       => '</div>',
				'link_before' => '<span>',
				'link_after'  => '</span>',
				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', '2016-vcready' ) . ' </span>%',
				'separator'   => '<span class="screen-reader-text">, </span>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php twentysixteen_entry_meta(); ?>
		<?php
			edit_post_link(
				sprintf(
					/* translators: %s: Name of current post */
					__( 'Edit<span class="screen-reader-text"> "%s"</span>', '2016-vcready' ),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->