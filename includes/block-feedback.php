<?php

defined( 'ABSPATH' ) || exit;
?>

<section class="content-box feedback">
	<h2 class="title"><i class="fa fa-comments"></i>Обратная связь</h2>
	<div class="box white">
		<div class="figure">
			<form id="form-feedback">
				<div class="form-feedback-fields-user">
					<div class="row column">
                        <label>
                            Ваше сообщение
                            <textarea required type="text" name="additional" rows="5" placeholder="Что Вы хотели спросить?"></textarea>
                        </label>
                        <label>
                            Ваше имя
                            <input required type="text" name="customer" placeholder="Иванов Иван Иванович"/>
                        </label>
                        <label>
                            Ваш номер телефона
                            <input required type="tel" name="contacts" type="text" placeholder="+7 (ххх) ххх-хх-хх"/>
                        </label>
					</div>
				</div>
				<div class="form-feedback-controls">
					<div class="row column">
                        <button type="submit" class="button">Отправить сообщение</button>
					</div>
				</div>
			</form>

		</div>
	</div>
</section>

<script>
    jQuery(function ($) {
        const $form = $('#form-feedback');

        $form.submit(function () {
            $.ajax({
                url: '<?php echo admin_url("admin-ajax.php") ?>',
                type: 'POST',
                data: 'action=send-form-feedback&' + $form.serialize(),
                beforeSend: function () {
                    $form.find('button[type=submit]').text('Отправка сообщения...');
                },
                success: function () {
                    $("input", $form).prop( "disabled", true );
                    $("textarea", $form).prop( "disabled", true );
                    $("button[type=submit]", $form).html("Сообщение отправлено").prop( "disabled", true );
                    //$.modal.close();
                },
                error: function () {
                    alert( "Возникла ошибка при отправке сообщения. Попробуйте еще раз." );
                    $('button[type=submit]', $form).text('Отправить сообщение');
                }
            })
            return false;
        });
    });
</script>