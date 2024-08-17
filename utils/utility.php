<?php
function fixSqlInjection($sql) {
	// abc\okok -> abc\\okok
	//abc\okok (user) -> abc\okok (server) -> sql (abc\okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
	//abc\okok (user) -> abc\okok (server) -> convert -> abc\\okok -> sql (abc\\okok) -> chinh xac
	$sql = str_replace('\\', '\\\\', $sql);
	//abc'okok -> abc\'okok
	//abc'okok (user) -> abc'okok (server) -> sql (abc'okok) -> xuat hien ky tu \ -> ky tu dac biet -> error query
	//abc'okok (user) -> abc'okok (server) -> convert -> abc\'okok -> sql (abc\'okok) -> chinh xac
	$sql = str_replace('\'', '\\\'', $sql);

	return $sql;
}
function getGET($key){
    $value = '';
    if(isset($_GET[$key])){
        $value = $_GET[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}
function getPost($key){
    $value = '';
    if(isset($_POST[$key])){
        $value = $_POST[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}
function getCookie($key){
    $value = '';
    if(isset($_COOKIE[$key])){
        $value = $_COOKIE[$key];
        $value = fixSqlInjection($value);
    }
    return $value;
}