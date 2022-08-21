<?php

include_once __DIR__ . '/../api_config.php';
include_once __DIR__ . '/../lib_db.php';
include_once __DIR__ . '/../lib_http.php';

$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$address = $_POST['address'];

$sql = 'UPDATE users SET latitude = ' . $latitude . ', longitude = ' . $longitude . ', last_ts = ' . time() . ' WHERE address = "' . $address . '"';

$ret = run_query($sql);

error_log($sql);

header("content-type: application/json");
echo json_encode(['ok' => $ret['ok']]);