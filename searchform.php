<?php 


?>
<div class="">
    <form class="flex space-y-3 space-x-2" role="search" method="get" action="<?php esc_url(home_url('/')); ?>">
        <label class="sr-only"><?php echo _x('Search for:', 'label', 'wordpress') ?></label>
        <input type="text" class="min-w-0 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline focus:border-indigo-500 focus:ring-indigo-500" placeholder="<?php echo esc_attr_x('Search', 'placeholder', 'wordpress') ?>" value="<?php the_search_query(); ?>" name="s">
        <button type="submit" class="rounded-lg flex items-center justify-center text-base font-semibold leading-7 text-white py-1.5 px-3 antialiased cursor-pointer bg-indigo-600 hover:bg-indigo-700 focus:ring focus:ring-indigo-400 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2"><?php echo esc_attr_x('Search', 'submit button', 'wordpress') ?></button>
    </form>
</div>