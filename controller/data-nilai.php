<?php 

    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    // Can use db here...
    

    class DataNilaiController {
        private $DBDATA;

        function __construct($dbData) {
            $this->DBDATA = $dbData;
        }

        function getDataNilaiByPaging($pageNo, $rowCount) {
            return $this->DBDATA->getAllByPaging($pageNo, $rowCount);
        }

        function getDataNilaiByDT($columns, $start, $length, $order, $draw) {
            $query = "SELECT ";
            $totalCol = count($columns);
            for ($i=0; $i<$totalCol ; $i++) {
                $query = $query . $columns[$i]["data"];
                if ($i < $totalCol-1) {
                    $query = $query . ", ";
                }
            }

            $query = $query . " FROM data_nilai";

            $orderCol = $order["column"];
            $orderDir = $order["dir"];

            
            $query = $query . " ORDER BY " . ($orderCol+1) . " " . $orderDir;

            $query = $query . " LIMIT " . $start . ", " . $length;
            

            return $this->DBDATA->getAllByDataTable($draw, $query);
        }

        function insertDataNilai($data) {
            $nama = $data['nama'];
            $daerah = $data['daerah'];
            $tanggal1 = $data['tanggal1'];
            $jenis_kelamin = $data['jenis_kelamin'];
            $status_anak = $data['status_anak'];
            $nama_smp = $data['nama_smp'];
            $jurusan = $data['jurusan'];
            $agama = $data['agama'];
            $mapel = $data['mapel'];
            $nilai_teori = $data['nilai_teori'];
            $nilai_praktek = $data['nilai_praktek'];
            $guru = $data['guru'];
            $mapel_lm = $data['mapel_lm'];
            $kumpul_nilai = $data['kumpul_nilai'];
            $terima_rapor = $data['terima_rapor'];
            $ekskul = $data['ekskul'];
            $prestasi = $data['prestasi'];

            return $this->DBDATA->insertData($nama, $daerah, $tanggal1, $jenis_kelamin, $status_anak, $nama_smp, $jurusan
            , $agama, $mapel, $nilai_teori, $nilai_praktek, $guru, $mapel_lm, $kumpul_nilai
            , $terima_rapor, $ekskul, $prestasi);
        }

    }

?>