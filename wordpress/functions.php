<?php
/**
 * stroydom theme functions and definitions
 */

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Настройка SMTP
 *
 * @param PHPMailer $phpmailer объект мэилера
 */

//add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_footer', 'script_theme');
add_action('after_setup_theme', 'theme_register_nav_menu');
add_action( 'init', 'register_post_types' );
add_action( 'phpmailer_init', 'mihdan_send_smtp_email' );

function mihdan_send_smtp_email( PHPMailer $phpmailer ) {
    // $phpmailer->isSMTP();
    // $phpmailer->Host       = SMTP_HOST;
    // $phpmailer->SMTPAuth   = SMTP_AUTH;
    // $phpmailer->Port       = SMTP_PORT;
    // $phpmailer->Username   = SMTP_USER;
    // $phpmailer->Password   = SMTP_PASS;
    // $phpmailer->SMTPSecure = SMTP_SECURE;
    // $phpmailer->From       = SMTP_FROM;
    // $phpmailer->FromName   = SMTP_NAME;
    $phpmailer->IsSMTP();

    $phpmailer->CharSet    = 'UTF-8';

    $phpmailer->Host       = 'mail.blu-group.site';
    $phpmailer->Username   = 'stroihome@blu-group.site';
    $phpmailer->Password   = 'S-567438';
    $phpmailer->SMTPAuth   = true;
// 	$phpmailer->SMTPSecure = 'tsl';

    $phpmailer->Port       =25;
    $phpmailer->From       = 'stroihome@blu-group.site';
    $phpmailer->FromName   = 'STROYHOME';

    $phpmailer->isHTML( true );
}
add_action('wp_mail_failed', 'log_mailer_errors', 10, 1);
function log_mailer_errors( $wp_error ){
    $fn = ABSPATH . '/mail.log'; // say you've got a mail.log file in your server root
    $fp = fopen($fn, 'a');
    fputs($fp, "Mailer Error: " . $wp_error->get_error_message() ."\n");
    fclose($fp);
}
function style_theme() {
    wp_enqueue_style('main_styles', get_stylesheet_uri());
    wp_enqueue_style('normalize', get_template_directory_uri() . '/assets/css/normalize.css');
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/css/styles.min.css');
}

function script_theme() {
    wp_enqueue_script('jquery'); // скорее всего он уже будет подключен, это на всякий случай
    wp_enqueue_script( 'true_loadmore', get_stylesheet_directory_uri() . '/loadmore.js', array('jquery') );
    wp_enqueue_script( 'sendMailAxax', get_stylesheet_directory_uri() . '/sendMailAxax.js', array('jquery') );
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/main.min.js', array('sendMailAxax')  );
    wp_enqueue_script('map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDUOfbRY8MVrXteqJG_O8wijRsIi95akeg&map_ids=4bdebe2aef94632b&callback=initMap&libraries=&v=weekly&language=ru&region=RU', array('scripts') );
}

function theme_register_nav_menu() {
    register_nav_menu('menu-header', 'Верхнее меню сайта');
    register_nav_menu('menu-main', 'Главное меню сайта');
    register_nav_menu('menu-footer', 'Меню в футере');
    add_theme_support('post-thumbnails', array('post', 'stages', 'key_projects'));
    add_image_size('news_thumb', 250, 250, true);

    register_nav_menu('news-menu-header', 'Верхнее меню страницы');
    register_nav_menu('news-menu-main', 'Главное меню страницы');
    register_nav_menu('news-menu-footer', 'Меню в футере страницы');
}


