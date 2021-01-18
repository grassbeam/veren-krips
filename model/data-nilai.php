<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
	class DB_DataNilai extends Database {
        
		function getAllByPaging($pageNo = 1, $rowCount = 10){
            $this->check_connection();
            $minRow = ($pageNo - 1) * $rowCount;
            if ($pageNo < 1) {
                $minRow = 1;
            }
			$query = "SELECT *, (SELECT count(*) from data_nilai) as total_data FROM data_nilai LIMIT " . $minRow . ", " . $rowCount;
			$result = $this->query($query);
			if ($result->num_rows > 0) {
			    // output data of each row
			    $ress = array(array());
			    $counter = 0;
			    while($row = $result->fetch_assoc()) {
			        $ress[$counter] = $row;
			        $counter += 1;
			    }
			    return $ress;
			} else {
			    return NULL;
			}
        }
        
        function getAllByDataTable($draw, $query) {
            $this->check_connection();
            $result = $this->fetch($query);
            $countTotalQuery = $this->query("SELECT COUNT(*) as tot FROM data_nilai");
            $totalData = 0;
			if ($countTotalQuery->num_rows > 0) {
			    // output data of each row
			    $row = $countTotalQuery->fetch_assoc();
			    $totalData = $row['tot'];
			} 
            $retRess["draw"] = $draw;
            $retRess["recordsTotal"] = $totalData;
            $retRess["recordsFiltered"] = $totalData;
            $retRess["data"] = $result;

            return $retRess;

		}
		

		function getGraphTest() {
			$query = "
			SELECT mst.mapel_lm, mst.agama, COALESCE(dt.total,0)AS total
			FROM (
			SELECT a.agama, b.mapel_lm
			FROM (SELECT DISTINCT agama FROM data_nilai) AS a
			JOIN (SELECT DISTINCT mapel_lm FROM data_nilai) AS b
			) AS mst
			LEFT JOIN (SELECT agama, mapel_lm, COUNT(*) AS total FROM data_nilai GROUP BY agama, mapel_lm) AS dt ON dt.agama = mst.agama AND dt.mapel_lm = mst.mapel_lm
			ORDER BY mst.mapel_lm, mst.agama;
			";
			return $this->fetch($query);
		}

	}

?>