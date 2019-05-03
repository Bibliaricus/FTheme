<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'Ftheme' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'Ftheme_owner' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '24019950dn' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         's(2P9cuqUj h_p^xo|s1aXSwdmdei>GT1cGC6#:(^xXFf6x1.u]Lp0$N!c:g~MOg' );
define( 'SECURE_AUTH_KEY',  '_6g}hfOQZ4%2{i/HX[}Jd 6_4t;MUuB#W,ei&raJez2Z9w$$nE(:_>wTl{b;D4$Q' );
define( 'LOGGED_IN_KEY',    'w>`p=`9,CtBx1~uv=L-h8|XZOjsqg|lWd2/?wb``+2DQU@Ai`@46a!B[!zXZhE$_' );
define( 'NONCE_KEY',        'B3-CZ_4siX|.8aj^DKXP]ui.pQw0p/pb<B|0t*MC=pqZKcKMFia<V(Ms!`A-A~ L' );
define( 'AUTH_SALT',        'L0[mWi1&h/{&LxT>l$>tm}1iF8DcGVSx/4A+E~Vjc1$dHvgc<5M?B+.$fCH{M(tH' );
define( 'SECURE_AUTH_SALT', '*I k<z^f6<-35J>g26{JUh3(xEQm>7f{;6q:3}8n<hBH-fppRfhexY^D_mmdm`Rj' );
define( 'LOGGED_IN_SALT',   '9mT!A6,i8v|#_!gc&;fj|a.WC^AFWmGdG#T9fjt!K:F?_T CI#Nz0LRARw4s{T5P' );
define( 'NONCE_SALT',       'Eyja7nk;Pap4D2l+oH8O+3=A8b!lp spT]GD,U{ LL;p}3ElsC_MI}/SnOb|}16{' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once( ABSPATH . 'wp-settings.php' );
