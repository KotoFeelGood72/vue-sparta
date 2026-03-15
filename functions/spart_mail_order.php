<?php

$to = 'admin@spart.pro';
$subject = 'Сайт: ЗАПРОС НАЛИЧИЯ';

$message = $_POST['name'] . '<h1 class="header">Запрос цены</h1>';
$message .= '<br/><p class="footer" style="color: gray;">Данный запрос был сформирован на сайте <a href="http://spart.pro" target="_blank" title="Перейти на сайт">spart.pro</a>.</p>';

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
$headers .= 'From: admin@spart.pro<admin@spart.pro>' . "\r\n";

mail( $to, $subject, $message, $headers);

//$headers  = 'MIME-Version: 1.0' . "\r\n";
//$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
//$headers .= 'From: admin@spart.pro<admin@spart.pro>' . "\r\n";
//
//mail(
//	'admin@spart.pro',
//	'Какая-то тема',
//	'Какое-то сообщение',
//	$headers
//);

// defined( 'ABSPATH' ) || exit;

// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
// Also strips any <html> tags it may encouter
// Use: Anything that shouldn't contain html (pretty much everything that is not a textarea)
function stripcleantohtml($s){
	return htmlentities(trim(strip_tags(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
// It preserves any <html> tags in that they are encoded aswell (like &lt;html&gt;)
// As an extra security, if people would try to inject tags that would become tags after stripping away bad characters,
// we do still strip tags but only after htmlentities, so any genuine code examples will stay
// Use: For input fields that may contain html, like a textarea
function cleantohtml($s){
	return strip_tags(htmlentities(trim(stripslashes($s))), ENT_NOQUOTES, "UTF-8");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	// if($_POST['sp'] != 'yes'){
	// 	exit;
	// }

	// include '../crm/order.php';

	if (isset($_POST['message']) && $_POST['message'] != '') exit;
	if (isset($_POST['comment']) && $_POST['comment'] != '') exit;
	if (isset($_POST['name']) && $_POST['name'] != '') exit;
	if (isset($_POST['email']) && $_POST['email'] != '') exit;

	if (isset($_POST['customer'])) 			$customer = stripcleantohtml( $_POST['customer'] );
	if (isset($_POST['contacts'])) 			$contacts = stripcleantohtml( $_POST['contacts'] );
	if (isset($_POST['additional'])) 		$additional = stripcleantohtml( $_POST['additional'] );

	if (isset($_POST['spareparts-brand']))	$partbrand = stripcleantohtml( $_POST['spareparts-brand'] );
	if (isset($_POST['spareparts-sku']))	$partsku = stripcleantohtml( $_POST['spareparts-sku'] );
	if (isset($_POST['spareparts-name']))	$partname = stripcleantohtml( $_POST['spareparts-name'] );
	if (isset($_POST['spareparts-model']))	$partmodel = stripcleantohtml( $_POST['spareparts-model'] );

	//$to = 'info@spart.pro';
	$to = 'admin@spart.pro';
	$subject = 'Сайт: ЗАПРОС НАЛИЧИЯ';
	$message = '<h1 class="header">Запрос цены</h1>';

	if( $customer != '' )	$message .= '<p class="customer">Имя: <strong>' . $customer . '</strong></p>';
	if( $contacts != '' ) 	$message .= '<p class="contacts">Контакты: <strong>' . $contacts . '</strong></p><br/>';
	if( $additional != '' ) $message .= '<p class="additional">Дополнительные пожелания: <strong>' . $additional . '</strong></p>';

	if( $partbrand != '' ) 	$message .= '<p class="partbrand">Бренд: <strong>' . $partbrand . '</strong></p>';
	if( $partsku != '' ) 	$message .= '<p class="partsku">Оригинальный номер запчасти: <strong>' . $partsku . '</strong></p>';
	if( $partname != '' ) 	$message .= '<p class="partname">Оригинальное наименование запчасти: <strong>' . $partname . '</strong></p>';
	if( $partmodel != '' ) 	$message .= '<p class="partmodel">Совместимые модели техники: <strong>' . $partmodel . '</strong></p>';

	$message .= '<br/><p class="footer" style="color: gray;">Данный запрос был сформирован на сайте <a href="http://spart.pro" target="_blank" title="Перейти на сайт">spart.pro</a>.</p>';

	//$headers = 	'Content-type: text/html; charset=UTF-8' . "\r\n";
	//$headers .= 'From: admin@spart.pro<admin@spart.pro>' . "\r\n";
	//$headers .= 'Reply-To: SPART.PRO <admin@spart.pro>' . "\r\n";
	//$headers .= 'BCC: <mochalkin@spart.pro>, <san_yam9@mail.ru>, <petya.bezzvuka@gmail.com>' . "\r\n";

	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	$headers .= 'From: admin@spart.pro<admin@spart.pro>' . "\r\n";

	wp_mail( $to, $subject, $message, $headers );
	// mail( $to, $subject, $message, $headers);
}
?>