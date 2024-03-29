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
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'SunqAdmin@@.!' );

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

define('AUTH_KEY',         '~DO-Q&`dIFcM|zi3Yf844&--H`%T@z}w-FW8h(As8kU*l*P#*9hSR.Z;SfOLLM)t');
define('SECURE_AUTH_KEY',  '8S-LQ*Os>0|W4nc:$=+bWEQRcUdDsGIo}%C<dz+*5prI)~>QViHIQ)`o@uh@by?z');
define('LOGGED_IN_KEY',    'zKc7xRcXpT/FsMV!$kNPoe:$9x6;e,GlZ~,Q+CIqsB>I^d[&ERSV6#n jxqcSf`P');
define('NONCE_KEY',        'qzajHUR8~)Q-N=2mw-+aQ+KGQvdfqZ8C3_.M!z[,rF|-;N5mT5:=lOYxNmp+5uvo');
define('AUTH_SALT',        'd|9Q;2F) {1ldrS*lA{]?_0oiqT-D^dANuUO^W0QR,zDB)(_]FA/gbk/f:iiOxY6');
define('SECURE_AUTH_SALT', ')5DQ[F:N&Sjml]7|^$|>+9VX-*QtTVbB vP<0,J|~7Jx<Z#e[TYvbB2+$juF/qJ7');
define('LOGGED_IN_SALT',   '@tgd+:TUz_8II:wx>j6-emlb[:y?Xb5k6H[R|!WK<}u6r=GlR8=Z3L&{m^:CCu4y');
define('NONCE_SALT',       '^cz[A:RXgPlA~#ApU5E}|[T%I&JH6]{jwjj_tH.cCFiv/?XFu=^gMw{:RH&+c4GO');

define('WP_HOME','http://admin.sundayq.com');
define('WP_SITEURL','http://admin.sundayq.com');

/*
define('WP_HOME','http://103.146.22.168/admin');
define('WP_SITEURL','http://103.146.22.168/admin');
*/
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
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('FS_METHOD', 'direct');

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
