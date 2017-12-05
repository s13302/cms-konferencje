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
define('DB_NAME', 'cms');

/** MySQL database username */
define('DB_USER', 'cms');

/** MySQL database password */
define('DB_PASSWORD', 'cms');

/** MySQL hostname */
define('DB_HOST', 'db');

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
define('AUTH_KEY',         'ezZaymRiNwr)s3&M5J=bLr=+[I5R?jgLZk:VHH=C#?ci)3Fwjo@:(xy&BO0CvQV`');
define('SECURE_AUTH_KEY',  'C2w8V|ulS4g)%x8mYl?q)ogn)pjZCB&LpEsbu@e/XU+Q5@,QweD0|x{9Ic@G.B@^');
define('LOGGED_IN_KEY',    'Fjkvn5c.~&(zs.O++IY6J,d&3c]N<SHsb0if:*.h;!Svd3H/O~D)-s6rj=LK6DVa');
define('NONCE_KEY',        'xX=dK|JJ1(2M8a)N~9KSM?y^MHQIl/*ibH00c!#[C}d{LO)b9{%1)0qjmB.mR8Um');
define('AUTH_SALT',        '{Gs<?Z>S,$8zd=VleyyK#.aB=f[v>b$.|yq1Vsu$(~Y.4jr~ba#:;JZLZ)vyQ[yP');
define('SECURE_AUTH_SALT', ')+6WU<x{M-54iVG0 !nsE/MwR-V#%z,_W~s 12S9xE5Kg@A`yGTzIoRZMwX+};LY');
define('LOGGED_IN_SALT',   'I-/Z?5c)lXcD_)@b})Qrbvp{HNHaT>gY=:80acda7,fL.u/?K?=k#!ca/6>[I{IX');
define('NONCE_SALT',       'rj>xsG~-y,b:u(X|~s4rEpZS+J#t?Y_3*jQ@yf+rFPdrjXNVyJq,.(Q5.U]JV*w~');

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

