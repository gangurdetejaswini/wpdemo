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
define('DB_NAME', 'test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

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
define('AUTH_KEY',         'Ty=mT3*%7Syt6W;UZqM,Q/Qw^]F57Nw8W-C/=(-xoUXPj*}*Bd2k`|HlS{+uajt9');
define('SECURE_AUTH_KEY',  'oHAB.xW8n5q>:A(Dyv|`mT+Sz04k~[dJ*ucM>XxMSY>jX/?_**YCI*K&jnEs)pw1');
define('LOGGED_IN_KEY',    'd>zTm~ jMYs>Jw~MJ~oY7t#,koDO@wfs:OR^5jx086JU.poOQK&rtE#vGsTN~ `u');
define('NONCE_KEY',        'q[3w+sG0h;7s.xN$t&KUx7n4$RR+E2$MMj(Vp8lc1wp$?ar;|(}{9=[xSB,_uF+`');
define('AUTH_SALT',        ',cnU=kHK0KMy|A{X98 P7:HPv>baJ`tMlyhU(kX.oeukiF]d%.,%lrvr~V(Oftp&');
define('SECURE_AUTH_SALT', 'wc$!Po&kv;Mafw<qN$4JOM*>Lo`.8N-WO/F1a8W+WVmE]8<RvP_V*X9-L(1L<_BG');
define('LOGGED_IN_SALT',   'vR)2{O(*&n=/RUXpG;iC*17${=R=8}fazPLEz<OrYyY,hcxnP1|Vrop>nv&_Dc~G');
define('NONCE_SALT',       't,DwoGn+63u,3UMu63(XJ_O[:P}kwZCDPv^7M3]<f(y&j2I)+6L[O*8qg&]hR/WO');

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
