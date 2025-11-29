/**
 * Author Social Links Widget JavaScript
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        // Add any interactive functionality here if needed
        // For example, tooltips, animations, etc.
        
        // Optional: Add smooth scroll or other enhancements
        $('.pnncle-social-link').on('click', function() {
            // Track analytics or perform other actions
            if (typeof gtag !== 'undefined') {
                gtag('event', 'click', {
                    'event_category': 'Social Link',
                    'event_label': $(this).attr('aria-label')
                });
            }
        });
    });

})(jQuery);

