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
define('DB_NAME', 'cafe192034_aps30');

/** MySQL database username */
define('DB_USER', 'cafe192034_aps32');

/** MySQL database password */
define('DB_PASSWORD', '4566523b80a5ee60');

/** MySQL hostname */
define('DB_HOST', 'localhost:3306');

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
define('AUTH_KEY',         'V9J!f9QLy0fwW7CypZ9fstCCH9MRzYu#A5@l!mQC3N03I8ozdS!&*(!vL932D#BI');
define('SECURE_AUTH_KEY',  'E86zfH(PyA290apXM20j(BS9fnbp4Qcd^gBT#W)PkcCPg(hN4TRVJhjfoXitiN0b');
define('LOGGED_IN_KEY',    'NQP#kYvqsf!*jWy^RDcfhpj)%&65^eIe#Cm9SO#!7z&6L9UKL!kOs1NXw8Z60a8C');
define('NONCE_KEY',        'YEC)JcFPbkkO8*d1JmVoSkwXwiDh*V^vX!iUAV9CvdM*QA&ixYDy%EA0(c4iYXpt');
define('AUTH_SALT',        'SlBhOByAjX(NpO^q(OouQGlWapkK3O!bc6MnJqIFyLT4hY(3LC#r1Xs3HY!A^iiH');
define('SECURE_AUTH_SALT', 'tkBCb@2fCJ48b4rjETWEWyVm^iodsfwb*PXPBvnud6lhi6jEkDr#CotQYNy6C96d');
define('LOGGED_IN_SALT',   'rq&6#LTp4l!YcumhJ6SpucybBv%4rbA^rxKRzFsIK9Wl*Bxj%gfhbmZ@4Xn60bau');
define('NONCE_SALT',       'jre8(96jgreXfpi(nIEvJSpoVeaTkeWrfJecIrlsvY%fwGnG%dy3i@6mip7XErvs');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
