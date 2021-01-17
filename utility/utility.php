<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
	function redirect($url) {
		echo"<script>window.location.href='". $url . "';</script>";
	}
	
	function alert($message) {
		echo "<script>alert('". $message . "');</script>";
	}
	
	function getCurrentDateTime() {
		return date('Y-m-d H:i:s');
	}
	
?>