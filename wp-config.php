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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpressadmin' );

/** MySQL database username */
define( 'DB_USER', 'wordpressuser' );

/** MySQL database password */
define( 'DB_PASSWORD', 'AbC13579@.!' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('SECURE_AUTH_KEY',  '*fC.-0=-p-Go|$rTr3K$}A3sS[5IoT2%Z}eEh7*M`>*4?I@oF+6[C1=fQ3hK`w@[');
define('LOGGED_IN_KEY',    '6zk+$kE$S((yv;^`nmG)K>n98wbS8<W[-2F8NeTCCwvL}I*|t]lr/+),(SW5)Oq%');
define('NONCE_KEY',        '||zqZc-zGUs[b8HOa`^/~X`^w)X6D_hlH8-wG<QzQ{Jo?O6+?us$,bF`~nu4]fiQ');
define('AUTH_SALT',        '2KU!GURK8<<lEAV:$Qus|RdGS?@J1*k3,J@^*UDeJe%+_[*cqA>pwc_v;tj4qm)y');
define('SECURE_AUTH_SALT', 'YPTwC>}mun)U2h6{8`%Qhimz4F6;><<3(4<~VWaVHw(s9B00Zu ZW[86a):GU_&b');
define('LOGGED_IN_SALT',   '8 pRw W+U[-&@|m.Kh-`|Z*lS}(!m}$<{8;[6dsnFM;; hwB_G~a}v1blXrV:m.I');
define('NONCE_SALT',       '<f}@X}!-s+%M8H`8%T8`H}Q)Xdxtz}Z+D#s7G!ep)MA:uW3=;U1PTpmP-^]I+G+b');

/*
define('WP_HOME','http://admin.sundayq.com');
define('WP_SITEURL','http://admin.sundayq.com');
*/

define('WP_HOME','http://103.146.22.168/admin');
define('WP_SITEURL','http://103.146.22.168/admin');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_sunq_';

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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
