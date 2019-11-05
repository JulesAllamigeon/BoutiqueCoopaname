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
define( 'DB_NAME', '' );

/** MySQL database username */
define( 'DB_USER', '' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', '' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', '' );

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
define( 'AUTH_KEY',         'UR?^u)m`-I,U0;6?XZRJN_+Ok|}[d291(X&.-^2CjHEU8t;x^yZa@m;J8;;N?6o4' );
define( 'SECURE_AUTH_KEY',  ']|l+oo/E&U#w%3j,~+O4^W#aS=0nAr=TsiAQ%W/H Fj;C|`#@$Fkp@XxB-*wtKPK' );
define( 'LOGGED_IN_KEY',    '>Ei~6<z)~#`08/n-AX02TD%+x]ftR*-/o6#R(,nkZNZ_-XQ-0h.&1.QT85`+.Knn' );
define( 'NONCE_KEY',        '+}qhey<gP%D7*{/IT|G.ybpZh<xC<xh.UcR-?@rHAgYEDq+xopmT[8/6i(V+Nao-' );
define( 'AUTH_SALT',        'yIb0CQ7{2b18tXlq# N{5-BI29{DI3%WqqB]B3~s@Pn!!7Jp+|8vm!!{S,P[r0|Y' );
define( 'SECURE_AUTH_SALT', 'K-L(&jH>^d{|t9AiKnWp]R.^7J4.g93H7J/|@/}yl<]|6@0eU aK3=m,_DLivP{L' );
define( 'LOGGED_IN_SALT',   '>ij?)+$wR/-Req8KR4]Nm{Io9OU)1nR?-m+4[B;h>KE`,4oaAj`W{IFw ,<R(wSW' );
define( 'NONCE_SALT',       '<S-JwvKl]wbuA$jU=1:@*W:sD?Fx&(t2+7J[tK=>&x/X;~5g%xy&BBE{O7v*uxUL' );

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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );
define ('WPLANG', 'fr_FR');
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
