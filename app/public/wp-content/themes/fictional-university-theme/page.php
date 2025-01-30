<?php
get_header();

while(have_posts()){
    // will keep track of current post
    the_post();
    pageBanner();

?>


    <div class="container container--narrow page-section">

        <?php
            $page_parent_id = wp_get_post_parent_id(get_the_ID());
            $search_parent = $page_parent_id ? $page_parent_id : get_the_ID();
            $page_children_arr = get_pages(array('child_of' => get_the_ID()));

            if($page_parent_id) {
        ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                    <p>
                        <a class="metabox__blog-home-link" href=<?php echo get_permalink($page_parent_id); ?>>
                            <i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($page_parent_id); ?></a>
                            <span class="metabox__main"><?php echo the_title(); ?></span>
                    </p>
                </div>
        <?php
            }

            if($page_parent_id or !empty($page_children_arr)) {
        ?>
                <div class="page-links">
                    <h2 class="page-links__title"><a href=<?php echo get_permalink($page_parent_id); ?>><?php echo get_the_title($page_parent_id); ?></a></h2>
                    <ul class="min-list">
                    <?php
                        wp_list_pages(array(
                            'title_li' => null,
                            'child_of' => $search_parent,
                            'sort_column' => 'menu_order',
                        ));
                    ?>
                    </ul>
                </div>

        <?php
            }
        ?>




        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    </div>

<?php
}
get_footer();
?>