<?php
/**
 * @file
 * Platform.sh example settings.php file for Drupal 8.
 */

// Default Drupal 8 settings.
//
// These are already explained with detailed comments in Drupal's
// default.settings.php file.
//
// See https://api.drupal.org/api/drupal/sites!default!default.settings.php/8
$databases = [];
$config_directories = [];
$settings['update_free_access'] = FALSE;
$settings['container_yamls'][] = __DIR__ . '/services.yml';
$settings['trusted_host_patterns'] = array(
  '^progressive-alliance\.uk$',
  '^.+\.progressive-alliance\.uk$',
  '^pa.local$',
  '^master-7rqtwti-7kxfvhv6bhmqk\.eu\.platform\.sh$',
);

// Install with the 'standard' profile for this example.
//
// As the settings.php file is not writable during install on Platform.sh (for
// good reasons), Drupal will refuse to install a profile that is not defined
// here.
$settings['install_profile'] = 'social';

// The hash_salt should be a unique random value for each application.
// If left unset, the settings.platformsh.php file will attempt to provide one.
// You can also provide a specific value here if you prefer and it will be used
// instead. In most cases it's best to leave this blank on Platform.sh. You
// can configure a separate hash_salt in your settings.local.php file for
// local development.
// $settings['hash_salt'] = 'change_me';

// Set up a config sync directory.
//
// This is defined inside the read-only "config" directory. This works well,
// however it requires a patch from issue https://www.drupal.org/node/2607352
// to fix the requirements check and the installer.
$config_directories[CONFIG_SYNC_DIRECTORY] = 'sites/default/files/config_xyz/sync';

// Automatic Platform.sh settings.
if (file_exists(__DIR__ . '/settings.platformsh.php')) {
  include __DIR__ . '/settings.platformsh.php';
}

// Local settings. These come last so that they can override anything.
if (file_exists(__DIR__ . '/settings.local.php')) {
  include __DIR__ . '/settings.local.php';
}

// Docker settings. These come last so that they can override anything.
if (file_exists(__DIR__ . '/settings.docker.php')) {
  include __DIR__ . '/settings.docker.php';
}
$settings['hash_salt'] = 'ysWXGNUP1rtP73g21L-L3220chqchSmeyYplGs_ikjR02AoP3Nn4tfK-9ASJxgQxD6Vd2ovR7g';
