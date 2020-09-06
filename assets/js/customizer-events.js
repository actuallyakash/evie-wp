/**
 * File customizer-events.js.
 *
 * Contains handlers to handle customizer events.
 */
(function () {
	wp.customize.bind('ready', function () {
        
        // Show the logo resize control when logo is found.
        wp.customize.bind('ready', function () {
            wp.customize('custom_logo', function ( setting ) {
                wp.customize.control('logo_size', function ( control ) {
                    var visibility = function () {
                        if ( "" !== setting.get() ) {
                            control.container.slideDown(180);
                        } else {
                            control.container.slideUp(180);
                        }
                    };
                    visibility();
                    setting.bind(visibility);
                });
            });
        });

	});
})(jQuery);
