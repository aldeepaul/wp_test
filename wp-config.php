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
define('DB_NAME', 'wordpress_test');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

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
define('AUTH_KEY',         '?HmhfRFC:D!,gC+~6uf&D>]et<[/)@E|{]R]U4l@w61i5J$Na,*$J68+|d]:?5Ik');
define('SECURE_AUTH_KEY',  'y11F;j1sH*YEZ>4=5HXNpih<>?#@)Z)!qIjq1T3{YL7J}$9/yIacZ}EL5Ikf0(4#');
define('LOGGED_IN_KEY',    '1.;cjC;K4mZ}u>[Ur4u_U|#Di,u.WQx3>pFPD(ZXjpoK9P@HJ-YTQ*7Ho>9Sq5FK');
define('NONCE_KEY',        '01?TLoTCyG;lrFTCZX6RN87?:-lTW;6kf-qP3lD4SR.xVU?+Ml(AEv~d-9`lD}6L');
define('AUTH_SALT',        'zB+W^(gGXBo2Mo3,`{i4r[K5etT(H~o.{Aj 0v>)$R%QCa7,kfOEF1Zj_Ip}QZe{');
define('SECURE_AUTH_SALT', '+|THBk(E`o5*zdn[OZ^B&IB2gS*%,v-N1OCflD O4#GXIdEo~^r|G$*!-uLYC_1!');
define('LOGGED_IN_SALT',   ']0Xnd~$/nfy:P+`][`ochs^y/i7vRKih+V_&$xa24s{1 >_Q}:u{1}ijVavvI I]');
define('NONCE_SALT',       'E )U=Xn4Dh.z2phR*e7_^uIUl1-e]^P8+8&H X/yNSSUKFrixn(Mn4xKg+*f52 w');

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
