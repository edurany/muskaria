<?php
/**
 * Allow to create widgets containing tabs to show on sidebars. 
 * Every tab is the list of posts of each particular category.
 */

class Alithemes_Theme_Widget_CategoriesTabs extends WP_Widget {

	protected $WP_VER;

	function __construct() {

		$this->WP_VER = str_replace('.', '', get_bloginfo('version'));

		$verLength = strlen($this->WP_VER);
		if ( $verLength == 2 )
				$this->WP_VER = $this->WP_VER . '0';
		elseif ( $verLength == 1 )
			$this->WP_VER = $this->WP_VER . '00';

		$this->WP_VER = (int)$this->WP_VER;

		add_action( 'init', array(&$this, 'alith_init') );
		add_action('wp_enqueue_scripts', array(&$this, 'alith_register_scripts'));
		add_action('admin_enqueue_scripts', array(&$this, 'alith_admin_scripts'));
		
		$widget_ops = array('classname' => 'alith-widget', 'description' => esc_html__('Display categories by tabs'));

		if ($this->WP_VER >= 430)
			parent::__construct('category-posts-tabber', esc_html__('Alithemes Category Tabber'), $widget_ops);
		else
			$this->WP_Widget('category-posts-tabber', esc_html__('Alithemes Category Tabber'), $widget_ops);

	}

	function alith_init() {
		add_image_size( 'alith-thumbnail', 70, 60, true );
	}

	function alith_admin_scripts($hook) {
		if ($hook != 'widgets.php')
			return;

		wp_register_script('alith_widget_admin', ALITHEMES_THEME_WIDGET_URL .'/categories_tabs/js/categories_tabs_admin.js'); 
		wp_enqueue_script('alith_widget_admin');
	}

