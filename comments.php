<?php 
    if(post_password_required()){
        return;
    }
?>
<section aria-labelledby="notes-title">
    <?php if(have_comments() ): ?>
    <div class="bg-white shadow sm:overflow-hidden sm:rounded-lg">
        <div class="divide-y divide-gray-200">
            <div class="px-4 py-5 sm:px-6">
                <h2 id="notes-title" class="text-lg font-medium text-gray-900">
                    <?php
                        printf(esc_html( _nx('One Comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title',
                        '') ), number_format_i18n(get_comments_number()),
                        '<span>'. get_the_title()) . '</span>'
                    ?>
                </h2>
            </div>
            <div class="px-4">
                <!-- comment list -->
                <?php wp_list_comments(array(
                    'callback' => 'my_custom_comment_list',
                    'class_list' => 'list-style-none'
                )); ?>
            </div>
        </div>
    </div>
</section>
    <h2><?php
            printf(esc_html( _nx('One Comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title',
            '') ), number_format_i18n(get_comments_number()),
            '<span>'. get_the_title()) . '</span>'
        ?></h2>
    <?php if(get_comment_pages_count() > 1 && get_option('page_comments')): ?>
        <span>
            <?php previous_comments_link(esc_html('Older Comments', 'wordress')) ?>
        </span>
        <span>
            <?php next_comments_link(esc_html('Newest Comments', 'wordress')) ?>
        </span>
    <?php endif; ?>
    <ol>

    </ol>
    <?php if(!comments_open() && get_comments_number()): ?>
        <p><?php esc_html_e('Comment are closed.', 'wordpress') ?></p>
    <?php endif; ?>
<?php endif; ?>
<?php 
$fields = array(
    'author' => '<div class="block space-y-4"><div><label for="author" class="block text-sm font-medium text-gray-700">'. __('Name', 'domainreference') . ($req ? '<span class="required text-rose-500">*</span>' : '').
    '</label><input id="author" name="author" type="text" value="'.esc_attr( $commenter['comment_author'] ).'" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></div>',
    'email' => '<div><label for="email" class="block text-sm font-medium text-gray-700">'. __('Email', 'domainreference') . ($req ? '<span class="required text-rose-500">*</span>' : '').
    '</label><input id="email" name="email" type="email" value="'.esc_attr( $commenter['comment_author_email'] ).'" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></div>',
    'url' => '<div><label for="email" class="block text-sm font-medium text-gray-700">'. __('Website', 'domainreference') . ($req ? '<span class="required text-rose-500">*</span>' : '').
    '</label><input id="url" name="url" type="text" value="'.esc_attr( $commenter['comment_author_url'] ).'" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" required></div></div>',
);
$args = array(
    'class_submit' => 'cursor:pointer ml-3 inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2',
    'label_submit' => 'Submit Post',
    'comment_field' => '<div>
    <label for="comments" class="block text-sm font-medium text-gray-700">'. _x('Comment', 'noun') .'</label>
    <textarea cols="10" class="w-full h-28 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus-ring-indigo-500 sm:text-sm text-sm" required></textarea>
    </div>',
    'fields' => apply_filters('comment_form_default_fields', $fields)
);
comment_form($args); 
?>

<!-- https://play.tailwindcss.com/P61tsIdcvh -->