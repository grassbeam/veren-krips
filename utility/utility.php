<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
	
	function core_base_url($atRoot=FALSE, $atCore=FALSE, $parse=FALSE){
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
            $dir =  str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);

            $core = preg_split('@/@', str_replace($_SERVER['DOCUMENT_ROOT'], '', realpath(dirname(__FILE__))), NULL, PREG_SPLIT_NO_EMPTY);
            $core = $core[0];

            $tmplt = $atRoot ? ($atCore ? "%s://%s/%s/" : "%s://%s/") : ($atCore ? "%s://%s/%s/" : "%s://%s%s");
            $end = $atRoot ? ($atCore ? $core : $hostname) : ($atCore ? $core : $dir);
            $base_url = sprintf( $tmplt, $http, $hostname, $end );
        }
        else $base_url = 'http://localhost/';

        if ($parse) {
            $base_url = parse_url($base_url);
            if (isset($base_url['path'])) if ($base_url['path'] == '/') $base_url['path'] = '';
        }

        return $base_url;
	}
	
	function base_url2() {
		return core_base_url(TRUE, TRUE);
	}

	function base_url() {
        if (isset($_SERVER['HTTP_HOST'])) {
            $http = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
            $hostname = $_SERVER['HTTP_HOST'];
			$base_url = sprintf( "%s://%s/%s/", $http, $hostname, CONFIG_ROOT_FOLDER);
		}
		else $base_url = 'http://localhost/' . CONFIG_ROOT_FOLDER . '/';
			
		return $base_url;
	}

	function redirect($url, $permanent = false) {
		header('Location: ' . $url, true, $permanent ? 301 : 302);
		exit();
	}

	function redirectJS($url) {
		echo"<script>window.location.href='". $url . "';</script>";
	}
	
	function alertJS($message) {
		echo "<script>alert('". $message . "');</script>";
	}

	function alertRedirectJS($message, $url) {
		echo "<script>alert('". $message . "'); window.location.href='" . $url . "';</script>";
	}
	
	function getCurrentDateTime() {
		return date('Y-m-d H:i:s');
	}

	function createGeneralResponseModel($status = false, $message = '', $data = null) {
		$result['data'] = $data;
		$result['status'] = $status;
		$result['message'] = $message;

		return $result;
	}
	
?>