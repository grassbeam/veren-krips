<?php
	if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
	
	class DB_DataNilai extends Database {

		function insertData($nama, $daerah, $tanggal1, $jenis_kelamin, $status_anak, $nama_smp, $jurusan
					, $agama, $mapel, $nilai_teori, $nilai_praktek, $guru, $mapel_lm, $kumpul_nilai
					, $terima_rapor, $ekskul, $prestasi) {
			$query = "INSERT INTO `master`.`data_nilai`
			(`nama`,
			`daerah`,
			`tanggal1`,
			`jenis_kelamin`,
			`status_anak`,
			`nama_smp`,
			`jurusan`,
			`agama`,
			`mapel`,
			`nilai_teori`,
			`nilai_praktek`,
			`guru`,
			`mapel_lm`,
			`kumpul_nilai`,
			`terima_rapor`,
			`ekskul`,
			`prestasi`) VALUES  
			('" . $nama . "' ," . 
			"'" . $daerah . "', " . 
			"'" . $tanggal1 . "', " . 
			"'" . $jenis_kelamin . "', " . 
			"'" . $status_anak . "', " . 
			"'" . $nama_smp . "', " . 
			"'" . $jurusan . "', " . 
			"'" . $agama . "', " . 
			"'" . $mapel . "', " . 
			"'" . $nilai_teori . "', " . 
			"'" . $nilai_praktek . "', " . 
			"'" . $guru . "', " . 
			"'" . $mapel_lm . "', " . 
			"'" . $kumpul_nilai . "', " . 
			"'" . $terima_rapor . "', " . 
			"'" . $ekskul . "', " . 
			"'" . $prestasi . "');";
			$result = $this->queryddl($query);
			$this->close_connection();
			return $result;
		}
        
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

		function getGraphOne() {
			$query = "
			SELECT jk.jenis_kelamin AS pointy, yr.tahun AS pointx, AVG(dt.nilai_teori) AS num
			FROM (SELECT 'L' AS jenis_kelamin UNION ALL SELECT 'P' AS jenis_kelamin ) AS jk
			JOIN (SELECT DISTINCT YEAR(kumpul_nilai) AS tahun FROM data_nilai) AS yr ON 1=1
			LEFT JOIN data_nilai AS dt ON dt.jenis_kelamin = jk.jenis_kelamin AND YEAR(dt.kumpul_nilai) = yr.tahun
			GROUP BY jk.jenis_kelamin, yr.tahun
			ORDER BY pointy, pointx;";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphTwo() {
			$query = "
			SELECT jk.jenis_kelamin AS pointy, yr.tahun AS pointx, AVG(dt.nilai_praktek) AS num
			FROM (SELECT 'L' AS jenis_kelamin UNION ALL SELECT 'P' AS jenis_kelamin ) AS jk
			JOIN (SELECT DISTINCT YEAR(kumpul_nilai) AS tahun FROM data_nilai) AS yr ON 1=1
			LEFT JOIN data_nilai AS dt ON dt.jenis_kelamin = jk.jenis_kelamin AND YEAR(dt.kumpul_nilai) = yr.tahun
			GROUP BY jk.jenis_kelamin, yr.tahun
			ORDER BY pointy, pointx;";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphThree() {
			$query = "
			SELECT CONCAT(mst.prestasi, ' - ', mst.jurusan) AS pointy, mst.nama_smp AS pointx, dt.total num
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
			SELECT CONCAT(jk.jenis_kelamin, ' - ', jr.jurusan) AS pointy, mp.mapel AS pointx, dt.num AS num
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

		function getGraphFive() {
			$query = "
			SELECT g.guru AS pointy, mp.mapel AS pointx, dt.num AS num
			FROM (SELECT DISTINCT guru FROM data_nilai) AS g
			JOIN (SELECT DISTINCT mapel FROM data_nilai) AS mp
			LEFT JOIN (SELECT guru, mapel, AVG(nilai_praktek) num FROM data_nilai GROUP BY guru, mapel) AS dt 
				ON dt.guru = g.guru AND dt.mapel = mp.mapel
			ORDER BY pointy, pointx";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphSix($filterGuru) {
			$filterGuruCondition = '';
			$countFilterGuru = count($filterGuru);

			if ( $countFilterGuru > 0) {
				$filterGuruCondition = $filterGuruCondition . "HAVING pointy IN (";
				$tmpcount = 0;
				foreach ($filterGuru as $gurutext) {
					$filterGuruCondition = $filterGuruCondition . "'" . $gurutext . "'" . ($tmpcount != $countFilterGuru-1 ? ", ":"");
					$tmpcount++;
				}
				$filterGuruCondition = $filterGuruCondition . ")";
			}
			
			$query = "
			SELECT g.guru AS pointy, mp.tahun AS pointx, AVG(dt.nilai_teori) AS num
			FROM (SELECT DISTINCT guru FROM data_nilai) AS g
			JOIN (SELECT DISTINCT YEAR(kumpul_nilai) AS tahun FROM data_nilai) AS mp ON 1=1
			LEFT JOIN data_nilai AS dt 
				ON dt.guru = g.guru AND YEAR(dt.kumpul_nilai) = mp.tahun
			GROUP BY pointy, pointx
			" . $filterGuruCondition . "
			ORDER BY pointy, pointx;  ";
			
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphSeven() {
			$query = "
			SELECT  YEAR(kumpul_nilai) AS pointx, jurusan AS pointy, SUM(prestasi) AS num FROM data_nilai
			GROUP BY jurusan, YEAR(kumpul_nilai)
			ORDER BY pointy, pointx;";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphEight() {
			$query = "
			SELECT j.jurusan AS pointy, e.ekskul AS pointx, dt.total AS num
			FROM(SELECT DISTINCT jurusan from data_nilai) AS j
			JOIN(SELECT DISTINCT ekskul from data_nilai) AS e
			LEFT JOIN(SELECT jurusan, ekskul, COUNT(*) AS total FROM data_nilai GROUP BY jurusan, ekskul) as dt
			ON dt.jurusan = j.jurusan AND dt.ekskul = e.ekskul
			ORDER BY pointy, pointx;";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

		function getGraphNine() {
			$query = "
			SELECT ag.agama AS pointx, jk.jenis_kelamin AS pointy, dt.num
			FROM (SELECT DISTINCT agama FROM data_nilai) ag
			JOIN (SELECT 'L' AS jenis_kelamin UNION SELECT 'P' AS jenis_kelamin) AS jk ON 1=1
			LEFT JOIN (SELECT agama AS pointx, jenis_kelamin AS pointy, COUNT(*) AS num  FROM data_nilai GROUP BY agama, jenis_kelamin) AS dt ON dt.pointx = ag.agama AND dt.pointy = jk.jenis_kelamin
			ORDER BY pointy, pointx;";
			$result = $this->fetch($query);
			$this->close_connection();
			return $result;
		}

	}

?>