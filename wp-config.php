<?php
define( 'WP_CACHE', true ); // Added by WP Rocket



/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'arnaffiliates' );

/** Database username */
define( 'DB_USER', 'ronalgope' );

/** Database password */
define( 'DB_PASSWORD', 'gop3ronal' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define('AUTH_KEY',         'D}2z-J)]]SRJ@>ZQaX|R9e]_s!.qKSVn;RbtN|O$2k@E^ )*BAY10UXS@S6C2mon');
define('SECURE_AUTH_KEY',  '<m-aQ#TB LK4[iqb|=v>>r/K$vDjBwGgfn,Th=R-~q{d7csv0sU$l(l^~GeCXC/&');
define('LOGGED_IN_KEY',    'W{VEL)(pYL;_9X-Vf;.]ucr2[q =!g$Tn|Gd9O-T-QBjEp}?F0rt,q4)+paEp1N#');
define('NONCE_KEY',        'JW;PaF4(/BeTd5!iz>,:zvza5%|<|z04JXb`(D+Iu!FU]QJ#O%v-I5,gQu/4R.7y');
define('AUTH_SALT',        'u6IGqqP~n{5k9lQmL>A-!m]OO-NU8)[3-4RgC7jaKcReDhaHvt6$fUKxlJ2[Ak2q');
define('SECURE_AUTH_SALT', 'svCY|p*|-M^6)<n!g!fCq|e2>fNKo}.ElxJRnx:pC23HFBH=XMOzHV|<[Cfep&Q7');
define('LOGGED_IN_SALT',   '|EX_XoE3F]I(~4kG`^wPoZMCGfh1oxojYBDDnSzp9I~X*lE?|[&:~/7o>*~3e$fg');
define('NONCE_SALT',       'Whv;Z3BM}3-<GXuX&n{1T|0i82b=|[%OSW$7?yzC>vw_s52-RN(uf-|4B{-zZ,,;');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
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
