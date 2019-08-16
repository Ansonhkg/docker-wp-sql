<?php
/** Test
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
/** AWS Access Keys for S3 */
define( 'DBI_AWS_ACCESS_KEY_ID', 'ENTER_YOUR_AWS_ACCESS_KEY_FOR_S3' );
define( 'DBI_AWS_SECRET_ACCESS_KEY', 'ZzCCCMo+ENTER_YOUR_AWS_SECRET_KEY_FOR_S3' );

// Stop Wordpress from prompting FTP Information
define('FS_METHOD', 'direct');

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', getenv('WORDPRESS_DB_NAME');
/** MySQL database username */
define( 'DB_USER', getenv('WORDPRESS_DB_USER'));
/** MySQL database password */
define( 'DB_PASSWORD', getenv('WORDPRESS_DB_PASSWORD'));
/** MySQL hostname */
define( 'DB_HOST', getenv('WORDPRESS_DB_HOST'));
/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8');
/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '');
/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '1d9ff055e23577d6baffe78bf7f3b19cba64bb35');
define( 'SECURE_AUTH_KEY',  'e9b1a7abd6d82c68d8c309990c3c10ab5b91ac1d');
define( 'LOGGED_IN_KEY',    'd66b81d38ee28dd637a282b6d8ee9f7915c0548f');
define( 'NONCE_KEY',        '929855d3527b742f4df28e0d821e27b5d37fc9e7');
define( 'AUTH_SALT',        '486d947e455ecb35ad76e0b14c432bbc46b97e63');
define( 'SECURE_AUTH_SALT', '829e7399fd2099130401f57634fe432b5eea480e');
define( 'LOGGED_IN_SALT',   'de0bbfef7cbd422477abb275babbf6a72f76f64b');
define( 'NONCE_SALT',       'a3d4ed6e2f413bb8f010b9192470293e1cb8072a');
/**#@-*/
/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';
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
define( 'WP_DEBUG', false );

// If we're behind a proxy server and using HTTPS, we need to alert Wordpress of that fact
// see also http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy
if (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
	$_SERVER['HTTPS'] = 'on';
}

/* That's all, stop editing! Happy publishing. */
/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}
/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
