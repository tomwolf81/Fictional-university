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

if(strstr($_SERVER['SERVER_NAME'], 'fictional-university.local')) {
        define( 'DB_NAME', 'local' );
        define( 'DB_USER', 'root' );
        define( 'DB_PASSWORD', 'root' );
        define( 'DB_HOST', 'localhost' );
}else {
    define( 'DB_NAME', 'dbrt25xj3shqvg' );
    define( 'DB_USER', 'uyws959xdywsd' );
    define( 'DB_PASSWORD', 'uyws959xdywsd' );
    define( 'DB_HOST', '127.0.0.1' );
}




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
define('AUTH_KEY',         'HxaAtlusFDibWj5ZLbCJSTIAqkFBM4/P8MZjzL4WK1sPJGhRyttnw71tue9X+bz5seaS2gW8sae/b8ny1CADNQ==');
define('SECURE_AUTH_KEY',  'KLTJtBv6B9AHPgDQ38CnzPGk7mv+erRD4V7gtG7kvXkxKmAha1YB6DSkENtY6UumEtPX8mk9Fm74XWwVrTFfnQ==');
define('LOGGED_IN_KEY',    '0AARe4LyOlVF5/4WvnI1wiTA2hD7L1SDZLFklyNzOskQXoQ0rh4kmKyCxhMAuUK/umUknppL2/mz+S8JidOAYQ==');
define('NONCE_KEY',        'gbpzdAK713p2DENSSEUlmcszqWic/dJHpbEzMxdl8pgx/BBmMsunLufAdrhndu6Yt3QTByirVSMZOcFSeCPKqQ==');
define('AUTH_SALT',        'eKbTLdEpSyjsG2rIjPDBZm4/hjaEnawPZuGemCWiw3ktdXG7/tI+yGu5eyhJamaua5qDr7S5SC3WXqCd2/hMDw==');
define('SECURE_AUTH_SALT', 'PWoYTsyMODzTqbwD5AmrpwcuhMw60uSW5x1a9DMEH9/BTfzc3v/VaORzWyN9ONZDFyOvGxPWDa0goybJp9CW/A==');
define('LOGGED_IN_SALT',   'kONpU7OCibr2FFLu5L49L7kfFLmqRsogGdN4hZxZqlVfxL6NarDsbTCz10PXLXElv/QU4ritjnM7xdrZ7BHeOA==');
define('NONCE_SALT',       'aFzD6dx8z/XLA+aHCcV4fQNNvJOtLOLYk2sHxYQGBDenmCogGOU4gyEiRe62Kra7YQqb4DMChlDm+f/UXsgOKg==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';




/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
