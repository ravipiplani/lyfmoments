<?php

function new_guid() { 
	$s = strtoupper(md5(uniqid(rand(),true))); 
	$guid_text = 
	substr($s,0,8) . '-' . 
	substr($s,8,4) . '-' . 
	substr($s,12,4). '-' . 
	substr($s,16,4). '-' . 
	substr($s,20); 
	return $guid_text;
}

function get_location_info($ip) {
	$location = geoip()->getLocation($ip);
	return [
		'iso_code' => $location['iso_code'],
		'currency' => $location['currency']
	];
}