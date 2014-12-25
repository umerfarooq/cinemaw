<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'cinemaworld');

/** MySQL database username */
define('DB_USER', 'cinemaworld');

/** MySQL database password */
define('DB_PASSWORD', 'admin');

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
define('AUTH_KEY',         'd<]Q,M6S{fQ5~u)>1!{+pw3yK5JeOCfP7<G3kMGS2lX*!>{F`TYB5C&DKwt@>FCY');
define('SECURE_AUTH_KEY',  'Xn67(m[bIx!4;| /}jCZ$O!e=aNd{x]Tac|_JB2Ft^j77`9.89R]Mc-hLLMKYQNp');
define('LOGGED_IN_KEY',    '_zBK}lH4-{PE?_IB||I?2r|njkmIuWMXsb$gw|;GdF${[(EHe/W4u{Ugc&$!9BQ-');
define('NONCE_KEY',        'do_aZ8k]t11qb?lOX,J,C]~ I[2CA85Cl2X*r$.*e`UjGklF}[yWb3?1qt1gy*XW');
define('AUTH_SALT',        '@aV,^Hq]+sP<V~#g|qWn8-,O:`/cgX*Zx|JxqRobrkj|J P%9*(GX7$ lj)7NZi|');
define('SECURE_AUTH_SALT', 'jD%}xpv4PBA+V[1-bgR<in|;B<|gA`6E2NTzR--7<Q#Wk=?tXM07ND|5+)!yIw ?');
define('LOGGED_IN_SALT',   'Cu3`?scqc:.Ca6ak<u[F{fVwzyhS7i74-ChhWj|ZI}-QfI+FN!Cf1+ `% =Y.%yO');
define('NONCE_SALT',       '^-,LBLLW7<X$kJF)En7)s-Z^4CXlrW$V*C{Hpcz>3QP+N<MSr1jvIV9;bHe}2I>I');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
