<?php
/**
 * Customizer produced CSS
 *
 * @package EvieWP WordPress theme
 */

function eviewp_customizer_css() {
?>

    <style type="text/css">

        :root {
            --evie_primary_color: <?php echo eviewpGetOption( 'colors', 'primary_color' ); ?>;
            --evie_secondary_color: <?php echo eviewpGetOption( 'colors', 'secondary_color' ); ?>;
            --evie_link_color: <?php echo eviewpGetOption( 'colors', 'link_color' ); ?>;
            --evie_bg_color: <?php echo eviewpGetOption( 'colors', 'bg_color' ); ?>;
            --evie_header_background_color: <?php echo eviewpGetOption( 'colors', 'header_background_color' ); ?>;
            --evie_header_logo_color: <?php echo eviewpGetOption( 'colors', 'header_logo_color' ); ?>;
            --evie_tagline_color: <?php echo eviewpGetOption( 'colors', 'tagline_color' ); ?>;
            --evie_header_links_color: <?php echo eviewpGetOption( 'colors', 'header_links_color' ); ?>;
            --evie_footer_background_color: <?php echo eviewpGetOption( 'colors', 'footer_background_color' ); ?>;
            --evie_footer_text_color: <?php echo eviewpGetOption( 'colors', 'footer_text_color' ); ?>;
            --evie_heading_color: <?php echo eviewpGetOption( 'colors', 'heading_color' ); ?>;
            --evie_container_width: <?php echo eviewpGetOption( 'defaults', 'container_width' ) . 'px'; ?>;
            --evie_sidebar_width: <?php echo eviewpGetOption( 'defaults', 'sidebar_width' ) . 'px'; ?>;
            --evie_logo_size: <?php echo eviewpGetOption( 'defaults', 'logo_size' ) . 'px'; ?>;
        }

        .navbar__inner .custom__logo {
            width: var( --evie_logo_size );
            height: var( --evie_logo_size );
        }

        html,
        body {
            background-color: var( --evie_bg_color );
            color: var( --evie_secondary_color );
        }

        .navbar {
            background-color: var( --evie_header_background_color );
        }

        .navbar__logo {
            color: var( --evie_header_logo_color );
        }

        .page__main a,
        .app__main a {
            color: var( --evie_link_color );
        }

        .site__description {
            color: var( --evie_tagline_color );
        }
        
        .navbar-container a {
            color: var( --evie_header_links_color );
        }

        .footer {
            background-color: var( --evie_footer_background_color );
            color: var( --evie_footer_text_color );
        }

        .customize-partial-edit-shortcut button, .widget .customize-partial-edit-shortcut button {
            background: var( --evie_primary_color )!important;
        }

        [type="radio"]:checked+label:after,
        button,
        .button,
        .button__primary,
        #secondary #calendar_wrap #today {
            border-color: var( --evie_primary_color );
        }
        
        .comment-body span.reply a,
        .comment-edit-link {
            color: var( --evie_primary_color );
        }

        .pagination .page-numbers:hover,
        .pagination .page-numbers:focus,
        .pagination .page-numbers.current,
        .evie__category,
        .pagination a,
        .pagination span,
        .pagination-next-prev a,
        .pagination a:hover,
        .pagination-next-prev a:hover,
        [type="radio"]:checked+label:after,
        .hero__overlay,
        .button__primary,
        .widget_search form .search-submit {
            background-color: var( --evie_primary_color ) !important;
        }

        .hero__overlay--evie_gradient {
            background: linear-gradient(to right, var( --evie_primary_color ), <?php echo eviewpColorShade( eviewpGetOption( 'colors', 'primary_color' ), -15 ) ?>);
        }

        @media (min-width: 992px) {
            button:hover,
            .button:hover {
                border-color: <?php echo eviewpColorShade( eviewpGetOption( 'colors', 'primary_color' ), -15 ) ?>;
            }
        }

        .comment-body span.reply i {
            color: <?php echo eviewpColorShade( eviewpGetOption( 'colors', 'primary_color' ), -15 ) ?>;
        }

        h1, h2, h3, h4, h5, h6, .stress {
            color: var( --evie_heading_color );
        }

        @media (min-width: 1200px) {
            .container {
                width: var( --evie_container_width );
            }
        }

        @media (min-width: 992px) {
            .app__menu {
                width: var( --evie_sidebar_width );
            }
        }

        .post__content .excerpt {
            -webkit-line-clamp: <?php echo eviewpGetOption( 'defaults', 'excerpt_lines' ); ?>;
        }

    </style>

<?php
}
add_action( 'wp_head', 'eviewp_customizer_css' );