<?php

require_once __DIR__ . '/autoloader.php';

try {
    $amo = new \AmoCRM\Client('mochalkin', 'mochalkin@spart.pro', '4847f3a5392e113e0fe584431b2e0501f1982a15');
	
	if($_POST['sp'] != 'yes'){
		exit;
	}
	
	$brand 	= $_POST['spareparts-brand'];
	$sku 	= $_POST['spareparts-sku'];
	$sname 	= $_POST['spareparts-name'];
	$model 	= $_POST['spareparts-model'];
	
	$zakaz 	= $_POST['additional'];
	$name 	= $_POST['customer'];
	$phone 	= $_POST['contacts'];
	$phone = preg_replace('~[^0-9]+~','',$phone);
	
	$prim = 'Бренд производителя: '.$brand.'
	Оригинальный номер запчасти: '.$sku.'
	Оригинальное наименование запчасти : '.$sname.'
	Совместимые модели техники: '.$model.'
	Комментарии: '.$zakaz;

	
	$result_contact = $amo->contact->apiList([
        'query' => $phone,
    ]);
	
	if($result_contact){
		$contactId = $result_contact[0]['id'];
	} else {
		$contact = $amo->contact;
		$contact['name'] = $name;
		$contact['responsible_user_id'] = 3290140;
		$contact->addCustomField(446555, [
			[$phone, 'WORK'],
		]);
		$contactId = $contact->apiAdd();
	}
	
	$lead = $amo->lead;
	$lead['name'] = 'Заявка с сайта - "Спецзапчасти"';
	$lead['status_id'] = 25702474;
	$lead['responsible_user_id'] = 3290140;
	$lead['tags'] = ['www.spart.pro'];
	$leadId = $lead->apiAdd();
	
	$note = $amo->note;
	$note['element_id'] = $leadId;
	$note['element_type'] = \AmoCRM\Models\Note::TYPE_LEAD;
    $note['note_type'] = \AmoCRM\Models\Note::COMMON;
    $note['text'] = $prim;

    $noteId = $note->apiAdd();
	
	$link = $amo->links;
    $link['from'] = 'leads';
    $link['from_id'] = $leadId;
    $link['to'] = 'contacts';
    $link['to_id'] = $contactId;
	$linkId =$link->apiLink();

} catch (\AmoCRM\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}

?>