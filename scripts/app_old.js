//$(document).foundation();

$(document).ready( function() {
	
	$('#sp').val('yes');
	$('#spt').val('yes');

	$("#form-order").submit( function() {
        var url = $(this).attr('action');
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);
		$.ajax({
		type: "POST",
		dataType: "html",
		url: url,
		data: formNm.serialize(),
		beforeSend: function () {
			$("button[type=submit]", formNm).html("<span>Оправка запроса...</span>");
		},
		success: function () {
			$("input", formNm).prop( "disabled", true );
			$("textarea", formNm).prop( "disabled", true );
			$("button[type=submit]", formNm).html("Запрос принят").prop( "disabled", true );
		},
		error: function () {
			alert( "Возникла ошибка при отправке запроса. Попробуйте еще раз." );
			$("button[type=submit]", formNm).html("<span>Запросить цену</span>");
		}
		});
		return false;
	});

	$("#form-query").submit( function() {
		var url = $(this).attr('action');
        var formID = $(this).attr('id');
        var formNm = $('#' + formID);

		$.ajax({
		type: "POST",
		dataType: "html",
		url: url,
		data: formNm.serialize(),
		beforeSend: function () {
			$("button[type=submit]", formNm).html("<span>Оправка заказа...</span>");
		},
		success: function () {
			$("input", formNm).prop( "disabled", true );
			$("textarea", formNm).prop( "disabled", true );
			$("button[type=submit]", formNm).html("Заказ принят").prop( "disabled", true );
			//$.modal.close();
		},
		error: function () {
			alert( "Возникла ошибка при отправке запроса. Попробуйте еще раз." );
			$("button[type=submit]", formNm).html("<span>Заказать спецзапчасти</span>");
		}
		});
		return false;
	});

	$("#form-feedback").submit( function() {
		var url = $(this).attr('action');
		var formID = $(this).attr('id');
		var formNm = $('#' + formID);
		$.ajax({
			type: "POST",
			dataType: "html",
			url: url,
			data: formNm.serialize(),
			beforeSend: function () {
				$("button[type=submit]", formNm).html("<span>Оправка сообщения...</span>");
			},
			success: function () {
				$("input", formNm).prop( "disabled", true );
				$("textarea", formNm).prop( "disabled", true );
				$("button[type=submit]", formNm).html("Сообщение отправлено").prop( "disabled", true );
			},
			error: function () {
				alert( "Возникла ошибка при отправке сообщения. Попробуйте еще раз." );
				$("button[type=submit]", formNm).html("<span>Отправить сообщение</span>");
			}
			});
		return false;
	});

	$("#navigation .menu").on("click", function() {
		$("#navigation .primary-menu").toggleClass('active');
	})

	$("#popup").on("click", function() {
		$('#popup-window').modal({
		  fadeDuration: 250,
		  showClose: false
		});
	});
	$("#popup-close").on("click", function() {
		$.modal.close();
	});

});

