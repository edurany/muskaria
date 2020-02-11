<div class="tagcloud">
<?php 
$smallest=$instance['smallest'];
$largest=$instance['largest'];
$number=$instance['number'];

$args = array(
		'smallest'                  => $smallest,
		'largest'                   => $largest,
		'unit'                      => 'px',
		'number'                    => $number,
		'format'                    => 'flat',
);
wp_tag_cloud( $args ); 

?>
</div>