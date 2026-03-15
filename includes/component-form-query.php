<?php

defined('ABSPATH') || exit;
?>

<form id="form-query">
    <div class="form-order-fields">
        <div class="row columns">
            <label>
                Ваш запрос
                <textarea required type="text" name="additional" rows="4"
                          placeholder="Перечислите в свободной форме необходимые Вам спецзапчасти."><?php echo $_GET['s']; ?></textarea>
            </label>
            <label>
                Ваше имя
                <input required type="text" name="customer" placeholder="Иванов Иван Иванович"/>
            </label>
            <label>
                Ваш номер телефона
                <input id="mtel-query" required name="contacts" placeholder="+7 (ххх) ххх-хх-хх" type="text"/>
            </label>
        </div>
    </div>
    <div class="form-order-controls">
        <div class="row columns">
            <button type="submit" class="button">Связаться с менеджером</button>
        </div>
    </div>
</form>

<script>
    jQuery(function ($) {
        const $form = $('#form-query');

        $form.submit(function () {
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php") ?>',
                type: 'POST',
                data: 'action=send-form-query&' + $form.serialize(),
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