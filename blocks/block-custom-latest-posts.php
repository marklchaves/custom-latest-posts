<h2>Custom Latest Posts by cme</h2>

<?php 
$args = array(
    'post_type'   => 'post',
    'posts_per_page' => block_value('number-of-posts')
);
$query = new WP_Query( $args );
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();
?>

<p><?php ( block_value('post-date') ) ? the_date() : ''; ?></p>
<h2><a href="<?php echo esc_url( get_permalink() ) ?>"><?php the_title() ?></a></h2>
<div class="custlp-div"><?php echo ( block_value('categories') ) ? get_the_category_list( ' ' ) : ''; ?></div>
<p><?php the_excerpt() ?></p>
<p><a href="<?php echo esc_url( get_permalink() ) ?>"><?php echo ( block_value('read-more') ) ? block_value('read-more-text') : 'Read More'; ?></a></p>

<hr>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>