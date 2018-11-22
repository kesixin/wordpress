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
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '/~J/>oD23]^/#FCC AxqL})HIsE>SA`[X4MTX(T?a=O2.0JUy]Ti.iwTO|z.+(,G');
define('SECURE_AUTH_KEY',  'e&1k[)j^M-0].*K0!/]Jj_?<[qftQ;}16Ve]SloC3lSx!UK:?z~AXwN&(>VKyoyB');
define('LOGGED_IN_KEY',    'mRc;|Ihsg{;k(5u,F=?akUR3_0T$#=q#yem)m~3zeyh1+Di!G3J1JWr 7g;u<[Fn');
define('NONCE_KEY',        'S: J]$-@_HnWHVwn Kz3t0`CZ`-b3#q(3jvQ-/I9mDs/W6-qu#y4i<S4WVsN=r~$');
define('AUTH_SALT',        'ypcE^hr2{W^CLrZ{.d8Qxp3h2{O,jipJT:C!HHnWHB_8Q|NMU/~c[34{%c1&g/fm');
define('SECURE_AUTH_SALT', 'Y:23v,{l@2yLbAAHtk,NIw,)G?o*Th,GruO@xr,<o.<+9_V$oF,TlHbB+F*#Utzc');
define('LOGGED_IN_SALT',   '}t!s<1Yd6peBqWd;D(faZjr_{k[2{Gi#4%PZv-JW*qg@iv:}<9CH8?{BO}N*xR=E');
define('NONCE_SALT',       '{-H*-j$H5h=j;oK#,I0}{LK:SSE#J(51CD!/%JMWiomPoyDiXJ|n_db$T2]= Sf2');

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
