<?php
global $cf_engines_cost;
global $cf_engines_state;
global $cf_engines_brand;
global $cf_engines_name;
global $cf_engines_model;

defined('ABSPATH') || exit;
?>

<form id="form-order-engines">
    <input type="hidden" name="product_url" value="<?php echo get_permalink() ?>"/>
    <div class="box white">
        <div class="form-order-fields">
            <div class="row">
                <?php if (has_post_thumbnail()) : ?>
                    <div class="small-12 medium-12 large-6 columns">
                        <?php the_post_thumbnail('', array(
                                'class' => 'cf_engines_thumbnail',
                                'alt' => '<?php echo $cf_engines_brand; ?> <?php echo $cf_engines_name; ?> <?php echo $cf_engines_model; ?>',
                                'title' => '<?php echo $cf_engines_brand; ?> <?php echo $cf_engines_name; ?> <?php echo $cf_engines_model; ?>',
                        )); ?>
                    </div>
                <?php else: ?>
                    <div class="small-12 medium-12 large-6 columns">
                        <img class="cf_engines_thumbnail wp-post-image"
                             src="<?php echo get_site_url( null, "/wp-content/themes/spart.pro/uploads/brands_nobrand.png"); ?>"
                             alt="<?php echo $cf_engines_brand; ?> <?php echo $cf_engines_name; ?> <?php echo $cf_engines_model; ?>"
                             title="<?php echo $cf_engines_brand; ?> <?php echo $cf_engines_name; ?> <?php echo $cf_engines_model; ?>"
                        >
                    </div>
                <?php endif; ?>
                <div class="small-12 medium-12 large-6 columns">
                    <div class="additionals">
                        <div class="line">
                            <p class="title"><b>Цена:</b></p>
                            <?php if ($cf_engines_cost <= 0) : ?>
                                <span class="price">По запросу</span>
                            <?php else : ?>
                                <span class="price"><?php echo $cf_engines_cost ?> руб.</span>
                            <?php endif; ?>
                        </div>
                        <div class="line">
                            <p class="title"><b>Срок поставки:</b></p>
                            <span><?php echo $cf_engines_state; ?></span>
                        </div>
                    </div>
                    <label>
                        Производитель двигателя
                        <input readonly type="text" name="brand" value="<?php echo $cf_engines_brand; ?>"/>
                    </label>
                    <label>
                        Оригинальное наименование
                        <input readonly type="text" name="name" value="<?php echo $cf_engines_name; ?>"/>
                    </label>
                    <label>
                        Модель двигателя
                        <input readonly type="text" name="model" value="<?php echo $cf_engines_model; ?>"/>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="box white">
        <div class="form-order-fields-user">
            <div class="row columns">
                <label>
                    Ваше имя
                    <input required type="text" name="customer" placeholder="Иванов Иван Иванович"/>
                </label>
                <label>
                    Ваш номер телефона
                    <input id="mtel-order" required name="contacts" placeholder="+7 (ххх) ххх-хх-хх"
                           type="text"/>
                </label>
                <label>
                    Комментарий к заказу (не обязательно)
                    <textarea type="text" name="additional" rows="4" placeholder="..."></textarea>
                </label>
            </div>
        </div>
        <div class="form-order-controls">
            <div class="row columns">
                <button type="submit" class="button">Связаться с менеджером</button>
                <div class="request-state"></div>
            </div>
        </div>
        <br>
        <div class="notice">
            <span><i class="fa fa-low-vision"></i></span>
            <span>Введённые вами контактные данные НЕ БУДУТ использоваться для рассылки нежелательной корреспонденции.</span>
        </div>
    </div>
</form>

<script>
    jQuery(function ($) {
        const $form = $('#form-order-engines');

        $form.submit(function () {
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php") ?>',
                type: 'POST',
                data: 'action=send-form-order-engines&' + $form.serialize(),
                beforeSend: function () {
                    $form.find('button[type=submit]').text('Отправка запроса...');
                },
                success: function () {
                    $("input", $form).prop( "disabled", true );
                    $("textarea", $form).prop( "disabled", true );
                    $("button[type=submit]", $form).html("Заказ принят, скоро мы с вами свяжемся!").prop( "disabled", true );
                    //$.modal.close();
                },
                error: function () {
                    alert( "Возникла ошибка при отправке запроса. Попробуйте еще раз." );
                    $('button[type=submit]', $form).text('Связаться с менеджером');
                }
            })
            return false;
        });
    });
</script>
