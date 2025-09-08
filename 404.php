<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header();
?>

<main class="min-h-[70vh] flex items-center justify-center bg-gray-50 px-6">
  <div class="text-center max-w-lg mx-auto">
    
    <!-- Big 404 -->
    <h1 class="text-9xl font-extrabold text-blue-600">404</h1>
    <h2 class="mt-4 text-3xl font-bold text-gray-900">Page Not Found</h2>
    <p class="mt-3 text-gray-600">Sorry, we couldn’t find the page you’re looking for. Try searching below or return to the homepage.</p>

    <!-- Search Form -->
    <div class="mt-6">
      <?php get_search_form(); ?>
    </div>

    <!-- Back to Homepage -->
    <div class="mt-6">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="inline-block px-6 py-3 bg-blue-600 text-white font-semibold rounded-md shadow hover:bg-blue-700 transition">
        Go Home
      </a>
    </div>
  </div>
</main>

<?php get_footer(); ?>
