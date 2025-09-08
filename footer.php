<?php
/**
 * Footer template with TailwindCSS
 */
?>

<footer class="bg-gray-900 text-gray-300">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

      <!-- Logo + Site Name -->
      <div>
        <?php if (function_exists('the_custom_logo') && has_custom_logo()) : ?>
          <div class="mb-4">
            <?php the_custom_logo(); ?>
          </div>
        <?php else : ?>
          <h2 class="text-xl font-bold text-white mb-4"><?php bloginfo('name'); ?></h2>
        <?php endif; ?>
        <p class="text-sm"><?php bloginfo('description'); ?></p>
      </div>

      <!-- Footer Navigation -->
      <div>
        <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Menu</h3>
        <nav>
          <?php
          wp_nav_menu([
            'theme_location' => 'footer',
            'container'      => false,
            'menu_class'     => 'space-y-2',
            'fallback_cb'    => false,
            'items_wrap'     => '<ul class="%2$s">%3$s</ul>',
          ]);
          ?>
        </nav>
      </div>

      <!-- Social Links -->
      <div>
        <h3 class="text-sm font-semibold text-white tracking-wider uppercase mb-4">Follow Us</h3>
        <div class="flex space-x-4">
          <a href="#" class="text-gray-400 hover:text-white">
            <!-- Facebook -->
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 12a10 10 0 10-11.6 9.9v-7h-2v-3h2v-2.3c0-2 1.2-3.1 3-3.1.9 0 1.8.1 1.8.1v2h-1c-1 0-1.3.6-1.3 1.2V12h2.3l-.4 3h-1.9v7A10 10 0 0022 12z"/>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white">
            <!-- Twitter -->
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22.46 6c-.77.35-1.6.59-2.46.7a4.3 4.3 0 001.88-2.37 8.59 8.59 0 01-2.72 1.04 4.28 4.28 0 00-7.3 3.9A12.14 12.14 0 013 5.1a4.27 4.27 0 001.33 5.7 4.23 4.23 0 01-1.94-.53v.05a4.29 4.29 0 003.44 4.2 4.3 4.3 0 01-1.93.07 4.29 4.29 0 004 3 8.6 8.6 0 01-6.33 1.77A12.14 12.14 0 008.29 21c7.55 0 11.68-6.25 11.68-11.67 0-.18 0-.36-.01-.53A8.36 8.36 0 0022.46 6z"/>
            </svg>
          </a>
          <a href="#" class="text-gray-400 hover:text-white">
            <!-- Instagram -->
            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
              <path d="M7 2C4.2 2 2 4.2 2 7v10c0 2.8 2.2 5 5 5h10c2.8 0 5-2.2 5-5V7c0-2.8-2.2-5-5-5H7zm10 2c1.6 0 3 1.4 3 3v10c0 1.6-1.4 3-3 3H7c-1.6 0-3-1.4-3-3V7c0-1.6 1.4-3 3-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.9a1.1 1.1 0 100 2.2 1.1 1.1 0 000-2.2z"/>
            </svg>
          </a>
        </div>
      </div>

    </div>

    <!-- Bottom Bar -->
    <div class="mt-12 border-t border-gray-700 pt-6 text-center text-sm text-gray-400">
      &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. All rights reserved.
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
