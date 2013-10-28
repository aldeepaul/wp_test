<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root05');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         ')h9H(@r8&IrEC|j$@:fG;!6(vJ5Y0|X`3W_QX}s.po;M!ZF:oat8w{St|ZLY$Lev');
define('SECURE_AUTH_KEY',  'Rd<sS3XN-lM X]-+9r,{|=$3eA,{d>,2G#RvqS]s)b)Xy2Pke%Y1a4|bZ-kFLORG');
define('LOGGED_IN_KEY',    '9/ D1%3YsYuVVDSBp&&(LV|169e;MN79vZk{z=z-sci$wk!J4{+.PoGAsbY&&%2s');
define('NONCE_KEY',        '^K<Nl04jkX~tN*R-P(:;_E[O$|AxJ3jZUlyK8_.n&ic:Gq-)13#G>%{5dsQ?>>_F');
define('AUTH_SALT',        'A}ws^&`29uM5@af}s3CS~.gB+3P^x*}y+(jtCytk)]@C@6TuKe?d=FBBY<mR|Nq`');
define('SECURE_AUTH_SALT', ':mlY_8I-|gYUO2v5}Ho,h9.3k7.}:V$w|1A@n@db4`^dfpPJYSvZcNpVOX>LXiP>');
define('LOGGED_IN_SALT',   '/H-ayR7Zh%DiisgN~MP6#&RFxL_51`!{k?t}G;~ebWdE-;HG!~Me!cRCDAV@cSI+');
define('NONCE_SALT',       's:BVxZ%5%:u?u*Ejo5<^Y~[Sc^[%>#bQpF_dzEQWbf_nZCdel&|IY(rM:o/,5Lg>');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
    define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');