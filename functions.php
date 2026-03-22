<?php

function enqueue_vue_scripts() {
    $template_directory = get_template_directory_uri();
    wp_enqueue_style('vue-styles-main', $template_directory . '/vue/dist/assets/style.css');
    wp_enqueue_script('vue-scripts-main', $template_directory . '/vue/dist/assets/index.js', array(), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_vue_scripts');

function add_type_module($tag, $handle, $src) {
    if ($handle !== 'vue-scripts-main') {
        return $tag;
    }
    return '<script type="module" src="' . esc_url($src) . '"></script>';
}
add_filter('script_loader_tag', 'add_type_module', 10, 3);

 function redirect_to_vue_app() {
    // НЕ трогаем админку, AJAX и REST
    if ( is_admin() || wp_doing_ajax() || ( defined('REST_REQUEST') && REST_REQUEST ) ) {
        return;
    }

    if (!file_exists(get_template_directory() . '/' . basename($_SERVER['REQUEST_URI']))) {
        include(get_template_directory() . '/index.php');
        exit();
    }
}
add_action('template_redirect', 'redirect_to_vue_app');

// Кастомные скрипты
require('functions/spart_custom_scripts.php');
// Глобальные переменные
require('functions/spart_custom_variables.php');
// Основные настройки сайта
require('functions/spart_custom_options.php');
// Регистрация типа записей "spareparts"
require('functions/spart_register_post_type_spareparts.php');
// Регистрация типа записей "engines"
require('functions/spart_register_post_type_engines.php');
// Регистрация типа записей "news"
require('functions/spart_register_post_type_news.php');
// Регистрация типа записей "promo"
require('functions/spart_register_post_type_promo.php');
// Регистрация типа записей "docs"
require('functions/spart_register_post_type_docs.php');
// REST: featured_media как объект медиа, не id
require('functions/spart_rest_featured_media.php');
// Предварительное создание страниц
//require('functions/spart_create_pages.php');
// Настройки внешнего вида бэкенда
require('functions/spart_custom_backend.php');
// Настройки внешнего вида фронтенда
require('functions/spart_custom_frontend.php');
// Хлебные крошки
require('functions/spart_breadcrumbs.php');


add_action('wp_ajax_send-form-order-engines', 'spart_send_form_order_engines');
add_action('wp_ajax_nopriv_send-form-order-engines', 'spart_send_form_order_engines');

function spart_send_form_order_engines()
{
    function stripcleantohtml($s)
    {
        return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_url = stripcleantohtml($_POST['product_url']);
        $customer = stripcleantohtml($_POST['customer']);
        $contacts = stripcleantohtml($_POST['contacts']);
        $additional = stripcleantohtml($_POST['additional']);
        $brand = stripcleantohtml($_POST['brand']);
        $name = stripcleantohtml($_POST['name']);
        $model = stripcleantohtml($_POST['model']);

        $headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'Reply-To: admin@spart.pro <admin@spart.pro>',
            'From: admin@spart.pro <admin@spart.pro>',
            'BCC: <petya.bezzvuka@gmail.com>',
        );
        $to = 'info@spart.pro';
        $subject = 'Сообщение с сайта SPART.PRO';

        $message = "<h1 class='header'>Получено новое сообщение</h1>";
        if ($customer) $message .= "<p>Имя: <b>$customer</b></p>";
        if ($contacts) $message .= "<p>Номер телефона: <b>$contacts</b></p>";
        if ($additional) $message .= "<p>Комментарий к заказу: <b>$additional</b></p>";
        $message .= "<hr/>";
        if ($product_url) $message .= "<p>Ссылка на товар: <b>$product_url</b></p>";
        if ($name) $message .= "<p>Оригинальное наименование: <b>$name</b></p>";
        if ($brand) $message .= "<p>Производитель двигателя: <b>$brand</b></p>";
        if ($model) $message .= "<p>Модель двигателя: <b>$model</b></p>";

        wp_mail($to, $subject, $message, $headers);
        die;
    }
}

add_action('wp_ajax_send-form-order', 'spart_send_form_order');
add_action('wp_ajax_nopriv_send-form-order', 'spart_send_form_order');

function spart_send_form_order()
{
    function stripcleantohtml($s)
    {
        return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_url = stripcleantohtml($_POST['product_url']);
        $customer = stripcleantohtml($_POST['customer']);
        $contacts = stripcleantohtml($_POST['contacts']);
        $additional = stripcleantohtml($_POST['additional']);
        $brand = stripcleantohtml($_POST['brand']);
        $sku = stripcleantohtml($_POST['sku']);
        $name = stripcleantohtml($_POST['name']);
        $model = stripcleantohtml($_POST['model']);

        $headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'Reply-To: admin@spart.pro <admin@spart.pro>',
            'From: admin@spart.pro <admin@spart.pro>',
            'BCC: <petya.bezzvuka@gmail.com>',
        );
        $to = 'info@spart.pro';
        $subject = 'Сообщение с сайта SPART.PRO';

        $message = "<h1 class='header'>Получено новое сообщение</h1>";
        if ($customer) $message .= "<p>Имя: <b>$customer</b></p>";
        if ($contacts) $message .= "<p>Номер телефона: <b>$contacts</b></p>";
        if ($additional) $message .= "<p>Комментарий к заказу: <b>$additional</b></p>";
        $message .= "<hr/>";
        if ($product_url) $message .= "<p>Ссылка на товар: <b>$product_url</b></p>";
        if ($sku) $message .= "<p>Оригинальный номер: <b>$sku</b></p>";
        if ($name) $message .= "<p>Оригинальное наименование: <b>$name</b></p>";
        if ($brand) $message .= "<p>Бренд производителя: <b>$brand</b></p>";
        if ($model) $message .= "<p>Совместимые модели техники: <b>$model</b></p>";

        wp_mail($to, $subject, $message, $headers);
        die;
    }
}

