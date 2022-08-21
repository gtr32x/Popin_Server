<?php

include_once __DIR__ . '/api_config.php';
include_once __DIR__ . '/lib_db.php';

$data = '[{"name":"BulletTime","address":"0x67AC6F6b7aFf56683620a8378a6fbEb04AEcF1d6","nfts":[{"name":"BoredApeYachtClub","id":"9100","image":"ipfs:\/\/QmQoXi61Gyfhx3N6C6K8ukze8VHmoeAgVooRhzSa5fj11n"},{"name":"BoredApeYachtClub","id":"8432","image":"ipfs:\/\/QmS7pHRs8fxbHAhWbiQNq9vyVyF2fF73HuwFWGHX31f1EZ"}],"latitude":19.418069468074812,"longitude":-99.12374322117381,"last_ts":1660991592,"desc":"I am a BoredApeYachtClub collector"},{"name":"Maximus","address":"0x0D76521CaA19119d3E4461389CA708Faf6A297F8","nfts":[{"name":"MutantApeYachtClub","id":"5893","image":"ipfs:\/\/QmYENKXQwPjTqmGdSEN2jKc2cijZzMDN6BZfdhu1oxKjHX"},{"name":"MutantApeYachtClub","id":"1066","image":"ipfs:\/\/QmQP5PbAMv7dFJaotB32JYXABfaGgBffH4svwtDzXA1BuR"}],"latitude":19.41263946807481,"longitude":-99.19945322117381,"last_ts":1660991592,"desc":"I am a MutantApeYachtClub collector"},{"name":"MooVault","address":"0x49Ac01958BCEb1CDFF62c3e9f9f76D17fB2294b4","nfts":[{"name":"PudgyPenguins","id":"3958","image":"https:\/\/ipfs.io\/ipfs\/QmNf1UsmdGaMbpatQ6toXSkzDpizaGmC9zfunCyoz1enD5\/penguin\/3958.png"},{"name":"PudgyPenguins","id":"7866","image":"https:\/\/ipfs.io\/ipfs\/QmNf1UsmdGaMbpatQ6toXSkzDpizaGmC9zfunCyoz1enD5\/penguin\/7866.png"},{"name":"PudgyPenguins","id":"8485","image":"https:\/\/ipfs.io\/ipfs\/QmNf1UsmdGaMbpatQ6toXSkzDpizaGmC9zfunCyoz1enD5\/penguin\/8485.png"}],"latitude":19.43029946807481,"longitude":-99.1742232211738,"last_ts":1660991593,"desc":"I am a PudgyPenguins collector"},{"name":"RightClickDave","address":"0x1064aA646A7Aedbd40816Fc0C35E044D0244a764","nfts":[{"name":"Cool Cats","id":"4277","image":"https:\/\/ipfs.io\/ipfs\/QmYYYEmq8kwmtrQrwQum63oXnE7FFf1WSnRWQuT3za8A7W"},{"name":"PudgyPenguins","id":"2057","image":"https:\/\/ipfs.io\/ipfs\/QmNf1UsmdGaMbpatQ6toXSkzDpizaGmC9zfunCyoz1enD5\/penguin\/2057.png"}],"latitude":19.47177946807481,"longitude":-99.1639632211738,"last_ts":1660991593,"desc":"I am a Cool Cats collector"},{"name":"Steptoe_123","address":"0x7CadB3F4D989DE491e248629701f6E3a9EC04a21","nfts":[{"name":"Azuki","id":"5112","image":"https:\/\/ikzttp.mypinata.cloud\/ipfs\/QmYDvPAXtiJg7s8JdRBSLWdgSphQdac8j1YuQNNxcGE1hg\/5112.png"}],"latitude":19.41742946807481,"longitude":-99.1993332211738,"last_ts":1660991593,"desc":"I am a Azuki collector"},{"name":"SpTheVault","address":"0xBeAF72cF7e48dEdF2bB7854104F977696cC57E79","nfts":[{"name":"goblintown","id":"8253","image":"ipfs:\/\/QmSifFzarzzen5Vv4TWWhpN56VksqZrF3Bmuuc4gdGTEv1\/8253.png"}],"latitude":19.43478946807481,"longitude":-99.17885322117381,"last_ts":1660991593,"desc":"I am a goblintown collector"},{"name":"sprinkles","address":"0x06C3eD81d1e4aC111f7F9D3d32BCf3CBf098627e","nfts":[{"name":"Meebits","id":"15879","image":"http:\/\/meebits.app\/meebitimages\/characterimage?index=15879&type=full&imageType=jpg"}],"latitude":19.453719468074812,"longitude":-99.1910632211738,"last_ts":1660991594,"desc":"I am a Meebits collector"},{"name":"hw5","address":"0x6c7e534F8c4dffB7Ea52fc3d4Aa7a16B4a575fe0","nfts":[{"name":"Doodles","id":"8922","image":"ipfs:\/\/QmQvS9hgGfPtQ7ogJ68xJitDuKWTthAzX5VtwuXM3NCA3m"},{"name":"BoredApeYachtClub","id":"8922","image":"ipfs:\/\/QmZ7417ZpQBVh93naazDGpX1myH9t3vX3gATn8qLvBxCX4"}],"latitude":19.40214946807481,"longitude":-99.1915132211738,"last_ts":1660991594,"desc":"I am a Doodles collector"},{"name":"Jiggles-Space","address":"0x62cAfAd11d1a34632A4DC9f2B81A23dd0a39BE0B","nfts":[{"name":"mfer","id":"9234","image":"ipfs:\/\/QmUvQcncsY6hnhP4fRNRq75aBz1Wne9JaB4AwyCnMyUhqz"},{"name":"mfer","id":"1859","image":"ipfs:\/\/QmQKKK1xb7wtX6vD81eNDnfEAgkBpyzkmyu3hJSYqYTSzF"},{"name":"mfer","id":"5643","image":"ipfs:\/\/QmSekZKhhvrpvxK3jZGZXxruVg1Z8tWmdyrba8V8BQz5w6"},{"name":"MutantApeYachtClub","id":"24458","image":"ipfs:\/\/QmSdzBkzmwhRPoWAunC4TbC37Mh44zseqnbsJcCtq3NaCr"},{"name":"mfer","id":"6187","image":"ipfs:\/\/QmaH17MWrT24UwDp4jDcViHAZeNstBGsykc164nTapMzzZ"},{"name":"mfer","id":"8220","image":"ipfs:\/\/QmY99pPCwiaoNKNzALp33nkPQGrcDkDMQJZhH1kjNmfaXZ"}],"latitude":19.40912946807481,"longitude":-99.19780322117381,"last_ts":1660991594,"desc":"I am a mfer collector"}]';

$json = json_decode($data, true);

foreach ($json as $p){

	foreach ($p['nfts'] as &$nft){
		$parts = explode('://', $nft['image']);

		if ($parts[0] == 'ipfs'){
			$url = 'https://ipfs.io/ipfs/' . $parts[1];
			$nft['image'] = $url;
		}
	}

	$sql = 'INSERT INTO users VALUES (NULL, "' . $p['name'] . '", "' . $p['desc'] . '", "' . $p['address'] . '", "' . addslashes(json_encode($p['nfts'])) . '", ' . $p['latitude'] . ', ' . $p['longitude'] . ', ' . $p['last_ts'] . ');';

	print_r($sql);

	try {
		run_query($sql);
	} catch (Exception $e){

	}
}