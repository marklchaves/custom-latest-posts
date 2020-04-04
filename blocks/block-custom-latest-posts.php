<?php 

$args = array(
    'post_type'   => 'post',
    'posts_per_page' => block_value('number-of-posts')
);

$query = new WP_Query( $args );

// The Loop
if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();

/**
 * Custom Layout using Block Labs Plugin
 * - Date
 * - Title (linked)
 * - Categories (linked)
 * - Excerpt (linked)
 * - Custom Read More (linked)
 */

$post_permalink = esc_url( get_permalink() );

?>

<h3>
    <?php echo ( block_value('post-date') ) ? get_the_date() : '';  ?>
</h3>
<h2>
    <a href="<?php echo $post_permalink ?>">
        <?php the_title() ?>
    </a>
</h2>
<div class="custlp-div">
    <?php echo ( block_value('categories') ) ? get_the_category_list( ' ' ) : ''; ?>
</div>
<p>
    <?php the_excerpt() ?>
</p>
<p>
    <a href="<?php echo $post_permalink ?>">
        <?php $read_more_text = ( block_value('read-more-text') ) ? block_value('read-more-text') : 'Read More'; ?>
        <?php echo ( block_value('read-more') ) ? $read_more_text : ''; ?>
    </a>
</p>

<?php // To do: Figure out what to do with author and tags. ~ 5 April 2020 ?>

<hr>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>