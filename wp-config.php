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
define( 'DB_NAME', 'service_db' );

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
define( 'AUTH_KEY',         'Tm&*WYeC;L;KUiO[]<-@lr>/@#-JWyKXewluzIB#/v}J1!Lobi1sC6W;poT/MOHC' );
define( 'SECURE_AUTH_KEY',  'M57b4NFUJ6QfZ-ChDaH4@SY,8?J_?vo1o-h*u)kYy^;p FXn+o]}t#%U[dP,cOYd' );
define( 'LOGGED_IN_KEY',    'EaXaI0ET5[EM2JN x&GCNKxUIds ##,Q8A&n7q9xwxCVs#0r{}m6ZWdPbQ+bIgBH' );
define( 'NONCE_KEY',        ' 5:Q$/*j1w];~Ta9m`5xG+D,-$aaF+msK6QR4V#p>Yh$85IBM,P*^l7I{$uLnaVK' );
define( 'AUTH_SALT',        '5R:<xlHI._PC!E<~PjGYuzx7uMhQiRaW=3bSP<WP4 ci>*W)/D|fs5dR7}vZpRDF' );
define( 'SECURE_AUTH_SALT', 'DPj@o`(-oq_IIo$y-i:3qTAnI(a5)B!s$$xVh18z,$N*R(eVFs%8#4fZIT>WL~mR' );
define( 'LOGGED_IN_SALT',   '!gv~jjdIGi&*h^B*lp1|oVn9|*{9L4t6LXNZA_9y4dWK,7*Um|0yCnr$J!y<zW7r' );
define( 'NONCE_SALT',       'bJ1l;=z!{A#h;v=RZPze?gSJu5Sb-`A[O>d>Sno?-svxS)KLH)1WrhvQl88[`Ba~' );

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
