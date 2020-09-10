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
            background: #6C63FF!important;
        }

    </style>

<?php
}
add_action( 'wp_head', 'evie_customizer_css' );