<?php get_header(); ?>

<div class="main container">
    <?php
    if (have_posts()) {
        ?>
        <h1 class="main__title title"><?php the_title(); ?></h1>
        <div class="main_content">
            <?php the_content(); ?>
        </div>
        <?php
    }
    ?>
</div>

<?php get_footer(); ?>