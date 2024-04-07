<?php
	function conexion(){

	$host = "host=roundhouse.proxy.rlwy.net";
	$port = "port=30689";
	$dbname = "dbname=railway";
	$user = "user=postgres";
	$password = "password=vrROsjjuEyUwuKsPSrvUQeFGPYeWYPZV";

	$db = pg_connect("$host $port $dbname $user $password");

	return $db;
}
?>