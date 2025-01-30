<?php
get_header();
pageBanner(array(
    'title'=>'Past events',
    'subtitle'=>"See what we've been up to",
));

?>


<div class="container container--narrow page-section">
    <?php
    $today = date('Ymd');
    $pastEvents = new WP_Query(array(
        'post_type' => 'event',
        'orderby' => 'meta_value_num',
        'meta_key' => 'event_date',
        'order' => 'DESC',
        'meta_query' => array(
            array(
                'key' => 'event_date',
                'compare' => '<',
                'value' => $today,
                'type' => 'DATE'
            )
        ),
        'paged' =>  get_query_var('paged',1)
    ));

    while ($pastEvents->have_posts()) {
        $pastEvents->the_post();
        get_template_part('template-parts/content-event');
    }
    echo paginate_links(array(
        'total' => $pastEvents->max_num_pages,
    ));
    ?>
</div>

<?php
get_footer();
?>




