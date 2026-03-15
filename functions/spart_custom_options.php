<?php

defined( 'ABSPATH' ) || exit;

// Настройки сайта
if ( ! function_exists( 'spart_set_options' ) ) :
  function spart_set_options() {

    /* Общие настройки */
    // Членство
    add_filter( 'pre_option_users_can_register', function( $users_can_register ) {
        return '0';
    });
    // Роль нового пользователя
    add_filter( 'pre_option_default_role', function( $default_role ) {
        return 'subscriber';
    });
    // Часовой пояс
    add_filter( 'pre_option_gmt_offset', function( $gmt_offset ) {
        return '10';
    });
    // Формат даты
    add_filter( 'pre_option_date_format', function( $date_format ) {
        return 'd.m.Y';
    });
    // Формат времени
    add_filter( 'pre_option_time_format', function( $time_format ) {
        return 'H:i';
    });
    // Первый день недели
    add_filter( 'pre_option_start_of_week', function( $start_of_week ) {
        return '1';
    });

    /* Настройки публикации */
    // Основная рубрика
    add_filter( 'pre_option_default_category', function( $default_category ) {
        return '1';
    });
    // Основной формат записей
    add_filter( 'pre_option_default_post_format', function( $default_post_format ) {
        return '0';
    });
    // Рубрика по умолчанию для публикации по почте
    add_filter( 'pre_option_default_email_category', function( $default_email_category ) {
        return '1';
    });
    // Сервисы обновления
    add_filter( 'pre_option_ping_sites', function( $ping_sites ) {
        return '';
    });

    /* Настройки чтения */
    // На главной странице отображать
    add_filter( 'pre_option_show_on_front', function( $show_on_front ) {
        return 'page';
    });
    // На главной странице отображать - Главная страница
    add_filter( 'pre_option_page_on_front', function( $page_on_front ) {
        return get_page_id( 'main' );
    });
    // На страницах блога отображать не более
    add_filter( 'pre_option_posts_per_page', function( $posts_per_page ) {
        return '15';
    });
    // В RSS-лентах отображать последние
    add_filter( 'pre_option_posts_per_rss', function( $posts_per_rss ) {
        return '15';
    });
    // Для каждой статьи в RSS-ленте отображать
    add_filter( 'pre_option_rss_use_excerpt', function( $rss_use_excerpt ) {
        return '0'; // Полный текст
    });
    // Видимость для поисковых систем
    add_filter( 'pre_option_blog_public', function( $blog_public ) {
        return '1';
    });

    /* Настройки обсуждения */
    // Пытаться оповестить блоги, упоминаемые в статье
    add_filter( 'pre_option_default_pingback_flag', function( $default_pingback_flag ) {
        return '0';
    });
    // Разрешить оповещения с других блогов (уведомления и обратные ссылки) на новые статьи
    add_filter( 'pre_option_default_ping_status', function( $default_ping_status ) {
        return 'closed'; // open
    });
    // Разрешить оставлять комментарии на новые статьи
    add_filter( 'pre_option_default_comment_status', function( $default_comment_status ) {
        return 'closed'; // open
    });
    // Автор комментария должен указать имя и e-mail
    add_filter( 'pre_option_require_name_email', function( $require_name_email ) {
        return '0';
    });
    // Пользователи должны быть зарегистрированы и авторизованы для комментирования
    add_filter( 'pre_option_comment_registration', function( $comment_registration ) {
        return '0';
    });
    // Автоматически закрывать обсуждение статей старше
    add_filter( 'pre_option_close_comments_for_old_posts', function( $close_comments_for_old_posts ) {
        return '0';
    });
    // Автоматически закрывать обсуждение статей старше (значение)
    add_filter( 'pre_option_close_comments_days_old', function( $close_comments_days_old ) {
        return '0';
    });
    // Разрешить древовидные (вложенные) комментарии глубиной
    add_filter( 'pre_option_thread_comments', function( $thread_comments ) {
        return '0';
    });
    // Разрешить древовидные (вложенные) комментарии глубиной (значение)
    add_filter( 'pre_option_thread_comments_depth', function( $thread_comments_depth ) {
        return '5';
    });
    // Разбивать комментарии верхнего уровня на страницы
    add_filter( 'pre_option_default_page_comments', function( $page_comments ) {
        return '0';
    });
    // Разбивать комментарии верхнего уровня на страницы по (значение) штук
    add_filter( 'pre_option_comments_per_page', function( $comments_per_page ) {
        return '30';
    });
    // Разбивать комментарии верхнего уровня на страницы - по умолчанию отображается страница (значение)
    add_filter( 'pre_option_default_comments_page', function( $default_comments_page ) {
        return 'newest';
    });
    // Сверху каждой страницы должны располагаться (значение) комментарии
    add_filter( 'pre_option_comment_order', function( $comment_order ) {
        return 'asc';
    });
    // Отправить мне письмо, когда кто-нибудь оставил комментарий
    add_filter( 'pre_option_comments_notify', function( $comments_notify ) {
        return '0';
    });
    // Отправить мне письмо, когда комментарий ожидает проверки
    add_filter( 'pre_option_moderation_notify', function( $moderation_notify ) {
        return '0';
    });
    // Комментарий должен быть одобрен вручную
    add_filter( 'pre_option_comment_moderation', function( $comment_moderation ) {
        return '0';
    });
    // Автор должен иметь ранее одобренные комментарии
    add_filter( 'pre_option_comment_whitelist', function( $comment_whitelist ) {
        return '0';
    });
    // Поставить комментарий в очередь на модерацию, если он содержит более (значение) ссылок
    add_filter( 'pre_option_comment_max_links', function( $comment_max_links ) {
        return '1';
    });
    // Если комментарий содержит какие-либо из этих слов в своём тексте, имени автора, URL, адресе e-mail или IP — поместить его в очередь на модерацию.
    add_filter( 'pre_option_moderation_keys', function( $moderation_keys ) {
        return '';
    });
    // Если комментарий содержит какие-либо из этих слов в своём тексте, имени автора, URL, адресе e-mail или IP — он будет помечен как спам.
    add_filter( 'pre_option_blacklist_keys', function( $blacklist_keys ) {
        return '';
    });
    // Показывать аватары
    add_filter( 'pre_option_show_avatars', function( $show_avatars ) {
        return '0';
    });

    /* Настройки медиафайлов */
    // Размер миниатюры (ширина)
    add_filter( 'pre_option_thumbnail_size_w', function( $thumbnail_size_w ) {
        return '200';
    });
    // Размер миниатюры (высота)
    add_filter( 'pre_option_thumbnail_size_h', function( $thumbnail_size_h ) {
        return '200';
    });
    // Обрезать миниатюру точно по размерам (обычно сохраняются пропорции миниатюр)
    add_filter( 'pre_option_thumbnail_crop', function( $thumbnail_crop ) {
        return '0';
    });
    // Средний размер (Макс. ширина)
    add_filter( 'pre_option_medium_size_w', function( $medium_size_w ) {
        return '300';
    });
    // Средний размер (Макс. высота)
    add_filter( 'pre_option_medium_size_h', function( $medium_size_h ) {
        return '300';
    });
    // Крупный размер (Макс. ширина)
    add_filter( 'pre_option_large_size_w', function( $large_size_w ) {
        return '1024';
    });
    // Крупный размер (Макс. высота)
    add_filter( 'pre_option_large_size_h', function( $large_size_h ) {
        return '1024';
    });
    // Сохранять файлы в этой папке
//     add_filter( 'pre_option_upload_path', function( $upload_path ) {
//         return 'wp-content/themes/spart.pro/uploads';
//     });
    // Полный URL-путь к файлам
    add_filter( 'pre_option_upload_url_path', function( $upload_url_path ) {
       return 'https://spart.pro/images';
    });
    // Помещать загруженные мной файлы в папки по месяцу и году
    add_filter( 'pre_option_uploads_use_yearmonth_folders', function( $uploads_use_yearmonth_folders ) {
        return '0'; // Нет
    });

    /* Настройки постоянных ссылок */
    // Настройки постоянных ссылок
    //add_filter( 'pre_option_permalink_structure', function( $permalink_structure ) {
    //    return '/%category%/%postname%.html';
    //});
    // Префикс для рубрик
    add_filter( 'pre_option_category_base', function( $category_base ) {
        return '';
    });
    // Префикс для меток
    add_filter( 'pre_option_tag_base', function( $tag_base ) {
        return '';
    });

    /* Скрытые */
    // Использовать смайлы (?)
    add_filter( 'pre_option_use_smilies', function( $use_smilies ) {
        return '0'; // Нет
    });
    // Использовать Trackback (?)
    add_filter( 'pre_option_use_trackback', function( $use_trackback ) {
        return '0'; // Нет
    });

  flush_rewrite_rules();
  }
  add_action( 'after_setup_theme', 'spart_set_options' );
endif;
