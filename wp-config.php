<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'insidelyux748');

/** MySQL database username */
define('DB_USER', 'insidelyux748');

/** MySQL database password */
define('DB_PASSWORD', 'y8BbS3QvANhz');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'nEWzkl91d9K+ztpTdF+w1ZRQn3JaPzRE3LQFJ/RM7+AEfxURwipgaC1BTKnD');
define('SECURE_AUTH_KEY',  '3DTlBKDAl9E5h1r/7XS85K964EKTKQkLzYpxwvbz/Fkl/nVk5iEnoogTRtnf');
define('LOGGED_IN_KEY',    'mRLCHa+55Cl6P3zJYCMI7Xv0J9rVcX7Y9jdUgp/A+9cd6Jvf6yCKm/RlNoSn');
define('NONCE_KEY',        'iwgtTydxacV7QWkO8cOx5q0VOOTd8Ms6ELMc1MjPki2u1edfXnRScAkivJcf');
define('AUTH_SALT',        'F2CYWXJkRf6bXaxYBNEbMTJ7+XZkUtBRKPP7TWJoThf+FdzJPpkMDgqBkasI');
define('SECURE_AUTH_SALT', 'R8F6bBmCA+Ni0l4qHZNFvAdWL9tYcnZsRd+fJUMUcwvbfd6R87EYCEqnukAy');
define('LOGGED_IN_SALT',   'FxjwC1fDGnDtdz3NHeu1d8KTrr8ZH3CXaoRACT5MMJomB3arEDD/ZmrxZ+zY');
define('NONCE_SALT',       'TtYUlpU/sDyAGKdtHX2W0XHxAXiUtvXXQhtIZi+5ONd8OzdNmkcfQdHcjBDd');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'mod858_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/* Fixes "Add media button not working", see http://www.carnfieldwebdesign.co.uk/blog/wordpress-fix-add-media-button-not-working/ */
define('CONCATENATE_SCRIPTS', false );

/* Langue. */
define(WP_LANG, ‘fr_FR’);

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

// Forcer le HTTPS dans l'administration
// define('FORCE_SSL_ADMIN', false);
