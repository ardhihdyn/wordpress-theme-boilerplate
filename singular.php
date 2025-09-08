<?php
/**
 * Singular template with TailwindCSS
 */
get_header();
?>

<main class="bg-gray-50 py-12">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-12">

    <!-- Main Content -->
    <div class="lg:col-span-2">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class("bg-white p-8 rounded-lg shadow"); ?>>

          <!-- Featured Image -->
          <?php if (has_post_thumbnail()) : ?>
            <div class="mb-6">
              <?php the_post_thumbnail('large', ['class' => 'rounded-lg w-full h-auto object-cover']); ?>
            </div>
          <?php endif; ?>

          <!-- Title -->
          <h1 class="text-3xl font-extrabold text-gray-900 mb-4">
            <?php the_title(); ?>
          </h1>

          <!-- Meta -->
          <?php if (get_post_type() === 'post') : ?>
            <div class="flex items-center space-x-4 text-sm text-gray-500 mb-6">
              <span>By <?php the_author_posts_link(); ?></span>
              <span>•</span>
              <time datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                <?php echo get_the_date(); ?>
              </time>
              <span>•</span>
              <span><?php comments_number('No Comments', '1 Comment', '% Comments'); ?></span>
            </div>
          <?php endif; ?>

          <!-- Content -->
          <div class="prose prose-lg max-w-none text-gray-800">
            <?php the_content(); ?>
          </div>

          <!-- Categories & Tags -->
          <?php if (get_post_type() === 'post') : ?>
            <div class="mt-8 border-t pt-4 text-sm text-gray-600">
              <p><strong>Categories:</strong> <?php the_category(', '); ?></p>
              <p><strong>Tags:</strong> <?php the_tags('', ', ', ''); ?></p>
            </div>
          <?php endif; ?>

          <!-- Comments -->
          <div class="mt-12">
            <?php comments_template(); ?>
          </div>
        </article>
      <?php endwhile; endif; ?>
    </div>

    <!-- Sidebar -->
    <aside class="lg:col-span-1">
      <div class="bg-white p-6 rounded-lg shadow space-y-6">

        <!-- Search -->
        <div>
          <?php get_search_form(); ?>
        </div>

        <!-- Recent Posts -->
        <div>
          <h3 class="text-lg font-semibold mb-3">Recent Posts</h3>
          <ul class="space-y-2 text-sm text-indigo-600">
            <?php
            $recent_posts = wp_get_recent_posts(['numberposts' => 5]);
            foreach ($recent_posts as $post) : ?>
              <li>
                <a href="<?php echo get_permalink($post['ID']); ?>" class="hover:underline">
                  <?php echo esc_html($post['post_title']); ?>
                </a>
              </li>
            <?php endforeach; wp_reset_query(); ?>
          </ul>
        </div>

        <!-- Categories -->
        <div>
          <h3 class="text-lg font-semibold mb-3">Categories</h3>
          <ul class="space-y-2 text-sm text-indigo-600">
            <?php wp_list_categories(['title_li' => '']); ?>
          </ul>
        </div>

      </div>
    </aside>

  </div>
</main>

<?php get_footer(); ?>