	function alith_register_scripts() { 
		wp_register_script('category_posts_tabber', ALITHEMES_THEME_WIDGET_URL .'/categories_tabs/js/categories_tabs_widget.js');
		wp_register_style('category_posts_tabber', ALITHEMES_THEME_WIDGET_URL .'/categories_tabs/css/categories_tabs_widget.css');
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
			'tab_name' => array(),
			'category' => array(),
			'post_num' => 5,
			'show_thumbnail' => 1,
			'show_date' => 1,
			'show_comment_num' => 0,
			'order_by' => 'date'
		) );

		extract($instance);

		?>
		<h4>
			<a href="#" id="select-tab-toggle"><?php echo esc_html__('Tabs Setting'); ?></a>
		</h4>
		<div id="alith-select-tab" style="margin-bottom: 30px; <?php if (!$tab_name) echo 'display: none'; ?>">
			<p>
				<a id="add-tab" href="#" style="background: #82b440; color: #fff; text-decoration: none; padding: 2px 5px;"><?php echo esc_html__( 'Add New Tab' ); ?></a>
			</p>
			<ul id="alith-tab-list">
				<?php if ($tab_name) : ?>
				<?php foreach ($tab_name as $index => $name): ?>
				<?php $cat_id = isset($category[$index]) ? $category[$index] : ''; ?>
					<li>
						<p>
							<label>
								<?php echo esc_html__( 'Tab name' ); ?>:
								<input name="<?php echo $this->get_field_name("tab_name"); ?>[]" type="text" value="<?php echo $name; ?>" />
							</label>
						</p>
						<p>
							<label>
								<?php echo esc_html__( 'Category' ); ?>:
								<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category') . '[]', 'selected' => $cat_id) ); ?>
							</label>
						</p>
						<p>
							<a href="#" class="remove-tab"><?php echo esc_html__( 'Delete this tab' ); ?></a>
						</p>
						<hr />
					</li>
				<?php endforeach; ?>
				<?php endif; ?>
			</ul>

			<div id="html-tab-wrapper" style="display: none">
				<p>
					<label>
						<?php echo esc_html__( 'Tab name' ); ?>:
						<input name="<?php echo $this->get_field_name("tab_name_sample"); ?>[]" type="text" value="" />
					</label>
				</p>
				<p>
					<label>
						<?php echo esc_html__( 'Category' ); ?>:
						<?php wp_dropdown_categories( array( 'name' => $this->get_field_name('category_sample') . '[]') ); ?>
					</label>
				</p>
				<p>
					<a href="#" class="remove-tab"><?php echo esc_html__( 'Delete this tab' ); ?></a>
				</p>
				<hr />
			</div>
		</div>
		
		<h4>
			<a id="alith-option-toggle" href="#"><?php echo esc_html__('Post Options'); ?></a>
		</h4>
		<div id="alith-option">
			<p>
				<label for="<?php echo $this->get_field_id("post_num"); ?>">
					<?php echo esc_html__( 'Number of posts to show' ); ?>:
					<input size="2" id="<?php echo $this->get_field_id("post_num"); ?>" name="<?php echo $this->get_field_name("post_num"); ?>" type="text" value="<?php echo $post_num; ?>" />
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id("show_thumbnail"); ?>">				
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_thumbnail"); ?>" name="<?php echo $this->get_field_name("show_thumbnail"); ?>" value="1" <?php if (isset($show_thumbnail)) { checked( 1, $show_thumbnail, true ); } ?> />
					<?php echo esc_html__( 'Show post thumbnails'); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id("show_date"); ?>">				
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_date"); ?>" name="<?php echo $this->get_field_name("show_date"); ?>" value="1" <?php if (isset($show_date)) { checked( 1, $show_date, true ); } ?> />
					<?php echo esc_html__( 'Show post date'); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id("show_comment_num"); ?>">				
					<input type="checkbox" class="checkbox" id="<?php echo $this->get_field_id("show_comment_num"); ?>" name="<?php echo $this->get_field_name("show_comment_num"); ?>" value="1" <?php if (isset($show_comment_num)) { checked( 1, $show_comment_num, true ); } ?> />
					<?php echo esc_html__( 'Show comments count'); ?>
				</label>
			</p>
			<p>
				<label for="<?php echo $this->get_field_id('order_by'); ?>"><?php echo esc_html__('Order by:'); ?></label> 
				<select id="<?php echo $this->get_field_id('order_by'); ?>" name="<?php echo $this->get_field_name('order_by'); ?>">
					<option value="date" <?php selected($order_by, 'date', true); ?>><?php echo esc_html__('Date'); ?></option>
					<option value="comment_count" <?php selected($order_by, 'comment_count', true); ?>><?php echo esc_html__('Comment count'); ?></option>    
				</select>
			</p>
		</div>
		<?php
	}

	function update( $new_instance, $old_instance ) {	
		if (!preg_match('/^\d+$/', $new_instance['post_num'])) {
			$new_instance['post_num'] = $old_instance['post_num'];
		}

		$new_instance['show_thumbnail'] = $new_instance['show_thumbnail'] ? $new_instance['show_thumbnail'] : '';
		$new_instance['show_date'] = $new_instance['show_date'] ? $new_instance['show_date'] : '';
		$new_instance['show_comment_num'] = $new_instance['show_comment_num'] ? $new_instance['show_comment_num'] : '';

		if (isset($new_instance['tab_name_sample'])) {
			unset($new_instance['tab_name_sample']);
		}
		if (isset($new_instance['category_sample'])) {
			unset($new_instance['category_sample']);
		}

		return $new_instance;	
	}

	function widget( $args, $instance ) {
		extract($instance);

		wp_enqueue_script('category_posts_tabber');
		wp_enqueue_style('category_posts_tabber');

		?>
		<?php
			if (isset($tab_name) && $tab_name) :
				$tab_width = 100/count($tab_name);
				$tab_width = number_format($tab_width, 2, '.', '');
		?>
		<?php echo $args['before_widget'] ?>
			<div id="alith-widget">
				<ul id="alith-tab">
					<?php
						foreach ($tab_name as $index => $name) :
							if (!$name) {
								$default = esc_html__('Featured Posts');
								if (isset($category[$index])) {
									$name = get_cat_name($category[$index]);
									if (!$name) {
										$name = $default;
									}
								} else {
									$name = $default;
								}
							}
					?>
						<li>
							<a class="alith-tab-item <?php if (!$index) { echo 'alith-current-item'; } ?>" id="alith-tab-<?php echo $index; ?>" href="#"><?php echo $name; ?></a>
						</li>
					<?php endforeach; ?>
				</ul>

				<div <?php if (!$show_thumbnail) echo 'class="no-thumbnail"'; ?> id="alith-content-wrapper">
					<?php foreach ($tab_name as $index => $name) : ?>
					<?php
						if (isset($category[$index])) :
							$category_id = $category[$index];

							$alith_query = new WP_Query(
									'cat=' . $category_id .
									'&posts_per_page=' . $post_num .
									'&orderby=' . $order_by .
									'&order=DESC'
								);

					?>
						<div id="alith-content-<?php echo $index; ?>" class="alith-tab-content <?php if (!$index) { echo 'alith-current-content'; } ?>">
						
							<?php 
							$y = 1;
							if ($alith_query->have_posts()) : ?>
							<?php while ($alith_query->have_posts()) : $alith_query->the_post(); ?>
							<?php if ($y == 1): ?>
							<div class="row">
								<div class="col-md-6 col-sm-12">
									<div class="first-post">
										<?php if ( has_post_thumbnail() && $show_thumbnail ) : ?>
										<div class="thumb_media clr">
											<a href="<?php the_permalink() ?>">
											<?php the_post_thumbnail(); ?>
											</a>
										</div>	
										<?php endif; ?>
										
										<div class="alith-title">
											<a class="post-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
										</div>

										<div class="post-meta">
											<?php if ($show_date) : ?>
												<i class="fa fa-calendar-o" aria-hidden="true"></i>
												<span class="alith-date"><?php echo get_the_date(); ?></span>
											<?php endif; ?>

											<?php if ($show_date && $show_comment_num) : ?>
												<span class="alith-separate">|</span>
											<?php endif; ?>
											
											<?php if ($show_comment_num) : ?>
												<i class="fa fa-comment-o" aria-hidden="true"></i> 
												<span class="alith-comment-num"><?php comments_number(); ?></span>
											<?php endif; ?>
										</div>
										<p><?php echo mb_substr(get_the_excerpt(), 0,65);?></p>
									</div> <!--end first post-->
								</div>
								<div class="col-md-6 col-sm-12">
									<?php else :?>
									<div class="tabber_item">
										<?php if ( has_post_thumbnail() && $show_thumbnail ) : ?>
										<div class="alith-thumbnail">
											<a href="<?php the_permalink() ?>">
											<?php the_post_thumbnail('alith-thumbnail', array('title' => '')); ?>
											</a>
										</div>	
										<?php endif; ?>
										
										<div class="alith-title">
											<a class="post-title sub-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
										</div>

										<div class="post-meta">
											<?php if ($show_date) : ?>
											<i class="fa fa-calendar-o" aria-hidden="true"></i>
											<span class="alith-date"><?php echo get_the_date(); ?></span>
											<?php endif; ?>

											<?php if ($show_date && $show_comment_num) : ?>
											<span class="alith-separate">|</span>
											<?php endif; ?>
											
											<?php if ($show_comment_num) : ?>
											<i class="fa fa-comment-o" aria-hidden="true"></i> 
											<span class="alith-comment-num"><?php comments_number('0','1','%');?></span>
											<?php endif; ?>
										</div>
									</div>
									<?php endif;?>
							<?php $y++; endwhile; ?>
							</div>
							</div>
							<?php else : ?> 
								<p class="alith-no-post"><?php echo esc_html__( 'No Posts Found.'); ?></p>
							<?php endif; ?>
						</div>

					<?php endif; ?>
					<?php endforeach; ?>
				</div>
			</div>
		<?php echo $args['after_widget'] ?>
		<?php endif; ?>
		<?php
	}

}

add_action( 'widgets_init', create_function('', 'return register_widget("alith_Widget");') );
?>