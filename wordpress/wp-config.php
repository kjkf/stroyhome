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
define('DB_NAME', 'stroi');

/** MySQL database username */
define('DB_USER', 'stroi_admin');

/** MySQL database password */
define('DB_PASSWORD', 'S-567438');

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
define('AUTH_KEY',         '7)&CAwWrn4hir5i6DpQoHUQ&wroOwW@gH@uSter0l)u1RfOL(GfhPknb26ra0fuT');
define('SECURE_AUTH_KEY',  'FVGnkIM&HyMJ1jReiIYUCnQ^FFaNX4yhaIFrO8yBXlu0xOrSFvSu@BWEc)JVZfiv');
define('LOGGED_IN_KEY',    '7P)aMo^%r4KyDm0wI1UEQLwEf^VKhlMTQNIjk0@5wYr!L5%6nFsjs3732QbnkJF3');
define('NONCE_KEY',        'jHOm(GVFA905(U&nGvgWgJjwSWP)mBK@#)I7rRXM7*6sWINA^G&(T6G6VNXDNW&&');
define('AUTH_SALT',        '&L6vD4r0zeQY*J%mw)2Yq7OR%HqFrzi%it#cWPJbChsrTI^w&%M8T6g)#GD1DH9!');
define('SECURE_AUTH_SALT', '()MUBrAJkGqGqfQgfqPA!rPN1(Y1&A^Do9jMNTAxQt#l(GlskqlAu!&W!QFQP(9h');
define('LOGGED_IN_SALT',   '2bD1UgiO9!clMOPE8juP6NgEsx7ZDCA8csNHQhKGdZoL!51XW6wxj#&pquG5nbwX');
define('NONCE_SALT',       'BvD5c3vaECX8gbuJYx)YhPZbSuTfmYBlJvg3B(QAdjZMBQKe4cH!azP3vLTb(Ljo');
/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
?>