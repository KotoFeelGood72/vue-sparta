<?php

require_once __DIR__ . '/autoloader.php';

try {
    $amo = new \AmoCRM\Client('ivanovivanov19', 'ivanovivanov-19@mail.ru', 'e31b2ee05c7276c9dcc33b425c97b9cf393f47b0');
	
	echo '<pre>';
	print_r($amo->account->apiCurrent());

} catch (\AmoCRM\Exception $e) {
    printf('Error (%d): %s' . PHP_EOL, $e->getCode(), $e->getMessage());
}

?>