<?php
//include_once(__DIR__.'/inc/github-updater/github-updater.php');
//
// add_action( 'admin_init', 'dh_remove_git_menu_page',999 );
// function dh_remove_git_menu_page() {
//   remove_submenu_page( 'options-general.php','github-updater' );
// }
//Function: Auto Update plugin
function auto_update_dhseo ( $update, $item ) {
  // Array of plugin slugs to always auto-update
  $plugins = array (
      'dhseo'
  );
  if ( in_array( $item->slug, $plugins ) ) {
       // Always update plugins in this array
      //error_log('auto update true on: '.$_SERVER['SERVER_NAME'],3,__DIR__.'/update.txt');
      return true;
  }else{
    // Else, use the normal API response to decide whether to update or not
    return $update;
  }
}
add_filter( 'auto_update_plugin', 'auto_update_dhseo', 20, 2 );
