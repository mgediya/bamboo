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
define( 'DB_NAME', 'bb_bamboo' );

/** MySQL database username */
define( 'DB_USER', 'chaka' );

/** MySQL database password */
define( 'DB_PASSWORD', 'this.admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',          '!jSMh!+wb~[~G%MuL>-sm+/.r^cigP^>GOBCG@eI]%u,>2yUE&1ii7zA,zI%l[Ko' );
define( 'SECURE_AUTH_KEY',   'co9*3&Pv1rC+Uet{ruN8RaZlp.LBeaj[e^b8 (+b/yQ%b#@X4v_1NTPEy/<D@rc9' );
define( 'LOGGED_IN_KEY',     '~fC^!},^v:zB|W(0Y}>&3JUJJg}e316tBf;O0,OXDG$7*_-cLa4;Qhc*H?+D1]w{' );
define( 'NONCE_KEY',         'r0NtnuD5-p)Ey*=DO~sX:aUgA#=_X7x|?>]6;:ENstF^xVB4q|Cu[_`C-w6jlk{b' );
define( 'AUTH_SALT',         '1G`0h3S-jJpAe?B,*-q%&ukz{vcogm-j#m*_je>8b12r4beqElK&Ao.HJ`s9VRse' );
define( 'SECURE_AUTH_SALT',  'Z^6kB*sB7,P!/24@a2/xqNwL`&QELBd!Z`0}L~6~S|r0w@Uu_.^p TEr->wRl&>$' );
define( 'LOGGED_IN_SALT',    's.N0|_i[T7(M>=i5>H3hXY$I@S$[r>XC7L||%DsDAL2)L};;7;h$PQft.x@]X`t[' );
define( 'NONCE_SALT',        'S@b8Fe$;EmDH@WDZrg4y(susw;FjVc?A|cp)-,pN^I|:K!msn}Eb4dyG.0;0.GK;' );
define( 'WP_CACHE_KEY_SALT', 'hRVfOC<$5^k~bvl]SC3c[}vQIq!g=d]k;.1,= oc^.Bnb^FC@vQF>7.@]q=6CMrv' );

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

define('FS_METHOD', 'direct');

define('ALLOW_UNFILTERED_UPLOADS', true);

define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';

define('ONEINC_PORTAL_AUTH_KEY', 'A722632B-B099-442F-81DE-527B68657CBB');
define('ONEINC_PORTAL_BASE_URL', 'https://testportalone.processonepayments.com');