add_action('wp_ajax_send-form-query', 'spart_send_form_query');
add_action('wp_ajax_nopriv_send-form-query', 'spart_send_form_query');

function spart_send_form_query()
{
    function stripcleantohtml($s)
    {
        return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $customer = stripcleantohtml($_POST['customer']);
        $contacts = stripcleantohtml($_POST['contacts']);
        $additional = stripcleantohtml($_POST['additional']);

        $headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'Reply-To: admin@spart.pro <admin@spart.pro>',
            'From: admin@spart.pro <admin@spart.pro>',
            'BCC: <petya.bezzvuka@gmail.com>',
        );
        $to = 'info@spart.pro';
        $subject = 'Сообщение с сайта SPART.PRO';

        $message = "<h1 class='header'>Получено новое сообщение</h1>";
        if ($customer) $message .= "<p>Имя: <b>$customer</b></p>";
        if ($contacts) $message .= "<p>Номер телефона: <b>$contacts</b></p>";
        if ($additional) $message .= "<p>Запрос: <b>$additional</b></p>";

        wp_mail($to, $subject, $message, $headers);
        die;
    }
}

add_action('wp_ajax_send-form-feedback', 'spart_send_form_feedback');
add_action('wp_ajax_nopriv_send-form-feedback', 'spart_send_form_feedback');

function spart_send_form_feedback()
{
    function stripcleantohtml($s)
    {
        return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $customer = stripcleantohtml($_POST['customer']);
        $contacts = stripcleantohtml($_POST['contacts']);
        $additional = stripcleantohtml($_POST['additional']);

        $headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'Reply-To: admin@spart.pro <admin@spart.pro>',
            'From: admin@spart.pro <admin@spart.pro>',
            'BCC: <petya.bezzvuka@gmail.com>',
        );
        $to = 'info@spart.pro';
        $subject = 'Сообщение с сайта SPART.PRO';

        $message = "<h1 class='header'>Получено новое сообщение</h1>";
        if ($customer) $message .= "<p>Имя: <b>$customer</b></p>";
        if ($contacts) $message .= "<p>Номер телефона: <b>$contacts</b></p>";
        if ($additional) $message .= "<p>Запрос: <b>$additional</b></p>";

        wp_mail($to, $subject, $message, $headers);
        die;
    }
}

add_action('wp_ajax_send-form-callme', 'spart_send_form_callme');
add_action('wp_ajax_nopriv_send-form-callme', 'spart_send_form_callme');

function spart_send_form_callme()
{
    function stripcleantohtml($s)
    {
        return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $contacts = stripcleantohtml($_POST['contacts']);

        $headers = array(
            'MIME-Version: 1.0',
            'Content-type: text/html; charset=utf-8',
            'Reply-To: admin@spart.pro <admin@spart.pro>',
            'From: admin@spart.pro <admin@spart.pro>',
            'BCC: <petya.bezzvuka@gmail.com>',
        );
        $to = 'info@spart.pro';
        $subject = 'Запрос звонка с сайта SPART.PRO';

        $message = "<h1 class='header'>Получен запрос на обратный звонок</h1>";
        if ($contacts) $message .= "<p>Номер телефона: <b>$contacts</b></p>";

        wp_mail($to, $subject, $message, $headers);
        die;
    }
}

add_action('wp_ajax_send_to_telegram', 'spart_send_to_telegram');
add_action('wp_ajax_nopriv_send_to_telegram', 'spart_send_to_telegram');

function spart_send_to_telegram()
{
    wp_remote_get("https://api.telegram.org/bot5090634493:AAEXLeJPljF_D-rDd4EqDUUCG_YlX5ZdIHY/sendMessage?chat_id=-1001545810896&text=Hello");
}


