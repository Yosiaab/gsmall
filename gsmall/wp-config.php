<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'gsmall' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

if ( !defined('WP_CLI') ) {
    define( 'WP_SITEURL', $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
    define( 'WP_HOME',    $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] );
}



/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '2LWq4oz3KB89zuWHqMANgynp6RjkFjfM0nNX7LQNPjhz3ajjZ7QYTyjMdehoYTAO' );
define( 'SECURE_AUTH_KEY',  'Qn0CgNwnYovl9Nce8MIkp1drQiMDE1g45vWyJ9XNZX9cJaSSy2WcfHk24kHnY9Xm' );
define( 'LOGGED_IN_KEY',    'sZip5jprSfyY6N317kxCFcxkBVysUuhYvJS3ZSU59sRpVzbItQ0A9Gd8pOoBQ220' );
define( 'NONCE_KEY',        'upT75ffftDHl4DVTXayJQKvlxjtO5BYkjgreoOmUiBl3wVR8BIN9Sm4QYV07Ek86' );
define( 'AUTH_SALT',        'AVfG7LOJtk4QUUN5hNYKC6OGtCYMCCEUJfUWVz29p3dxDkgVA6ZqfbfV05jURVCc' );
define( 'SECURE_AUTH_SALT', 'jf9F949mmaxwMzeAiDgu6LeH681shE6Pg4w3ZmgdRlbzpWlslb03zEksFcaEExih' );
define( 'LOGGED_IN_SALT',   'DFJfuvyN0sNkkoH4C0XLg9lOR8Wy260U1vsoBPD2903D7EXLUSo5HcpHh3kyBteZ' );
define( 'NONCE_SALT',       'jqOBfU0tmZDWWCCgAcyqNZgUP6n9MGYM0pHuaQPBKBh6IFmKNDL9yacc1ZBiXTR2' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