function the_breadcrumb() {
    if (!is_front_page()) {
        echo '<a class="breadcrumb" href="';
        echo get_option('home');
        echo '"> Главная';
        echo '</a>';
        echo " / ";
        if (is_category() || is_single()) {
            //the_category(' ');
            if (is_single()) {
                //echo " / ";
                the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
    else {
        echo 'Home';
    }
}

function register_post_types(){
    register_request_type();
    register_project_type();
    register_stages_type();
    register_keyproject_type();
    register_tooltips_type();
}

function register_project_type() {
    register_post_type( 'projects', [
        'label'  => null,
        'labels' => [
            'name'               => 'Типовые проекты', // основное название для типа записи
            'singular_name'      => 'Типовой проект', // название для одной записи этого типа
            'add_new'            => 'Добавить проект', // для добавления новой записи
            'add_new_item'       => 'Добавление проекта', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование проекта', // для редактирования типа записи
            'new_item'           => 'Новый проект', // текст новой записи
            'view_item'          => 'Смотреть проект', // для просмотра записи этого типа.
            'search_items'       => 'Искать проект', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Топовые типовые проекты', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-images-alt',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function register_stages_type() {
    register_post_type( 'stages', [
        'label'  => null,
        'labels' => [
            'name'               => 'Этапы работы', // основное название для типа записи
            'singular_name'      => 'Этап работы', // название для одной записи этого типа
            'add_new'            => 'Добавить этап работы', // для добавления новой записи
            'add_new_item'       => 'Добавление этапа работы', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование этапа работы', // для редактирования типа записи
            'new_item'           => 'Новый этап работы', // текст новой записи
            'view_item'          => 'Смотреть этап работы', // для просмотра записи этого типа.
            'search_items'       => 'Искать этап работы', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Этапы работы', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-list-view',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title','thumbnail' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function register_keyproject_type() {
    register_post_type( 'key_projects', [
        'label'  => null,
        'labels' => [
            'name'               => 'Проекты под ключ', // основное название для типа записи
            'singular_name'      => 'Проект под ключ', // название для одной записи этого типа
            'add_new'            => 'Добавить проект под ключ', // для добавления новой записи
            'add_new_item'       => 'Добавление проекта под ключ', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование проекта под ключ', // для редактирования типа записи
            'new_item'           => 'Новый проект под ключ', // текст новой записи
            'view_item'          => 'Смотреть проект под ключ', // для просмотра записи этого типа.
            'search_items'       => 'Искать проект под ключ', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Проекты под ключ', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-admin-network',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function register_tooltips_type() {
    register_post_type( 'tooltips', [
        'label'  => null,
        'labels' => [
            'name'               => 'Подсказки', // основное название для типа записи
            'singular_name'      => 'Подсказка', // название для одной записи этого типа
            'add_new'            => 'Добавить подсказку', // для добавления новой записи
            'add_new_item'       => 'Добавление подсказки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование подсказки', // для редактирования типа записи
            'new_item'           => 'Новая подсказка', // текст новой записи
            'view_item'          => 'Смотреть подсказку', // для просмотра записи этого типа.
            'search_items'       => 'Искать подсказку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Подсказки', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-insert',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function register_request_type() {
    register_post_type( 'request', [
        'label'  => null,
        'labels' => [
            'name'               => 'Заявки', // основное название для типа записи
            'singular_name'      => 'Заявка', // название для одной записи этого типа
            'add_new'            => 'Добавить заявку', // для добавления новой записи
            'add_new_item'       => 'Добавление заявки', // заголовка у вновь создаваемой записи в админ-панели.
            'edit_item'          => 'Редактирование заявки', // для редактирования типа записи
            'new_item'           => 'Новая заявка', // текст новой записи
            'view_item'          => 'Смотреть заявку', // для просмотра записи этого типа.
            'search_items'       => 'Искать заявку', // для поиска по этим типам записи
            'not_found'          => 'Не найдено', // если в результате поиска ничего не было найдено
            'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
            'parent_item_colon'  => '', // для родителей (у древовидных типов)
            'menu_name'          => 'Заявки', // название меню
        ],
        'description'         => '',
        'public'              => true,
        // 'publicly_queryable'  => null, // зависит от public
        // 'exclude_from_search' => null, // зависит от public
        // 'show_ui'             => null, // зависит от public
        // 'show_in_nav_menus'   => null, // зависит от public
        'show_in_menu'        => true, // показывать ли в меню адмнки
        // 'show_in_admin_bar'   => null, // зависит от show_in_menu
        'show_in_rest'        => null, // добавить в REST API. C WP 4.7
        'rest_base'           => null, // $post_type. C WP 4.7
        'menu_position'       => 4,
        'menu_icon'           => 'dashicons-list-view',
        //'capability_type'   => 'post',
        //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
        //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
        'hierarchical'        => false,
        'supports'            => [ 'title', 'editor' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'taxonomies'          => [],
        'has_archive'         => false,
        'rewrite'             => true,
        'query_var'           => true,
    ] );
}

function true_load_posts(){

    get_template_part( 'templates/post', get_post_format() );
}


add_action('wp_ajax_loadmore', 'true_load_posts');
add_action('wp_ajax_nopriv_loadmore', 'true_load_posts');
