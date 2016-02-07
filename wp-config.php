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
define('DB_NAME', 'theme');

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
define('AUTH_KEY',         'rs,&4{pLiqv/?C=aHRyo_`RE-ff3yK|DzJG1BHyK M+QZg^8&y$UlMy{x& 6+Ag~');
define('SECURE_AUTH_KEY',  'L|~ZEY0O*)&fsCSs]fDB&{w:+f,MPwYDqJ6K1`4FiIYda;i<fGq^$3K{xMEiPb^j');
define('LOGGED_IN_KEY',    'RUmr%_mjEFn:3EChF+SGDH|mCAjL@w@}`=750543?2-<[@QV1ipyOKt5pFXB.d;k');
define('NONCE_KEY',        '-_bAJSpB&&0_`sj4J>E4=D[m]*_S[cuK?osCo!E$X4YQ_7BTxA,yg9CV3MJiL`^~');
define('AUTH_SALT',        'fAL0%iZ,cd`[noJF.cC+)|gb& S<-3atrOrv%vTNvBji1Ld}Mi:@hMa-B+OZV/U~');
define('SECURE_AUTH_SALT', 'ot8-0*CktJm]i*L&5H+#=3jlg].on^|689YTKtfI[;7;ZB|1f]y{!]0[HqJO|gL]');
define('LOGGED_IN_SALT',   '+tk|GS%upOnmsh]p7<ZA vL%c^|zTnhAXr=v*VxOy;jfdv6-{yM8E0b7 X`2>|%Q');
define('NONCE_SALT',       '6S|z~[k Lg[Jic.t}`rke|^:Gk:&!wRr}sYZ,U`pr8GXQ[4qN-x%jeppkZm2-j},');

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
