<?php
get_header();
pageBanner(array(
    'title'=>'All Programs',
    'subtitle'=>'There is something for everyone. Have a look around.',
));
?>

<div class="container container--narrow page-section">
    <ul class="min-list link-list">
        <?php
        while (have_posts()) {
            the_post();
            ?>
            <li><a class="" href=<?php the_permalink() ?>><?php the_title(); ?></a></li>
            <?php
        }
        ?>
    </ul>
    <?php
    echo paginate_links();
    ?>
</div>

<?php
get_footer();
?>




