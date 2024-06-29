<?php
namespace Skyview_Dentistry_Addon;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Services extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'Services';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Services', 'go-digital-addon' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-code';
	}


	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'basic', 'go-digital' ];
	}

	// Load CSS
	// public function get_style_depends() {

	// 	wp_register_style( 'guide-posts', plugins_url( '../assets/css/guide-posts.css', __FILE__ ));

	// 	return [
	// 		'guide-posts',
	// 	];

	// }

	/**
	 * Get widget keywords.
	 *
	 * Retrieve the list of keywords the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 * @return array Widget keywords.
	 */
	// public function get_keywords() {
	// 	return [ 'oembed', 'url', 'link' ];
	// }

	/**
	 * Register oEmbed widget controls.
	 *
	 * Add input fields to allow the user to customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'Content', 'go-digital-addon' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'post_count',
			[
				'label' => esc_html__( 'Post Per Page', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::NUMBER,
				'default' => 12,
			]
		);

		$this->add_control(
			'post_orderby',
			[
				'label' => esc_html__( 'Post Order By', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'default' => 'date',
				'options' => [
					'ID'  => esc_html__( 'ID', 'medica-addon' ),
					'date' => esc_html__( 'Date', 'medica-addon' ),
					'comment_count' => esc_html__( 'Comment Count', 'medica-addon' ),
					'author' => esc_html__( 'Author', 'medica-addon' ),
					'title' => esc_html__( 'Title', 'medica-addon' ),
					'rand' => esc_html__( 'Rand', 'medica-addon' ),
				],
			]
		);

		$this->add_control(
			'post_order',
			[
				'label' => esc_html__( 'Post Order', 'medica-addon' ),
				'type' => \Elementor\Controls_Manager::SELECT,
				'options' => [
					'ASC'  => esc_html__( 'Ascending', 'medica-addon' ),
					'DESC' => esc_html__( 'Descending', 'medica-addon' ),
				],
			]
		);

		// $this->add_control(
		// 	'hero_heading_1',
		// 	[
		// 		'label' => esc_html__( 'Hero Heading 1', 'go-digital-addon' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => esc_html__( 'The Next go digital', 'go-digital-addon' ),
		// 		'placeholder' => esc_html__( 'Type your title here', 'go-digital-addon' ),
		// 		'label_block' => true,
		// 	]
		// );
		// $this->add_control(
		// 	'hero_heading_2',
		// 	[
		// 		'label' => esc_html__( 'Hero Heading 2', 'go-digital-addon' ),
		// 		'type' => \Elementor\Controls_Manager::TEXT,
		// 		'default' => esc_html__( 'Creative agency', 'go-digital-addon' ),
		// 		'placeholder' => esc_html__( 'Type your title here', 'go-digital-addon' ),
		// 		'label_block' => true,
		// 	]
		// );

		// $this->add_control(
		// 	'heading_icon',
		// 	[
		// 		'label' => esc_html__( 'Choose Image', 'go-digital-addon' ),
		// 		'type' => \Elementor\Controls_Manager::MEDIA,
		// 		'default' => [
		// 			'url' => \Elementor\Utils::get_placeholder_image_src(),
		// 		],
		// 	]
		// );

		$this->end_controls_section();


	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {

		$settings = $this->get_settings_for_display();
	?>

	<div class="services-wrapper">
		<div class="service-slider-wrapper">
			<?php

				// The Query
				$args = array(
					'post_type' => 'service',
					'posts_per_page'      => $settings['post_count'],
					'post_status' => 'publish',
					'ignore_sticky_posts' => 1,
					'orderby' => $settings['post_orderby'],
					'order'   =>  $settings['post_order'],
					// 'paged' => get_query_var('paged') ? get_query_var('paged') : 1,
				);

				$the_query = new \WP_Query( $args );
				// The Loop
				if ( $the_query->have_posts() ) {
					while ( $the_query->have_posts() ) {
						$the_query->the_post();
						
						?>
						<article id="post-<?php the_ID();?>" <?php post_class( 'single-service-item' );?>>
							<?php
								$service_button_url = get_field('service_button_url');
							?>
							<a target="_blank" class="d-block" href="<?php echo esc_url( $service_button_url ); ?>">
								<div class="image-wrap">
									<?php if( has_post_thumbnail(  ) ): ?>
										<?php the_post_thumbnail( 'full' ); ?>
									<?php endif; ?>
								</div>
								<h2><?php echo wp_trim_words( get_the_title() ); ?></h2>
								<div class="text-wrap">
									<?php echo the_excerpt(); ?>
								</div>
								<span class="readmore">
									<?php echo esc_html__( 'Book Now', 'medica-addon' ) ?> 
								</span>
							</a>
						</article>
						<?php
					}
				}
				wp_reset_postdata();
			?>
		</div>
	</div>
	
	


	<?php

	}

}