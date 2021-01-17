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
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wordpress_db' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'adm' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', 'adm' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'Z;[vy|qeH@k.I%-v8GV{~$PA*?Izra/w4b/e5!kY=2/R2QZZIYseh,_xn@ LU?>j');
define('SECURE_AUTH_KEY',  '*n.NvlKWZR|.>LZ=a1v8PL{v+~h;?.PY911%]-B@#@1fjm<MVQJCkhJ2q?mw``-e');
define('LOGGED_IN_KEY',    'u5ONj>`uihxv&iPz+~Cv4:$B~>,^4*ulksDJ31kfA|7U|)9aM|BIrHAH2wEUF_z+');
define('NONCE_KEY',        'rO>7PJ>rZS|-*_b:old2Ir( wJ^iefd}{fcY81u|%A(nO/^&lGdpEOSU />vjI68');
define('AUTH_SALT',        'rG-O1~:;1U?p?&&@Ib)Xq`?,few72)w+.41NI%tt;FoK0B-s/dpG[Wb>a K1^MdT');
define('SECURE_AUTH_SALT', 'c>%}anAOZ@6H}BU9HW*k@m|I !;|%SLqg&3P*8^M0WG/Qz!~VPRMBb=f4K6}@H:I');
define('LOGGED_IN_SALT',   'wIq{z}hoxU$?R-q4F 15dZSEIoXz-n|>1EU#O3b$#$gVWjNxu(*0Xc!r&QBR?;>?');
define('NONCE_SALT',       'usW`H3{f-&tZlu$PKCr|Ck3ct9H-~k9!P^T&b@+YCTp=|L`t|,^AJAI[ud--[U~<');

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
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';