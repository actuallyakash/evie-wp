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
            --background_color: <?php echo getOption( 'colors', 'background_color' ); ?>;
            --header_background_color: <?php echo getOption( 'colors', 'header_background_color' ); ?>;
            --header_logo_color: <?php echo getOption( 'colors', 'header_logo_color' ); ?>;
            --tagline_color: <?php echo getOption( 'colors', 'tagline_color' ); ?>;
            --header_links_color: <?php echo getOption( 'colors', 'header_links_color' ); ?>;
            --footer_background_color: <?php echo getOption( 'colors', 'footer_background_color' ); ?>;
            --footer_text_color: <?php echo getOption( 'colors', 'footer_text_color' ); ?>;
        }

        html,
        body {
            background-color: var( --background_color );
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
        
        .comment-body span.reply a {
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

    </style>

<?php
}
add_action( 'wp_head', 'evie_customizer_css' );