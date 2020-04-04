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
        <?php echo ( block_value('read-more') ) ? block_value('read-more-text') : 'Read More'; ?>
    </a>
</p>

<hr>

<?php endwhile; else : ?>
	<p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>