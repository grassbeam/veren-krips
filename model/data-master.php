<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
	class DB_MasterData extends Database{

        function closeDBConnection() {
			$this->close_connection();
        }

        function getMasterGuru() {
			$query = "SELECT DISTINCT guru FROM data_nilai ORDER BY guru;";
			$result = $this->fetchOneColumn($query, "guru");
			return $result;
        }

    }

?>