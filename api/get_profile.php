<?php

include_once __DIR__ . '/../api_config.php';
include_once __DIR__ . '/../lib_db.php';

$address = $_POST['address'];

if (!$address){
	$address = "0x940717069cb45a62e167c4ea5a7C4DE407728ae3";
}

$ret = run_query('SELECT * FROM users WHERE address = "' . $address . '"');

$out = ['ok' => true];

if (count($ret['rows'])){
	$ret['rows'][0]['nfts'] = json_decode(stripslashes($ret['rows'][0]['nfts']), true);
	$out['profile'] = $ret['rows'][0];
}

header("content-type: application/json");
echo json_encode($out);