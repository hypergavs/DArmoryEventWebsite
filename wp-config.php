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
define('DB_NAME', 'd_armory');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

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
define('AUTH_KEY',         ',YpN~UfJ(cOblMntY.KU=kw:m^0Ro+/b)]@Z:..G+9O=|;uo@6XsF.xvklN:JU}U');
define('SECURE_AUTH_KEY',  '^oDNTh<D1R.A1W#vX2dds4muJ-@hm2?Px 7U/ahkU)$ESg#HK-0t/}!.1Ik_q=[H');
define('LOGGED_IN_KEY',    'M9QIj(BVNg>SiP&4Gpk`F/QePW|+3;-|)qyp|eGnaJz|u2JOR`<FJ]GWkR.5Ms.Z');
define('NONCE_KEY',        'Y@cDOY#45;r]#?]g JiNYS=QbRA/u&H^q/6OGT.S-}1$72[]/9wn1Y,L#aW|nDmj');
define('AUTH_SALT',        ')CUj.h{{5y0SeNmG`=>p=BLa6.uG~Zy=RlTcqB7SfUz*<L}, ^r#^GX*{iXOX1W+');
define('SECURE_AUTH_SALT', 'q*vF0db0o4!@&Ev+*c%R8,,=F-$*)$mkG<.ka6xqFnZkJtvT)$y4WNjo}h@qH982');
define('LOGGED_IN_SALT',   '( H],HXK}C>=B{zo3e|1,gmcT0Wl~&[vNcuh{=8tMAEJN](kIu8nh(-^sJP*,v=8');
define('NONCE_SALT',       'y{R+rmB.$yrPb9TSj$(5q!^-J/6$JauM~y%n]d/]X(`asF8,bIp:r[EXyFD:AlZc');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'gm_';

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