function load_yandex_map() {
	ymaps.ready(init);
	var placeMarkerImg = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzNyIgaGVpZ2h0PSI0NyIgdmlld0JveD0iMCAwIDM3IDQ3Ij4KICA8ZGVmcz4KICAgIDxzdHlsZT4KICAgICAgLmNscy0xIHsKICAgICAgICBmaWxsOiAjMWIxYjFiOwogICAgICB9CgogICAgICAuY2xzLTEsIC5jbHMtMiB7CiAgICAgICAgZmlsbC1ydWxlOiBldmVub2RkOwogICAgICB9CgogICAgICAuY2xzLTIgewogICAgICAgIGZpbGw6ICNmYmM0M2U7CiAgICAgIH0KICAgIDwvc3R5bGU+CiAgPC9kZWZzPgogIDxwYXRoIGlkPSJtYXJrZXIiIGNsYXNzPSJjbHMtMSIgZD0iTTI3LjMyOCwzNS42TDE5LDQ3SDE4TDkuNjcyLDM1LjZDNC40NjksMzIuMzc5LDAsMjQuNjk1LDAsMTguMkExOC4zNTIsMTguMzUyLDAsMCwxLDE4LjUsMCwxOC4zNTIsMTguMzUyLDAsMCwxLDM3LDE4LjJDMzcsMjQuNjk1LDMyLjUzMSwzMi4zNzksMjcuMzI4LDM1LjZaIi8+CiAgPHBhdGggaWQ9ImxvZ28iIGNsYXNzPSJjbHMtMiIgZD0iTTMzLjgzNCwxNS44MDVjMC4wMjcsMC40NDEuMTU3LDAuODcyLDAuMTY4LDEuMzQ2YTEuMzcsMS4zNywwLDAsMC0uNiwyLjQ1MywxLjEwOSwxLjEwOSwwLDAsMCwuNi4yNDhjMCwwLjQ3OC0uMTQuOTEtMC4xNjgsMS4zNTVhMS4zNywxLjM3LDAsMCwwLS43MDgsMi42MTIsNi4zLDYuMywwLDAsMS0uNTIzLDEuMjU3LDEuMzc2LDEuMzc2LDAsMCwwLTEuODY4LDEuNDA4LDEuNjUsMS42NSwwLDAsMCwuNTE0LjkzOWwtMC4yMy4zMTlhMy44MzEsMy44MzEsMCwwLDEtLjU5My43NTMsMi41MjQsMi41MjQsMCwwLDAtLjcwOC0wLjI2NiwxLjE0NiwxLjE0NiwwLDAsMC0uNi4xLDEuMzY5LDEuMzY5LDAsMCwwLS42LDIuMDlsLTAuNzYyLjYxMS0wLjMxLjIyMS0wLjAxOC0uMDA5YTEuMzY1LDEuMzY1LDAsMCwwLTIuNDM1LjkyMWMwLjAyNywwLjE2NS4wNzcsMC4zMDgsMC4xLDAuNDUyLTAuMzM2LjEtLjY2MiwwLjI4Mi0xLDAuNDE2YTAuNjgsMC42OCwwLDAsMS0uMjU3LjA4OSwxLjM2NywxLjM2NywwLDAsMC0yLjYxMi43MTdjLTAuNDQyLjAxOC0uODcyLDAuMTU3LTEuMzQ2LDAuMTY4YTEuMzUzLDEuMzUzLDAsMCwwLS44NzctMS4xQTEuMzc0LDEuMzc0LDAsMCwwLDE3LjE2LDM0aC0wLjFsLTEuMjQ4LS4xNjhhMS4zNjgsMS4zNjgsMCwwLDAtMi42MjEtLjdsLTAuOTY1LS4zODEtMC4yOTItLjEzM1YzMi42MTJhMS4zNjYsMS4zNjYsMCwwLDAtMi4zNDctMS4zNTVIOS41OGMtMC4yNDEtLjIxMi0wLjUyNi0wLjQtMC43NzktMC41OTNhMC43MDcsMC43MDcsMCwwLDEtLjI4My0wLjI1NywxLjM3NCwxLjM3NCwwLDAsMCwuMTg2LTEuMywxLjM5MywxLjM5MywwLDAsMC0xLjA4OS0uODY4LDEuMzIxLDEuMzIxLDAsMCwwLS44NzcuMTY4TDYuNiwyOC41MTJsLTAuMDUzLS4wNDQtMC42LS43ODhjLTAuMDY4LS4xLTAuMi0wLjE4OS0wLjEzMy0wLjI5MmExLjM2NCwxLjM2NCwwLDAsMC0xLjQwOC0yLjMsOC4zNTEsOC4zNTEsMCwwLDEtLjUyMi0xLjI1NywxLjM4NSwxLjM4NSwwLDAsMCwuNjM4LTIuMDEsMS40LDEuNCwwLDAsMC0uOTQ3LTAuNjExbC0wLjQtLjAwOUMzLjE1MiwyMC43NiwzLjAyNiwyMC4zMjYsMywxOS44NjFBMS4zNDgsMS4zNDgsMCwwLDAsNC4xNDMsMTguOSwxLjM2OCwxLjM2OCwwLDAsMCwzLDE3LjE1MSw2Ljk2Nyw2Ljk2NywwLDAsMSwzLjE3OCwxNS44YTEuMDU0LDEuMDU0LDAsMCwwLC41LTAuMDI3LDEuMzYsMS4zNiwwLDAsMCwxLjAxOC0xLjY2NSwxLjQyNywxLjQyNywwLDAsMC0uNTU4LTAuOGwtMC4yNTctLjE0MiwwLjI4My0uNzI2LDAuMjMtLjUxNGExLjkwOCwxLjkwOCwwLDAsMCwuNzUzLjA4OSwxLjM3OCwxLjM3OCwwLDAsMCwxLjA3MS0xLjgzMywyLjA1NCwyLjA1NCwwLDAsMC0uNDUyLTAuNjExLDUuNjE3LDUuNjE3LDAsMCwxLC41MzEtMC43MDhMNi41ODcsOC41YTEuOTg3LDEuOTg3LDAsMCwwLC42ODIuMjc1QTEuMzc2LDEuMzc2LDAsMCwwLDguNzQ4LDcuMDU2YTEuNzc5LDEuNzc5LDAsMCwwLS4yMzktMC40NzhBNi4zNTIsNi4zNTIsMCwwLDEsOS41OCw1Ljc1NWExLjcyMiwxLjcyMiwwLDAsMCwuOS41MjJBMS4zNzIsMS4zNzIsMCwwLDAsMTEuOTM1LDQuNGwwLjMxLS4xNDJhNC42LDQuNiwwLDAsMSwuOTQ3LTAuMzgxLDEuMzY5LDEuMzY5LDAsMCwwLDIuNjIxLS43MDhjMC40NDEtLjAxNy44NzctMC4xNDMsMS4zNDYtMC4xNjhBMS4zNzIsMS4zNzIsMCwwLDAsMTksNC4xLDEuMzQ5LDEuMzQ5LDAsMCwwLDE5Ljg2OSwzYzAuNDY1LDAuMDM3LjkxNCwwLjExMSwxLjM0NiwwLjE3N2ExLjM2NSwxLjM2NSwwLDAsMCwuOCwxLjQyNiwxLjM4MSwxLjM4MSwwLDAsMCwxLjgyNC0uNzI2YzAuMzI5LDAuMTM5LjY2NiwwLjI2OSwwLjk4MywwLjQwN2wwLjI2NiwwLjEyNGExLjYxLDEuNjEsMCwwLDAtLjA3MS43ODhBMS4zNzYsMS4zNzYsMCwwLDAsMjYuNjQzLDYuMjZhMS44ODYsMS44ODYsMCwwLDAsLjgtMC41YzAuMzc3LDAuMjU0LjcwOSwwLjU1OCwxLjA3MiwwLjgyNGExLjkzNiwxLjkzNiwwLDAsMC0uMjM5LjVBMS4zNzEsMS4zNzEsMCwwLDAsMjkuNiw4Ljc4M2ExLjMyMSwxLjMyMSwwLDAsMCwuODIzLTAuMjc0bDAuMDI3LDAuMDE4TDMxLjI1Nyw5LjU4LDMxLjI0OCw5LjZhMS4zNjIsMS4zNjIsMCwwLDAsMS4zNjQsMi4zMjksOC40NTIsOC40NTIsMCwwLDEsLjUxNCwxLjI2NkExLjM2NywxLjM2NywwLDAsMCwzMy44MzQsMTUuODA1Wm0tMTUuNi05Ljc5NC0wLjQ0My4wMTgtMC45My4wODlBMTMuOTI3LDEzLjkyNywwLDAsMCwxNC40LDYuN2ExMi43OTIsMTIuNzkyLDAsMCwwLTYuMDMsNC41MDdjLTAuMzQuNDc2LS42MjgsMC45ODgtMC45MywxLjUwNWExMi41MzcsMTIuNTM3LDAsMCwwLS43NjIsMS43OCwxMy41NjQsMTMuNTY0LDAsMCwwLS41NCwyLjNjLTAuMDY0LjMzMi0uMDMzLDAuNjYzLTAuMDg5LDEuMDE4QTQuNTUxLDQuNTUxLDAsMCwwLDYuMDM4LDE5TDYuMSwxOS45MzJhMTcuNjI1LDE3LjYyNSwwLDAsMCwuNDE2LDIuMDM3LDEyLjMsMTIuMywwLDAsMCw3LjE2NCw4LjA0OSwxNC4yMSwxNC4yMSwwLDAsMCwyLjQ4OC43NjJjMC4zNjMsMC4wOC43MjUsMC4wODUsMS4xMTYsMC4xNTFhNy41MjIsNy41MjIsMCwwLDAsMS4yLjA2MkgxOC45NGwwLjk3NC0uMDcxYTE3LjQwNSwxNy40MDUsMCwwLDAsMi4wNjMtLjQwNywxMi40MDksMTIuNDA5LDAsMCwwLDguMDg1LTcuMjI2LDE1LjM3MSwxNS4zNzEsMCwwLDAsLjg1LTMuMjE0TDMxLDE4Ljk4NFYxOC42MTJhNS43NjQsNS43NjQsMCwwLDAtLjA1My0xLjM2NEwzMC44LDE2LjE5NWExNC4zNywxNC4zNywwLDAsMC0uNzA4LTIuMzgyLDEyLjQyMywxMi40MjMsMCwwLDAtOS4zLTcuNkExMi4xMSwxMi4xMSwwLDAsMCwxOC4yMzEsNi4wMTJabTAuMTMzLDEuMjMxYTEwLjk2OSwxMC45NjksMCwwLDEsNi43ODMsMi4xMTZjMC4zMzgsMC4yNDEuNjQ0LDAuNTIxLDAuOTY1LDAuNzc5bDAuNDE2LDAuNC0yLjk3NSwyLjk3NS0wLjE1OS0uMTU5LTAuMjY2LS4yMzktMC42MzgtLjQ4N2E3LjI0Myw3LjI0MywwLDAsMC0yLjEyNS0uOTc0LDcuNjE1LDcuNjE1LDAsMCwwLTMuOTQuMDgsNy4wNTEsNy4wNTEsMCwwLDAtNC42MzEsNC40OSw3LjU5Myw3LjU5MywwLDAsMC0uMzE5LDEuMzlsLTAuMDUzLjdxMC4wMTMsMC4zNjMuMDI3LDAuNzI2YzAuMDQyLDAuMjcyLjAzNSwwLjUxMiwwLjA4OSwwLjc2MkE4LjExNCw4LjExNCwwLDAsMCwxMiwyMS4yODZhNi45Myw2LjkzLDAsMCwwLDQuNDcyLDQsNy4wODUsNy4wODUsMCwwLDAsMy4yMjMuMjEyLDcuNjA5LDcuNjA5LDAsMCwwLDIuOTkzLTEuMjU3YzAuMzE1LS4yMjUuNTY3LTAuNTIyLDAuODY4LTAuNzUzbDIuOTc1LDIuOTc1LTAuNDA3LjM4MWMtMC4zNTcuMjg3LS42ODksMC41ODktMS4wNzEsMC44NTlhMTEuMjg1LDExLjI4NSwwLDAsMS0zLjc3MiwxLjczNmMtMC40MTguMTA3LS44MzYsMC4xNDgtMS4yOTMsMC4yM2E5LjUyMSw5LjUyMSwwLDAsMS0yLjksMCwxNiwxNiwwLDAsMS0xLjg1OS0uNDA3LDExLjE0NSwxMS4xNDUsMCwwLDEtNy4zODUtNy4zNTgsMTcuMDkyLDE3LjA5MiwwLDAsMS0uNDQzLTEuOTY2bC0wLjA3MS0uOTQ4YTMuNDY4LDMuNDY4LDAsMCwxLDAtLjk3NGwwLjA2Mi0uODc3YTE2LjE2OSwxNi4xNjksMCwwLDEsLjQzNC0yLjAxOSwxMS4yMjgsMTEuMjI4LDAsMCwxLDYuNzMtNy4xNDZBMTMuNTg5LDEzLjU4OSwwLDAsMSwxNyw3LjM0OWwwLjg5NC0uMDg5Wk0xOC4zLDEyLjU3M0E1Ljg0Myw1Ljg0MywwLDAsMSwyNCwxNi4yNTdhNi4xMjEsNi4xMjEsMCwwLDEtLjAwOSw0LjU0Myw1Ljg3Niw1Ljg3NiwwLDAsMS0zLjgwOCwzLjQsOS41MzgsOS41MzgsMCwwLDEtMS4zNTUuMjNMMTguMiwyNC40MjEsMTcuNiwyNC4zNjhhNi43NjQsNi43NjQsMCwwLDEtMS4zNzItLjQsNS45NjMsNS45NjMsMCwwLDEtMy41ODYtNi4zNCw2LjgxNiw2LjgxNiwwLDAsMSwuMjkyLTEuMTUxQTUuOTgyLDUuOTgyLDAsMCwxLDE2LjU1OCwxMi45YTYuNTQ0LDYuNTQ0LDAsMCwxLDEuMTQyLS4yNzRabS0wLjA0NC40NzgtMC41NC4wNTNhNi42MzcsNi42MzcsMCwwLDAtMS4xMDcuMjgzLDUuNSw1LjUsMCwwLDAtMy4yMzIsMy4yNjgsNi4xODksNi4xODksMCwwLDAtLjI1NywxLDUuMjQ2LDUuMjQ2LDAsMCwwLC4xNjgsMi4zOTEsNS4zNDcsNS4zNDcsMCwwLDAsMy4xMTcsMy40OCw2Ljc4LDYuNzgsMCwwLDAsMS40LjM5bDAuNTY3LDAuMDM1aDAuNDc4YTkuNzc4LDkuNzc4LDAsMCwwLDEuMjkzLS4yMzksNS4zODYsNS4zODYsMCwwLDAsMy40LTMuMDksNS42MjEsNS42MjEsMCwwLDAtLjAwOS00LjIzM0E1LjM3OCw1LjM3OCwwLDAsMCwxOC4yNTgsMTMuMDUxWm0wLjA4OCwwLjQ3OGE3LjE2Nyw3LjE2NywwLDAsMSwuOC4wNDQsMS4yODQsMS4yODQsMCwwLDAsLjAwOS45NzQsMC43MTksMC43MTksMCwwLDAsLjk2NS4xMDYsMS4zNTgsMS4zNTgsMCwwLDAsLjMtMC43NTMsNi4zNzYsNi4zNzYsMCwwLDEsMS4xMzMuNjU1bC0wLjM3Mi4zNzJhMS4xMjIsMS4xMjIsMCwwLDAtLjEzMy4zMSwwLjY3NywwLjY3NywwLDAsMCwuODA2LjczNSwxLjI4MiwxLjI4MiwwLDAsMCwuNjExLTAuNDc4TDIyLjUsMTUuNTIybDAuMjM5LDAuMzQ1YTUuMzIsNS4zMiwwLDAsMSwuMzkuNzc5bC0wLjI0OC4wNzFhMC44MjMsMC44MjMsMCwwLDAtLjYxMS4zOSwwLjYwOCwwLjYwOCwwLDAsMCwuNDY5LjgzMiwxLjg3OSwxLjg3OSwwLDAsMCwuNy0wLjE0Miw5LjMzOCw5LjMzOCwwLDAsMSwuMDA5LDEuMzI4LDEuMzUsMS4zNSwwLDAsMC0uOTc0LjAwOSwwLjcyLDAuNzIsMCwwLDAtLjEwNi45NjUsMS4zNDIsMS4zNDIsMCwwLDAsLjc1My4zLDQuMDM2LDQuMDM2LDAsMCwxLS42NTUsMS4xMzQsMi4xNDEsMi4xNDEsMCwwLDAtLjU2Ny0wLjQ3OCwwLjY3OSwwLjY3OSwwLDAsMC0uODU5Ljc0NCwxLjY5NCwxLjY5NCwwLDAsMCwuNDg3LjY2NEgyMS41MDhhMy41MjQsMy41MjQsMCwwLDEtMS4xNDIuNjU1bC0wLjAwOS0uMDA5Yy0wLjA1NC0uMzkxLTAuMjE1LTAuOTgtMC43MTctMC44ODZhMC44LDAuOCwwLDAsMC0uMzU0LjEyNCwxLjAwNywxLjAwNywwLDAsMC0uMDYyLDEuMDhsLTAuNDE2LjA0NGE0LjU4Myw0LjU4MywwLDAsMS0uOTIxLTAuMDM1YzAuMTc5LS41NTYuMTg5LTEuMDU5LTAuMzgxLTEuMjEzYTAuNjcyLDAuNjcyLDAsMCwwLS40NjkuMDQ0LDEuMTgsMS4xOCwwLDAsMC0uNDE2LjgzMiw0Ljc0NSw0Ljc0NSwwLDAsMS0xLjEzMy0uNjM3LDEuNzMsMS43MywwLDAsMSwuMzgxLTAuNCwwLjcxLDAuNzEsMCwwLDAsLjEyNC0wLjQ2OSwwLjY3NCwwLjY3NCwwLDAsMC0uODY4LTAuNTQ5LDEuNDUyLDEuNDUyLDAsMCwwLS41NTguNDY5bC0wLjAxOC0uMDA5TDE0LjM3LDIxLjI2YTIuOSwyLjksMCwwLDEtLjQ2OS0wLjkxMiwwLjg3NywwLjg3NywwLDAsMCwuOS0wLjYyOSwwLjYxOCwwLjYxOCwwLDAsMC0uMDYyLTAuMjkyYy0wLjE5Mi0uNDc2LTAuNy0wLjM5LTEuMTUxLTAuMjEyYTcuMjg4LDcuMjg4LDAsMCwxLS4wMDktMS4zMzdoMC4wMzZjMC41MjksMC4xNzIsMS4wMzQuMTM5LDEuMTc4LS4zODFhMC42ODYsMC42ODYsMCwwLDAtLjA0NC0wLjQ3OCwxLjE4NywxLjE4NywwLDAsMC0uODMyLTAuNDE2LDMuNzg5LDMuNzg5LDAsMCwxLC42NDYtMS4xMzNsMC4wNjIsMC4wNjJjMC4xNzYsMC4wODUuMjU1LDAuMzA2LDAuNDQzLDAuMzlBMC42NzcsMC42NzcsMCwwLDAsMTYsMTUuNDA3YTAuNzE4LDAuNzE4LDAsMCwwLS4zLTAuNjY0LDAuMywwLjMsMCwwLDEtLjE1OS0wLjIzLDQuNzIxLDQuNzIxLDAsMCwxLDEuMTMzLS42MmMwLjA1LDAuNTI5LjQyMywxLjIsMS4wNDUsMC43ODhhMC45MTksMC45MTksMCwwLDAsLjA4OC0xLjA4OVYxMy41ODNabS0xLjA2My4yMzlhMC4yODIsMC4yODIsMCwwLDEsLjExNS41NDksMC4yODYsMC4yODYsMCwwLDEtLjI4My0wLjQ2QTAuNDcsMC40NywwLDAsMSwxNy4yODQsMTMuNzY5Wm0yLjM5MSwwYTAuMjgyLDAuMjgyLDAsMCwxLC4xMTUuNTQ5QzE5LjQ0MiwxNC40MTEsMTkuMjgsMTMuOTM3LDE5LjY3NSwxMy43NjlabS00LjQ3MiwxLjJhMC4yODIsMC4yODIsMCwxLDEtLjE3Ny4xMTVBMC40MjQsMC40MjQsMCwwLDEsMTUuMiwxNC45NjRabTYuNTI2LDBhMC4yODEsMC4yODEsMCwxLDEtLjE5NS4xNDJBMC4zOTQsMC4zOTQsMCwwLDEsMjEuNzI5LDE0Ljk2NFpNMTQsMTcuMDM2YTAuMjgxLDAuMjgxLDAsMSwxLC4xMTUuNTQ5QzEzLjc2NCwxNy42NTgsMTMuNjc1LDE3LjIsMTQsMTcuMDM2Wm04LjkwOCwwYTAuMjgxLDAuMjgxLDAsMSwxLS4xODYuMTUxQTAuMzc3LDAuMzc3LDAsMCwxLDIyLjkwNywxNy4wMzZabS04Ljg4MSwyLjM4MmEwLjI4MSwwLjI4MSwwLDAsMSwuMDYyLjU1OCwwLjI4NiwwLjI4NiwwLDAsMS0uMjQ4LTAuNDUyQTAuNDA4LDAuNDA4LDAsMCwxLDE0LjAyNSwxOS40MThabTguOTA4LDBhMC4yODEsMC4yODEsMCwxLDEtLjIuMTQyQTAuNCwwLjQsMCwwLDEsMjIuOTMzLDE5LjQxOFpNMTUuMTk0LDIxLjQ5YTAuMjgxLDAuMjgxLDAsMSwxLS4xODYuMTQyQTAuNCwwLjQsMCwwLDEsMTUuMTk0LDIxLjQ5Wm02LjUyNiwwYTAuMjgsMC4yOCwwLDEsMS0uMTc3LjEyNEEwLjQyMSwwLjQyMSwwLDAsMSwyMS43MiwyMS40OVptLTQuNDYzLDEuMmEwLjI4MSwwLjI4MSwwLDEsMS0uMTc3LjEzM0EwLjQyMiwwLjQyMiwwLDAsMSwxNy4yNTcsMjIuNjg2Wm0yLjM5MSwwYTAuMjgsMC4yOCwwLDAsMSwuMTE1LjU0OUEwLjI4MywwLjI4MywwLDAsMSwxOS40OCwyMi44LDAuNDMzLDAuNDMzLDAsMCwxLDE5LjY0OCwyMi42ODZaIi8+Cjwvc3ZnPgo=';
	var myMap, myPlacemark, myTrafficControl, myZoomControl;

	function init(){
	  myMap = new ymaps.Map("ymap", {
	      center: [43.13773607448914,131.9788915],
	      zoom: 12,
	      controls: []
	  });
	  myZoomControl = new ymaps.control.ZoomControl({
	      options: {
	          size: "small",
	          position: {
	            top: 15,
	            right: 15
	          }
	      }
	  });
	  myMap.controls.add(myZoomControl);

	  myPlacemark = new ymaps.Placemark([43.13773607448914,131.9788915], {
	      hintContent: 'Мы находимся здесь!',
	      balloonContentHeader: 'Компания «Спарт»',
	      balloonContentBody: 'г. Владивосток, ул. Снеговая, д.64, литер 1'
	    }, {
	      iconLayout: 'default#image',
	      iconImageHref: placeMarkerImg,
	      iconImageSize: [37, 47],
	      iconImageOffset: [-20, -50]
	    }); 
	  myMap.geoObjects.add(myPlacemark);
	}
};

