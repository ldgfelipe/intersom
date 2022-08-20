<?php

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

 * @link https://wordpress.org/support/article/editing-wp-config-php/

 *

 * @package WordPress

 */


// ** Database settings - You can get this info from your web host ** //

/** The name of the database for WordPress */

define( 'DB_NAME', "intersom_wp1" );


/** Database username */

define( 'DB_USER', "intersom_wp1" );


/** Database password */

define( 'DB_PASSWORD', "FelreT2720·" );


/** Database hostname */

define( 'DB_HOST', "localhost" );


/** Database charset to use in creating database tables. */

define( 'DB_CHARSET', 'utf8' );


/** The database collate type. Don't change this if in doubt. */

define( 'DB_COLLATE', '' );

define('JWT_AUTH_SECRET_KEY', 'your-top-secret-key');

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

define('AUTH_KEY',         '5asXHDTQ0xDz6eHEBCOcFn5vf6HF2s4m5wUPNeNbZC60n1WHuId5ryNdo7FujmgF');

define('SECURE_AUTH_KEY',  'MhhsB6J3iNfKJaAc2Exwe8DOoXc8cQ6AypgNaYRmocsWTK52vKPln3urB6PwRsBF');

define('LOGGED_IN_KEY',    'wGCOAZJGydO0NmzD9hXUkEjVtkVJDrsX9Z40vcePb1gtGR7F0mgDcZONJqTAsU7z');

define('NONCE_KEY',        'fflBxj86KWwWCC2M2B06qyjuq77jcFm7M8jPJ7sEQuDbgQ0EliXO3wBTIhFlSdnp');

define('AUTH_SALT',        'fwNwNYBSyutSvEOCfUCTIg0KPnIvJfSpJSpQsjzWXrkW2yfii06dW6DY3Z5Mtf4i');

define('SECURE_AUTH_SALT', 'fz5Kk6fb3yc63XWpx0ktdE7dLP5S58glxKXbTdJ3HCsIcVHI1EFW8oIifLYpyzrv');

define('LOGGED_IN_SALT',   'VhGzq0YiBaISv5M2KtRoIwQoVbZwixI4Hogl9DMXGoAyhSYgmsbo4uprswUoV1bb');

define('NONCE_SALT',       'DCW5cr5pv06jpJUkN7pdjA6InRapDF3ImsaKEIokvnhZmR8QCpApDmwC2ue9fg1u');


/**

 * Other customizations.

 */

define('FS_METHOD','direct');
define('FS_CHMOD_DIR',0755);
define('FS_CHMOD_FILE',0644);
define('WP_TEMP_DIR',dirname(__FILE__).'/wp-content/uploads');



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

 * @link https://wordpress.org/support/article/debugging-in-wordpress/

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

