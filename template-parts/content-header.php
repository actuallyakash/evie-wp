<?php
/**
 * Template part for displaying header for post/page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evie
 */

?>

<div class="container center article__header">
    <small class="article__breadcrumbs">
        <?php evie_get_breadcrumbs(); ?>
    </small>

    <?php the_title( '<h1 class="article__header__title">', '</h1>' ); ?>

    <div class="user__info">
        <?php if ( 'post' === get_post_type() ) :?>
            <div class="user__img__container">
                <img src="<?php echo get_avatar_url( get_the_author_meta( 'ID' ), array( 'size' => 450 )); ?>" alt="<?php get_the_title(); ?>">
            </div>
        <?php
            evie_posted_by();
        endif; ?>
    </div>
    
    <div class="page__header__image">
        <?php evie_post_thumbnail(); ?>
    </div>
</div>