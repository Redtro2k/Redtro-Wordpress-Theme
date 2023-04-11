<div class="">
    <form class="mt-6 sm:flex sm:max-w-md lg:mt-0" role="search" method="get" action="<?php esc_url(home_url('/')); ?>">
        <label class="sr-only"><?php echo _x('Search for:', 'label', 'wordpress') ?></label>
        <input type="text" class="w-full min-w-0 appearance-none rounded-md border-gray-300 bg-white px-[calc(theme(spacing.3)-1px)] py-[calc(theme(spacing[1.5])-1px)] text-base leading-7 text-gray-900 placeholder-gray-400 shadow-sm focus:border-indigo-600 focus:ring-indigo-600 sm:w-56 sm:text-sm sm:leading-6" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'wordpress') ?>" value="<?php the_search_query(); ?>" name="s">
        <div class="mt-4 rounded-md sm:mt-0 sm:ml-4 sm:flex-shrink-0">
            <button type="submit" class="flex w-full items-center justify-center rounded-md bg-indigo-600 py-1.5 px-3 text-base font-semibold leading-7 text-white hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 sm:text-sm sm:leading-6"><?php echo esc_attr_x('Search', 'submit button', 'wordpress') ?></button>
        </div>
    </form>
</div>