<?php
/**
 * Front Page Template
 */
get_header();
?>

<main class="bg-gray-50">

  <!-- Hero Section -->
  <section class="relative bg-indigo-600 text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 text-center">
      <h1 class="text-4xl sm:text-5xl font-extrabold mb-4">
        <?php bloginfo('name'); ?>
      </h1>
      <p class="text-lg sm:text-xl max-w-2xl mx-auto">
        <?php bloginfo('description'); ?>
      </p>
      <div class="mt-8">
        <a href="#cta" class="px-6 py-3 bg-white text-indigo-600 font-semibold rounded-lg shadow hover:bg-gray-100">
          Get Started
        </a>
      </div>
    </div>
  </section>

  <!-- Content Section -->
  <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="prose prose-lg max-w-none">
      <?php
      while (have_posts()) :
        the_post();
        the_content();
      endwhile;
      ?>
    </div>
  </section>

  <!-- Latest Posts Grid -->
  <section class="bg-white py-16 border-t border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-2xl font-bold text-gray-900 mb-8">Latest Posts</h2>

      <?php
      $latest_posts = new WP_Query([
        'post_type'      => 'post',
        'posts_per_page' => 3,
      ]);

      if ($latest_posts->have_posts()) :
      ?>
        <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          <?php while ($latest_posts->have_posts()) : $latest_posts->the_post(); ?>
            <article class="bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden">
              <?php if (has_post_thumbnail()) : ?>
                <a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
                </a>
              <?php endif; ?>

              <div class="p-6">
                <h3 class="text-lg font-semibold mb-2">
                  <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-indigo-600">
                    <?php the_title(); ?>
                  </a>
                </h3>
                <p class="text-sm text-gray-600 mb-4">
                  <?php echo wp_trim_words(get_the_excerpt(), 20); ?>
                </p>
                <a href="<?php the_permalink(); ?>" class="text-indigo-600 font-medium hover:underline">
                  Read More →
                </a>
              </div>
            </article>
          <?php endwhile; wp_reset_postdata(); ?>
        </div>
      <?php else : ?>
        <p class="text-gray-600">No posts found.</p>
      <?php endif; ?>
    </div>
  </section>

</main>

<?php get_footer(); ?>
