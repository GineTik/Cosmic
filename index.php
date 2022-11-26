<?php get_header(); ?>

<div class="main container">
    <div class="sidebar">
        <div class="sidebar__social-network">
            <span class="sidebar__title">Social Network</span>
            <?php
                display_menu('social_networks_menu', 'sidebar__menu', '');
            ?>
        </div>
    </div>
    <?php
    if (have_posts()) {
        if (the_title('', '', false) != '') {
            ?> 
                <h1 class="main__title title"><?php the_title(); ?></h1>
            <?php
        }
        ?>
        <div class="main__content">
            <?php the_content(); ?>
        </div>
        <?php
    }
    ?>
</div>

<?php get_footer(); ?>