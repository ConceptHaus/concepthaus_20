<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */
// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'forge_wp_concept');
/** Tu nombre de usuario de MySQL */
define('DB_USER', 'forge');
/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'ipJlBz5ays4ho80oULXY');
/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');
/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');
/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');
/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', '%} 32T{L/FS//vpd$gB3>0&=~rPDzw,hg}|P(i/ReT<Z]uJYXP*L!/>.a@~0:6P/');
define('SECURE_AUTH_KEY', 'WHb(Y`u4:)zO2y13U*}#IMI338)}cvuGiYfW73t&:lc37,BLzz5k90g@H0SXDp$a');
define('LOGGED_IN_KEY', 'IT+#-ZV!N?J*.As}=,x(U40L[q5/?_cjb34fhLp&DhFuaITjgw.56Tx8sB$t;6mL');
define('NONCE_KEY', 'IM^o0k(pY[QC##F&;+zwOB/Ey69mb]8@`dTeItD/Pw_r<2h,@{W1UYE&qd/Ux!M(');
define('AUTH_SALT', 'n%>WN)H1L0m%@Nl|YlF*s2#X7>^mU NKRQe!*&dV9LCD2XogM3Fz:FIgVZ@WJxMa');
define('SECURE_AUTH_SALT', '4R>5g#5Hr~)N1SFzWpv4EuhaOjb(rvL&Hh2O-^_lwd_WTeT*cKmJWh]xj2!;B#yr');
define('LOGGED_IN_SALT', 'YUoXKp_xjB8k,Yjo,)=,IIQEF:Q#n9)P6?` _yLc@-OT3Y,ViD:UQb1wA `<Ps68');
define('NONCE_SALT', 'd$g^hfhGo6NQK,Lw5^I0C213BCv1EC4hu1Ge>Q&NDIWfH/j9lOu&WfA9I|pm-/N)');
/**#@-*/
/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_haus';
/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', false);
/* ¡Eso es todo, deja de editar! Feliz blogging */
/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
