<?php 
global $wp_query;

$big = 999999999;
$pagenum_link = str_replace( $big, '%#%', get_pagenum_link( $big ));
$pagenum_link = str_replace( '#038;','&',  $pagenum_link);

$args = array(
		'base'               => $pagenum_link,
		'format'             => '?page=%#%',
		'total'              => $wp_query->max_num_pages,
		'current'            => max(1,get_query_var('paged')),
		'show_all'           => false,
		'end_size'           => 1,
		'mid_size'           => 2,
		'prev_next'          => true,
		'prev_text'          => esc_html__('&laquo;', 'livemag'),
		'next_text'          => esc_html__('&raquo;', 'livemag'),
		'type'               => 'list',
		);	
?>

<div class="site-pagination clr">
	<?php echo paginate_links( $args );?>
</div>

<?php
 	$defaults = array(
		'before'           => '<p>' . esc_html__( 'Pages:', 'livemag' ),
		'after'            => '</p>',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'number',
		'separator'        => ' ',
		'nextpagelink'     => esc_html__( 'Next page', 'livemag' ),
		'previouspagelink' => esc_html__( 'Previous page', 'livemag' ),
		'pagelink'         => '%',
		'echo'             => 1
	); 
    wp_link_pages( $defaults );
?>





