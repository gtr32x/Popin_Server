<?php

function graph_fetch_nfts($address){
	$output = shell_exec('node query.js ' . $address);
	$json = json_decode($output, true);

	$out = [];

	foreach ($json as $nft){
		if (array_key_exists('meta', $nft)){
			$meta = str_replace(["data:application/json;utf8,", "%20"], "", $nft['meta']);	
			$meta = json_decode($meta, true);

			if (is_array($meta) && array_key_exists('image', $meta)){
				$out[] = [
					'name' => $nft['name'],
					'id' => $nft['id'],
					'image' => $meta['image']
				];
			}
		}
	}

	return $out;
}