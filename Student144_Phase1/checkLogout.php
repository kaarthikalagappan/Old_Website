<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_start();
$checking = $_GET["redirected"];
if ($checking == "about"){
	$urlRedirect = "yes";
}
	if ($checking == "index"){
	$urlRedirect = "yes";
}
if ($checking == "contact"){
	$urlRedirect = "yes";
}
if ($checking == "collection"){
	$urlRedirect = "yes";
}
if ($urlRedirect == "yes"){
	session_destroy();
	$url = "Location: login.php";
	header($url);
}
else {
	$url = "Location: index.php";
	header($url);
}
?>