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
			$this->close_connection();
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

			$this->close_connection();
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
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphOne() {
			$query = "
			SELECT DISTINCT CONCAT(s.status_anak, ' - ' , a.agama) AS pointy, j.jurusan AS pointx, COALESCE(dt.total,0) AS num
			FROM data_nilai AS j
			JOIN (SELECT DISTINCT status_anak FROM data_nilai) AS s
			JOIN (SELECT DISTINCT agama FROM data_nilai) AS a
			LEFT JOIN (SELECT jurusan, status_anak, agama, COUNT(*) AS total FROM data_nilai GROUP BY jurusan, status_anak, agama) AS dt ON dt.jurusan = j.jurusan AND s.status_anak = dt.status_anak AND dt.agama = a.agama
			ORDER BY pointy, j.jurusan";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphThree() {
			$query = "
			SELECT CONCAT(mst.prestasi, ' - ', mst.jurusan) AS pointy, mst.nama_smp AS pointx, COALESCE(dt.total, 0) num
			FROM (SELECT DISTINCT a.prestasi, b.jurusan, c.nama_smp 
			FROM data_nilai AS a
			JOIN (SELECT DISTINCT jurusan FROM data_nilai) AS b
			JOIN (SELECT DISTINCT nama_smp FROM data_nilai) AS c) mst
			LEFT JOIN (SELECT prestasi, jurusan, nama_smp, COUNT(*) as total FROM data_nilai GROUP BY prestasi, jurusan, nama_smp) AS dt 
				ON dt.prestasi = mst.prestasi AND dt.jurusan = mst.jurusan AND dt.nama_smp = mst.nama_smp
			ORDER BY pointy, pointx";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;

		}

		function getGraphFour() {
			$query = "
			SELECT CONCAT(jk.jenis_kelamin, ' - ', jr.jurusan) AS pointy, mp.mapel AS pointx, COALESCE(dt.num, 0) AS num
			FROM (SELECT 'L' AS jenis_kelamin UNION ALL SELECT 'P' AS jenis_kelamin ) AS jk
			JOIN (SELECT DISTINCT jurusan FROM data_nilai) AS jr ON 1=1
			JOIN (SELECT DISTINCT mapel FROM data_nilai) AS mp ON 1=1
			LEFT JOIN (SELECT jenis_kelamin, jurusan, mapel, AVG(nilai_teori) num FROM data_nilai GROUP BY jenis_kelamin, jurusan, mapel) AS dt 
				ON dt.jenis_kelamin = jk.jenis_kelamin AND dt.jurusan = jr.jurusan AND dt.mapel = mp.mapel
			ORDER BY pointy, pointx";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

	}

?>