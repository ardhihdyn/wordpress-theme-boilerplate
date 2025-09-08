<?php
/**
 * The header for our theme
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center py-4">
      
      <!-- Logo & Site Name -->
      <div class="flex items-center space-x-3">
        <?php if (has_custom_logo()) : ?>
          <?php the_custom_logo(); ?>
        <?php endif; ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-xl font-bold text-gray-800">
          <?php bloginfo('name'); ?>
        </a>
      </div>

      <!-- Desktop Nav -->
      <nav class="hidden md:flex items-center space-x-6">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container'      => false,
            'menu_class'     => 'flex space-x-6 text-gray-700 font-medium',
            'fallback_cb'    => false,
          ));
        ?>

        <!-- Search Bar -->
		<?php get_search_form(); ?>

        <!-- CTA -->
        <a href="#cta" class="ml-4 inline-block px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
          Get Started
        </a>
      </nav>

      <!-- Mobile Hamburger -->
      <div class="md:hidden flex items-center">
        <button id="mobile-menu-button" class="text-gray-700 focus:outline-none">
          ☰
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="hidden md:hidden bg-gray-50 border-t border-gray-200">
    <div class="px-4 py-3 space-y-3">
      <?php
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container'      => false,
          'menu_class'     => 'flex flex-col space-y-2 text-gray-700 font-medium',
          'fallback_cb'    => false,
        ));
      ?>

      <!-- Mobile Search -->
      <?php get_search_form(); ?>

      <!-- CTA -->
      <a href="#cta" class="block w-full text-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
        Get Started
      </a>
    </div>
  </div>
</header>

<script>
  document.getElementById('mobile-menu-button').addEventListener('click', function () {
    document.getElementById('mobile-menu').classList.toggle('hidden');
  });
</script>
