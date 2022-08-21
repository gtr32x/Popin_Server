<?php

include_once __DIR__ . '/../api_config.php';
include_once __DIR__ . '/../lib_db.php';

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$distance = $_POST['distance'];

$sql = <<<EOD
SELECT
    *, (
      3959 * acos (
      cos ( radians({$latitude}) )
      * cos( radians( latitude ) )
      * cos( radians( longitude ) - radians({$longitude}) )
      + sin ( radians({$latitude}) )
      * sin( radians( latitude ) )
    )
) AS distance
FROM users
HAVING distance < {$distance}
ORDER BY distance
LIMIT 0 , 20;
EOD;

$ret = run_query($sql);

$out = ['ok' => true];

if (count($ret['rows'])){
	foreach ($ret['rows'] as &$row){
		$row['nfts'] = json_decode(stripslashes($row['nfts']), true);
	}
	$out['users'] = $ret['rows'];
}

header("content-type: application/json");
echo json_encode($out);