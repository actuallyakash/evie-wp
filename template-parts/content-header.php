<?php
/**
 * Template part for displaying header for post/page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package evie
 */

?>

<?php if ( ! has_post_thumbnail() || is_archive() ) { ?>

    <div class="page__header">
        <div class="hero__overlay hero__overlay--gradient"></div>
        <div class="hero__mask"></div>
        <div class="page__header__inner">
            <div class="container">
                <div class="page__header__content">
                    <div class="page__header__content__inner" id='navConverter'>
                        <?php if ( is_archive() ) {
                            the_archive_title();
                            the_archive_description( '<div class="page__header__text">', '</div>' );
                        } else {
                            the_title( '<h1 class="page__header__title">', '</h1>' ); ?>
                            <p class="page__header__text"> <?php evie_get_breadcrumbs(); ?> </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } else { ?>

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

<?php } ?>