<?php
/**
 * Comments template styled with TailwindCSS
 */

if (post_password_required()) {
  return;
}
?>

<div id="comments" class="mt-12 bg-white p-8 rounded-lg shadow">

  <!-- Comments Title -->
  <?php if (have_comments()) : ?>
    <h2 class="text-2xl font-bold text-gray-900 mb-6">
      <?php
      $count = get_comments_number();
      echo $count . ' ' . _n('Comment', 'Comments', $count, 'textdomain');
      ?>
    </h2>

    <!-- Comment List -->
    <ol class="space-y-6">
      <?php
      wp_list_comments([
        'style'       => 'ol',
        'short_ping'  => true,
        'avatar_size' => 48,
        'callback'    => function ($comment, $args, $depth) {
          $tag = ($args['style'] === 'div') ? 'div' : 'li';
          ?>
          <<?php echo $tag; ?> <?php comment_class("border-b border-gray-200 pb-6"); ?> id="comment-<?php comment_ID(); ?>">
            <div class="flex space-x-4">
              <div class="flex-shrink-0">
                <?php echo get_avatar($comment, 48, '', '', ['class' => 'rounded-full']); ?>
              </div>
              <div>
                <div class="flex items-center space-x-2 text-sm text-gray-600">
                  <span class="font-semibold text-gray-900"><?php comment_author(); ?></span>
                  <span>•</span>
                  <time datetime="<?php comment_time('c'); ?>"><?php comment_date(); ?></time>
                </div>
                <div class="mt-2 text-gray-800">
                  <?php comment_text(); ?>
                </div>
                <div class="mt-2 text-sm">
                  <?php
                  comment_reply_link(array_merge($args, [
                    'reply_text' => 'Reply',
                    'depth'      => $depth,
                    'max_depth'  => $args['max_depth'],
                    'before'     => '<span class="text-indigo-600 hover:underline">',
                    'after'      => '</span>',
                  ]));
                  ?>
                </div>
              </div>
            </div>
          </<?php echo $tag; ?>>
          <?php
        },
      ]);
      ?>
    </ol>

    <!-- Pagination -->
    <div class="mt-6">
      <?php paginate_comments_links(['prev_text' => '← Previous', 'next_text' => 'Next →']); ?>
    </div>

  <?php endif; ?>

  <!-- Comment Form -->
  <div class="mt-8">
    <?php
    comment_form([
      'class_form'        => 'space-y-4',
      'class_submit'      => 'px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 cursor-pointer',
      'title_reply'       => '<h3 class="text-xl font-bold text-gray-900 mb-4">Leave a Comment</h3>',
      'comment_field'     => '<textarea id="comment" name="comment" rows="4" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Your comment..." required></textarea>',
      'fields'            => [
        'author' => '<input id="author" name="author" type="text" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Name" required>',
        'email'  => '<input id="email" name="email" type="email" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Email" required>',
        'url'    => '<input id="url" name="url" type="url" class="w-full border border-gray-300 rounded-lg p-3 focus:ring-indigo-500 focus:border-indigo-500" placeholder="Website">',
      ],
    ]);
    ?>
  </div>
</div>
