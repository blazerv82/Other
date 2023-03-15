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

require_once ('wp-config/config.php');

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
define( 'AUTH_KEY',         'tg5}A8FFE?H0iL-OBmDG&kFD%rlm`<S`$>A7G|/t2FG:5?!WW:v|L2/3g2!OvSTz' );
define( 'SECURE_AUTH_KEY',  'u5}Qy2z_})]4yW2ZX60AFf>C8,wT-b/l&Hu6@*k`I-6U<sc-I=(FHHz%&=hCgPqj' );
define( 'LOGGED_IN_KEY',    '2Qg}&KbU+:yYa+wv4;)}h/q4PEGV7bRkeFAm9ZFbt5Rw],{epMI0zbKgE(0fGlQ%' );
define( 'NONCE_KEY',        'i Ty_4]G(mY#}9?Yx?6la?_x ~KxQ_W#y.EVZv&Hn%oHH>-[pk)u}Z2,R!:oUaKK' );
define( 'AUTH_SALT',        's4radt^gWD@*64FyoMO][eZG}M4/rXx<.QZ_Bh1>6;Y/B1C *L7(kdGyl9QuMGT-' );
define( 'SECURE_AUTH_SALT', 's{e@b<,=y.,lY2qOy+i*MYj0tz$v EVV~xk)Ez1qW,YDqoFcI- Gs{6m$].rwta_' );
define( 'LOGGED_IN_SALT',   'v1DhRK,DSJ[<.%*nOv{lA%c!4X9wAytp~ogcL21ZF9`H]^9x:B%jD7~q*-o-a|?e' );
define( 'NONCE_SALT',       '^`ZKfRuXnKp5|;=KI|^q48$%ewd|*^S5iZbv}8zP;flgpa !Sa;G#z&ETzd+at5V' );

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
