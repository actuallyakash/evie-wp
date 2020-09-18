<?php
/**
 * Customizer produced CSS
 *
 * @package evie
 */

function evie_customizer_css() {
?>

    <style type="text/css">

        :root {
            --primary_color: <?php echo getOption( 'colors', 'primary_color' ); ?>;
            --secondary_color: <?php echo getOption( 'colors', 'secondary_color' ); ?>;
            --bg_color: <?php echo getOption( 'colors', 'bg_color' ); ?>;
            --header_background_color: <?php echo getOption( 'colors', 'header_background_color' ); ?>;
            --header_logo_color: <?php echo getOption( 'colors', 'header_logo_color' ); ?>;
            --tagline_color: <?php echo getOption( 'colors', 'tagline_color' ); ?>;
            --header_links_color: <?php echo getOption( 'colors', 'header_links_color' ); ?>;
            --footer_background_color: <?php echo getOption( 'colors', 'footer_background_color' ); ?>;
            --footer_text_color: <?php echo getOption( 'colors', 'footer_text_color' ); ?>;
            --heading_color: <?php echo getOption( 'colors', 'heading_color' ); ?>;
            --container_width: <?php echo getOption( 'defaults', 'container_width' ) . 'px'; ?>;
            --sidebar_width: <?php echo getOption( 'defaults', 'sidebar_width' ) . 'px'; ?>;
        }

        html,
        body {
            background-color: var( --bg_color );
            color: var( --secondary_color );
        }

        .navbar {
            background-color: var( --header_background_color );
        }

        .navbar__logo {
            color: var( --header_logo_color );
        }

        .site__description {
            color: var( --tagline_color );
        }
        
        .navbar__menu a {
            color: var( --header_links_color );
        }

        .footer {
            background-color: var( --footer_background_color );
            color: var( --footer_text_color );
        }

        .customize-partial-edit-shortcut button, .widget .customize-partial-edit-shortcut button {
            background: var( --primary_color )!important;
        }

        [type="radio"]:checked+label:after,
        button,
        .button,
        .button__primary {
            border-color: var( --primary_color );
        }
        
        .comment-body span.reply a,
        .comment-edit-link {
            color: var( --primary_color );
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
        .button__primary {
            background-color: var( --primary_color );
        }

        .hero__overlay--gradient {
            background: linear-gradient(to right, var( --primary_color ), <?php echo colorShade( getOption( 'colors', 'primary_color' ), -15 ) ?>);
        }

        @media (min-width: 992px) {
            button:hover,
            .button:hover {
                border-color: <?php echo colorShade( getOption( 'colors', 'primary_color' ), -15 ) ?>;
            }
        }

        .comment-body span.reply i {
            color: <?php echo colorShade( getOption( 'colors', 'primary_color' ), -15 ) ?>;
        }

        h1, h2, h3, h4, h5, h6, .stress {
            color: var( --heading_color );
        }

        @media (min-width: 1200px) {
            .container {
                width: var( --container_width );
            }
        }

        @media (min-width: 992px) {
            .app__menu {
                width: var( --sidebar_width );
            }
        }

        .post__content .excerpt {
            -webkit-line-clamp: <?php echo getOption( 'defaults', 'excerpt_lines' ); ?>;
        }

    </style>

<?php
}
add_action( 'wp_head', 'evie_customizer_css' );