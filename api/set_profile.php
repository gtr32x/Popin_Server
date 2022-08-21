<?php

include_once __DIR__ . '/../api_config.php';
include_once __DIR__ . '/../lib_db.php';
include_once __DIR__ . '/../lib_http.php';
include_once __DIR__ . '/../lib_graph.php';

$name = $_POST['name'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$desc = $_POST['desc'];
$address = $_POST['address'];

error_log(print_r($_POST, 1));

function get_nfts($address){
	$nfts = graph_fetch_nfts($address)
	$key = 'rjNloJaK3YDMloVCAE6hZMK1ZCNfPlm3omfXObD4ylOQp1PTyyf64BVwc7FDQjXg';
	$host = 'https://deep-index.moralis.io/api/v2';

	$url = $host . '/' . $address . '/nft';

	if ($address == '0x940717069cb45a62e167c4ea5a7c4de407728ae3'){
		$url = $host . '/' . "0xb4A1162a1603d70916e0c7355F3242c6d1ADeF74" . '/nft';
	}

	// error_log($url);

	$ret = http_call($url, 'GET', [], [
		'X-API-Key: ' . $key
	]);

	$out = [];

	// error_log(print_r($ret, 1));

	if ($ret['ok']){
		if (count($ret['data'])){
			foreach ($ret['data']['result'] as $res){
				if ($res['token_address'] == '0x1cfa04e6811e81e846a7fd971fbdbb2004bc29b0'){
					$json = json_decode($res['metadata'], true);

					$out[] = [
						'name' => $res['name'],
						'id' => $res['token_id'],
						'image' => stripslashes($json['image'])
					];
				}
			}
		}
	}

	return $out;
}

$nfts = get_nfts($address);

$sql = 'INSERT INTO users VALUES (NULL, "' . $name . '", "' . $desc . '", "' . $address . '", "' . addslashes(json_encode($nfts)) . '", ' . $latitude . ', ' . $longitude . ', ' . time() . ')';

error_log($sql);

$ret = run_query($sql);

error_log(print_r($ret, 1));

header("content-type: application/json");
echo json_encode(['ok' => $ret['ok']]);