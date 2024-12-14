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
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

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
define( 'AUTH_KEY',         'SNF-T.W&Oo2N7!T-->g+v,!b~aY3 GYd&{pQoS)YUYfnm<@jiW?#sTN%d!oE+@G:' );
define( 'SECURE_AUTH_KEY',  '8yZhj Z`nqStn=PXWYcVo#mxfYDS.OfNXPRybBnR(6J5Ts#jT0tzlxUi{8}%*5r+' );
define( 'LOGGED_IN_KEY',    '!+wgUrDlF9mgRWs%k1_.v(J0D9~p_c.25FCihM% Inod$>u-dlf8;`cfsu{&<hl=' );
define( 'NONCE_KEY',        'Qd8@3T@c?k]L@wR9ZAnjC7dFk~=taIBhCLcPGnjZPHXE.E#Nb1>EsSb/(7Q)pXns' );
define( 'AUTH_SALT',        'S+[DGdF_6UI3zn<>y,3eqOEUqR )ZP!W^X(acP~+j3=X!1|y[8@TpnJQ3xk~#PNq' );
define( 'SECURE_AUTH_SALT', 'mN:?X/;68K~w2:(ZpC;:E7*2ID1 QPPb=6=)9>nH2yEd^e^S!a:0?-HnM8xYAz=h' );
define( 'LOGGED_IN_SALT',   'u4gt]BjB!Y@ira%D;l#BJ1-MTEY~RQ>mnKs(t^;n A`1wXd;{`JYB{Lc*0WaCTq{' );
define( 'NONCE_SALT',       '%o`7K(S]b=M%M-sE,*rK:9o*EqWNtgg`4>r}anFi.vB_em<[qgY7nNoudVe<{5ao' );

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
