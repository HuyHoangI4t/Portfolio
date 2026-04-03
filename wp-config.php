<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'db_portfolio' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

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
define( 'AUTH_KEY',         ',i7Yo0;2%a>155?5~ 3&taQbv?qC[Lk,[ZICc%?XT~/;]3_Dd,IO)}xr+pA_d9Y2' );
define( 'SECURE_AUTH_KEY',  'ZBwm%iq>Pl}EBn?n2d9>:J9pME6xN0rxcL#%pNl?Ts7Pm)DFYh67tEDJD`_N)>^z' );
define( 'LOGGED_IN_KEY',    'p,A5<9d0ucUn`c2y%LvR]%)OtDKZn MMjiP#D|F:%@mq}h/}0`T5c&>/RyN570C{' );
define( 'NONCE_KEY',        'POrpY8%K-fs)smm@a{Ezr8PDo#w{oQu,]d/-X?-[Lm4O0~9fY]3im;Fej;QkCgb,' );
define( 'AUTH_SALT',        '*H{P^fq7+e}`S4oy*`C#Ww|nA7~w6KNc4D1:(gfKM1 -y%9t@wWg=*9P%{;OK+BJ' );
define( 'SECURE_AUTH_SALT', 'y{ ery&i5 &`%E5z87)r<.CbKWw/D,h/m23w9q[-A_{}PkHQVLFj-:wiMw4yj4!<' );
define( 'LOGGED_IN_SALT',   'b9G)Dz~`rs&Bj9c#>UM=hNpy.ye81b%h_N`!u>MJYz|e?B.76:vD|wP 90G}$3?[' );
define( 'NONCE_SALT',       '-=D)!&2#r-mzn_ ZUSxF0sw{]N<[u)P&QB6LERmu(^[0:j98-!Nvb.r_IE-gpf8B' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
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
