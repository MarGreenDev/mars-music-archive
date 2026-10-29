<?php
get_header();
?>

<main>

    <?php if (have_posts()) : ?>
<?php while (have_posts()) : ?>
    <?php the_post(); ?>
            <?php if ( has_post_thumbnail() ) :
                the_post_thumbnail( 'large' );
            endif; ?>
            <h2><?php the_title() ?></h2>
            <h3><?php echo esc_html(get_field("artist" ?: 'Unknown')) ?></h3>
            <h4><?= esc_html(get_field("release_year" ?: 'Unknown'))?></h4>
            <p><?= esc_html(get_field("record_format" ?: 'Unknown'))?></p>
            <p><?= esc_html(get_field("genre" ?: 'Unknown'))?></p>
            <p><?= esc_html(get_field("record_label" ?: 'Unknown'))?></p>
            <p><?= esc_html(get_field("purchase_date" ?: 'Unknown'))?></p>
            <p><?= esc_html(get_field("condition" ?: 'Unknown'))?></p>
    <?php
    endwhile;
    endif;
    ?>

</main>
<?php
get_footer();
?>