<?php

include_once __DIR__ . '/lib_http.php';

$keyv2 = 'rjNloJaK3YDMloVCAE6hZMK1ZCNfPlm3omfXObD4ylOQp1PTyyf64BVwc7FDQjXg';

$host = 'https://deep-index.moralis.io/api/v2';

$address = '0x62cAfAd11d1a34632A4DC9f2B81A23dd0a39BE0B';

$addresses = [
	'0x67AC6F6b7aFf56683620a8378a6fbEb04AEcF1d6' => 'BulletTime',
	'0x0D76521CaA19119d3E4461389CA708Faf6A297F8' => 'Maximus',
	'0x49Ac01958BCEb1CDFF62c3e9f9f76D17fB2294b4' => 'MooVault',
	'0x1064aA646A7Aedbd40816Fc0C35E044D0244a764' => 'RightClickDave',
	'0x7CadB3F4D989DE491e248629701f6E3a9EC04a21' => 'Steptoe_123',
	'0xBeAF72cF7e48dEdF2bB7854104F977696cC57E79' => 'SpTheVault',
	'0x06C3eD81d1e4aC111f7F9D3d32BCf3CBf098627e' => 'sprinkles',
	'0x6c7e534F8c4dffB7Ea52fc3d4Aa7a16B4a575fe0' => 'hw5',
	'0x62cAfAd11d1a34632A4DC9f2B81A23dd0a39BE0B' => 'Jiggles-Space'
];

$url = $host . '/' . $address . '/nft';

// print_r($url);

$ret = http_call($url, 'GET', [], [
	'X-API-Key: ' . $keyv2
]);

// print_r($ret);

$valid = [
	'0xbc4ca0eda7647a8ab7c2061c2e118a18a936f13d',
	'0x60e4d786628fea6478f785a6d7e704777c86a7c6',
	'0xbd3531da5cf5857e7cfaa92426877b022e612cf8',
	'0x1a92f7381b9f03921564a437210bb9396471050c',
	'0xed5af388653567af2f388e6224dc7c4b3241c544',
	'0xbce3781ae7ca1a5e050bd9c4c77369867ebc307e',
	'0x7bd29408f11d2bfc23c34f18275bbf23bb716bc7',
	'0x8a90cab2b38dba80c64b7734e58ee1db38b8992e',
	'0x79fcdef22feed20eddacbb2587640e45491b757f'
];

$out = [];

function get_rand_distance_delta(){
	$rand = rand(-5000, 5000);

	return $rand / 100000 ;
}

function get_rand_desc($nfts){
	$rand = 0;

	$index = 0;

	while ($nfts[$rand]['name'] == 'mfer' || $nfts[$rand]['name'] == "MutantApeYachtClub"){
		$rand = rand(0, count($nfts) - 1);
		$index++;

		if ($index > 10) break;
	}

	return 'I am a ' . $nfts[$rand]['name'] . ' collector';
}

foreach ($addresses as $address => $name){
	$temp = [
		'name' => $name,
		'address' => $address,
		'nfts' => []
	];

	$url = $host . '/' . $address . '/nft';

	$ret = http_call($url, 'GET', [], [
		'X-API-Key: ' . $keyv2
	]);

	foreach ($ret['data']['result'] as $nft){
		if (in_array($nft['token_address'], $valid)){
			$meta = json_decode($nft['metadata'], true);
			$temp['nfts'][] = [
				'name' => $nft['name'],
				'id' => $nft['token_id'],
				'image' => $meta['image']
			];
		}
	}

	$temp['latitude'] = 19.42963946807481 + get_rand_distance_delta();
	$temp['longitude'] = -99.15292322117381 + get_rand_distance_delta();
	$temp['last_ts'] = time();
	$temp['desc'] = get_rand_desc($temp['nfts']);

	$out[] = $temp;
}

print_r(json_encode($out));

	

// print_r($out);