<?php
/**
 * The template for displaying Search Results pages
 */
get_header();
?>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
  
  <!-- Search Title -->
  <header class="mb-10 text-center">
    <h1 class="text-3xl font-extrabold text-gray-900">
      Search Results for: 
      <span class="text-blue-600"><?php echo get_search_query(); ?></span>
    </h1>
  </header>

  <?php if (have_posts()) : ?>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("bg-white rounded-lg shadow hover:shadow-lg transition p-6"); ?>>
          <!-- Featured Image -->
          <?php if (has_post_thumbnail()) : ?>
            <a href="<?php the_permalink(); ?>" class="block mb-4">
              <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover rounded-md']); ?>
            </a>
          <?php endif; ?>

          <!-- Title -->
          <h2 class="text-xl font-semibold mb-2">
            <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-blue-600">
              <?php the_title(); ?>
            </a>
          </h2>

          <!-- Excerpt -->
          <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>

          <!-- Read More -->
          <a href="<?php the_permalink(); ?>" class="inline-block text-blue-600 hover:text-blue-800 font-medium">
            Read More →
          </a>
        </article>
      <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <div class="mt-10">
      <?php
      the_posts_pagination(array(
        'mid_size'  => 2,
        'prev_text' => __('← Previous', 'yourtheme'),
        'next_text' => __('Next →', 'yourtheme'),
        'before_page_number' => '<span class="px-3 py-1 border rounded-md mx-1 hover:bg-blue-50">',
        'after_page_number'  => '</span>',
      ));
      ?>
    </div>

  <?php else : ?>
    <!-- No Results -->
    <div class="text-center py-20">
      <h2 class="text-2xl font-bold text-gray-700 mb-4">No results found</h2>
      <p class="text-gray-500 mb-6">Sorry, but nothing matched your search terms. Please try again with different keywords.</p>
      <?php get_search_form(); ?>
    </div>
  <?php endif; ?>
</main>

<?php get_footer(); ?>
