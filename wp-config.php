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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'formplugin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '9P0cO=o}/vsP.p-Sf#pS{g2+_!)pfgm+6~oT3N<EYClOQ)NXonY6yACt6`R%kNz6' );
define( 'SECURE_AUTH_KEY',  '_l# j>P*Qtv{yBZH[O1Y2T5RK|EfdLp|/s0,fgUOv-h=|Vn{ /u?X6*X]{Izu@Sv' );
define( 'LOGGED_IN_KEY',    '8zN`r0J4gIJ&5g:`$tQiAHDc)%7H9U@q!t1kw?^-r?( pI*?C%)hu*3e%|qT)-{Q' );
define( 'NONCE_KEY',        '_]/8D?kmjGDZx4^ ejwDd3_1O9m0XKw*?JNxa5n-[GM:%vE jQ:.].BL6DG/HZF9' );
define( 'AUTH_SALT',        'wJjMpxKt=CK~}0crKq2ebn>82Vd]VM9_BM7A.WOW./Sm>z{9JEimF9{)A+,)&pu,' );
define( 'SECURE_AUTH_SALT', '&J~dRP2A0+Z^?v6j)h]z(agu~N%@oG{$r~qS2^j0D Rw]38~>l*An*NC;;OX_>Ma' );
define( 'LOGGED_IN_SALT',   '&q&I>QQD-C18>Q_}5J!-31)9)r$pI23/TSpJZ4Gn@/`,zyujoMGf%iZ78[2M1Yz}' );
define( 'NONCE_SALT',       '-z(/a@L>X(4S7$Y8i3 ,K3G$f=_t<YH^+4YnmJ|*vX`$]fDxjr>vPF],dVKby7W`' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
