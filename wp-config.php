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
define('DB_NAME', 'dreamteam');

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
define('AUTH_KEY',         'd^)E^q9I*j7vuuRe&]P(g_5pV4!&Isu#r_`NYz}<q*iZ3<`r(LpK1&v<yf<,I/_A');
define('SECURE_AUTH_KEY',  'EvE8T+])$:2S6d#4G0I^A0kHMpBckqIs(QUD;y2<*E;h$f^0GqhZ~Qxr[,_o*7P|');
define('LOGGED_IN_KEY',    'eH*$cf_1<vFN,U[6[xc&Ir~>h|e3u+SzPu3S%?-`)7QvPrV+uEtzFs.t.yl8h20V');
define('NONCE_KEY',        'GshB+G3yiwzec05_RMBLay,a=ac6o4Ba*fg75:@`a^GvU55&-ht3w`-)iyJrqlN]');
define('AUTH_SALT',        '5U#ok4-V{N-m64x,x+v(Fs4sZ:ot]C?lY*d~9F-!w[$Av-+e-K#^}|T8yGRhcuK=');
define('SECURE_AUTH_SALT', 'V3to9L3>Q?wVM*KwxQBU=$$,k$`~{G?-[(i2$*u; ZA_KRpy?Acdrqi`z|Xsvg4N');
define('LOGGED_IN_SALT',   'OB`H5|D1/>>fZnzzQ_x?nu=)mVAyL|j#ecC<rOTn|~Bu<l0_y[|p.43aIt$K`QWV');
define('NONCE_SALT',       'v`o<<.`7sy)+8R+#j(3x67P~tq>$d=!0---u/].L/!a<zKped*brBSBL|_Be)gp<');

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
