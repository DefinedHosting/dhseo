/**
 * Plugins menu.
 *
 * Contains all functions that affect the Plugins menu.
 *
 * @since  3.0
 * @package DH-SEO-pack
 */
(function($) {

    /**
     * Opens Upgrade to Pro link in Plugins menu as new tab.
     */
    function upgrade_link_plugins_menu_new_tab() {
        $('.proupgrade').find('a').attr('target','_blank');
    }

    upgrade_link_plugins_menu_new_tab();

}(jQuery));
