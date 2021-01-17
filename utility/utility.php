<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
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