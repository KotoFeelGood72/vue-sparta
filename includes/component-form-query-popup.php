<?php

defined( 'ABSPATH' ) || exit;
?>

<form id="form-callme">
	<div class="form-order-fields">
		<div class="row column">
            <label>
                Мы перезвоним на указанный вами номер
                <input required name="contacts" type="text" placeholder = "+7 (ххх) ххх-хх-хх"/>
            </label>
		</div>
	</div>
	<div class="form-order-controls">
		<div class="row column">
            <button type="submit" class="button">Заказать звонок</button>
		</div>
	</div>
</form>

<script>
    jQuery(function ($) {
        const $form = $('#form-callme');

        $form.submit(function () {
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php") ?>',
                type: 'POST',
                data: 'action=send-form-callme&' + $form.serialize(),
                beforeSend: function () {
                    $('button[type=submit]', $form).text('Отправка запроса...');
                },
                success: function () {
                    $("input", $form).prop( "disabled", true );
                    $("textarea", $form).prop( "disabled", true );
                    $("button[type=submit]", $form).html("Скоро мы с вами свяжемся!").prop( "disabled", true );
                    //$.modal.close();
                },
                error: function () {
                    alert( "Возникла ошибка при отправке запроса. Попробуйте еще раз." );
                    $('button[type=submit]', $form).text('Заказать звонок');
                }
            })
            return false;
        });
    });
</script>