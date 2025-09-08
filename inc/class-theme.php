<?php
/**
 * Main theme class
 *
 * @package Boilerplate_Theme
 */

class Boilerplate_Theme
{

	/**
	 * Theme version
	 *
	 * @var string
	 */
	public $theme_version = '1.0';

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->init();
	}

	/**
	 * Initialize
	 */
	public function init()
	{
		add_action('after_setup_theme', array($this, 'setup'));
		add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
		add_action('after_setup_theme', array($this, 'content_width'), 0);

		$this->include_files();
	}

	/**
	 * Theme setup
	 */
	public function setup()
	{
		load_theme_textdomain('boilerplate-theme', get_template_directory() . '/languages');

		add_theme_support('automatic-feed-links');
		add_theme_support('title-tag');
		add_theme_support('post-thumbnails');

		register_nav_menus(array(
			'menu-1' => esc_html__('Primary', 'boilerplate-theme'),
		));

		add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		));

		add_theme_support('custom-background', apply_filters('boilerplate_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		)));

		add_theme_support('customize-selective-refresh-widgets');

		add_theme_support('custom-logo', array(
			'height' => 250,
			'width' => 250,
			'flex-width' => true,
			'flex-height' => true,
		));
	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * Priority 0 to make it available to lower priority callbacks.
	 *
	 * @global int $content_width
	 */
	public function content_width()
	{
		$GLOBALS['content_width'] = apply_filters('boilerplate_theme_content_width', 640);
	}

	/**
	 * Enqueue scripts and styles.
	 */
	public function enqueue_scripts()
	{
		wp_enqueue_script('tailwind-cdn', 'https://cdn.tailwindcss.com', [], null, false);

		// Optional: set a minimal Tailwind config before it runs
		$config = <<<JS
		tailwind.config = {
			theme: { extend: {} }
		};
		JS;

		// wp_add_inline_script('tailwind-cdn', $config, 'before');

		// WP-bundled jQuery
		wp_enqueue_script('jquery');

		wp_enqueue_style('boilerplate-theme-style', get_stylesheet_uri());

		// wp_enqueue_script('boilerplate-theme-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true);

		wp_enqueue_script('boilerplate-theme-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true);

		if (is_singular() && comments_open() && get_option('thread_comments')) {
			wp_enqueue_script('comment-reply');
		}
	}

	/**
	 * Include files
	 */
	public function include_files()
	{
		require_once get_template_directory() . '/inc/custom-header.php';
		require_once get_template_directory() . '/inc/template-tags.php';
		require_once get_template_directory() . '/inc/template-functions.php';
		require_once get_template_directory() . '/inc/customizer.php';

		if (defined('JETPACK__VERSION')) {
			require_once get_template_directory() . '/inc/jetpack.php';
		}

		require_once get_template_directory() . '/inc/carbon-fields.php';


		$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator(get_template_directory() . '/classes'));
		foreach ($iterator as $file) {
			if ($file->isFile() && $file->getFilename() === 'autoload.php') {
				require_once $file->getPathname();
			}
		}
	}
}

new Boilerplate_Theme();
