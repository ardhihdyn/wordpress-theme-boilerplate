<?php
/**
 * Category Archive Template with TailwindCSS
 */
get_header();
?>

<main class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

    <!-- Category Title & Description -->
    <header class="mb-12 text-center">
      <h1 class="text-4xl font-extrabold text-gray-900 mb-4">
        <?php single_cat_title(); ?>
      </h1>
      <?php if (category_description()) : ?>
        <p class="max-w-2xl mx-auto text-gray-600">
          <?php echo category_description(); ?>
        </p>
      <?php endif; ?>
    </header>

    <!-- Posts Grid -->
    <?php if (have_posts()) : ?>
      <div class="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class("bg-white rounded-lg shadow hover:shadow-lg transition overflow-hidden"); ?>>
            
            <?php if (has_post_thumbnail()) : ?>
              <a href="<?php the_permalink(); ?>">
                <?php the_post_thumbnail('medium', ['class' => 'w-full h-48 object-cover']); ?>
              </a>
            <?php endif; ?>

            <div class="p-6">
              <h2 class="text-lg font-semibold mb-2">
                <a href="<?php the_permalink(); ?>" class="text-gray-900 hover:text-indigo-600">
                  <?php the_title(); ?>
                </a>
              </h2>
              <p class="text-sm text-gray-600 mb-4">
                <?php echo wp_trim_words(get_the_excerpt(), 18); ?>
              </p>
              <a href="<?php the_permalink(); ?>" class="text-indigo-600 font-medium hover:underline">
                Read More →
              </a>
            </div>
          </article>
        <?php endwhile; ?>
      </div>

      <!-- Pagination -->
      <div class="mt-12">
        <?php
        the_posts_pagination([
          'mid_size'  => 2,
          'prev_text' => '← Previous',
          'next_text' => 'Next →',
          'class'     => 'flex justify-center space-x-2',
        ]);
        ?>
      </div>

    <?php else : ?>
      <p class="text-center text-gray-600">No posts found in this category.</p>
    <?php endif; ?>

  </div>
</main>

<?php get_footer(); ?>
