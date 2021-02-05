<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');

    $isParamValid = true;
    $isPOST = false;

    if (isset($_POST['code']))  {
        // var_dump($_POST);
        $isPOST = true;

        require_once './model/data-nilai.php';
    
        $DataNilaiDB = new DB_DataNilai();
    
    
        require_once './controller/data-nilai.php';
    
        $dataNilaiController = new DataNilaiController($DataNilaiDB);

        $value = array (
            "nama" => $_POST["nama"],
			"daerah" => $_POST["daerah"],
			"tanggal1" => $_POST["tanggal1"],
			"jenis_kelamin" => $_POST["jeniskelamin"],
			"status_anak" => $_POST["statusanak"],
			"nama_smp" => $_POST["namasmp"],
			"jurusan" => $_POST["jurusan"],
			"agama" => $_POST["agama"],
			"mapel" => $_POST["mapel"],
			"nilai_teori" => $_POST["nilaiteori"],
			"nilai_praktek" => $_POST["nilaipraktek"],
			"guru" => $_POST["namaguru"],
			"mapel_lm" => $_POST["mapellm"],
			"kumpul_nilai" => $_POST["kumpulnilai"],
			"terima_rapor" => $_POST["terimarapor"],
			"ekskul" => $_POST["ekskul"],
			"prestasi" => $_POST["prestasi"],
        );


        $resultInsert = $dataNilaiController->insertDataNilai($value);



    }

    
?>
        <div class="jumbotron page-header">
            <p class="h1">Data Page</p>  
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum dapibus arcu eget condimentum. Curabitur sagittis sollicitudin quam non iaculis. In hac habitasse platea dictumst. Praesent tempus ligula ac accumsan viverra. Ut tempus eleifend molestie. Integer quis blandit nunc. Praesent at leo eu sem finibus porta vel nec metus.</p>
        </div>
        <?php if (isset($resultInsert)) { 
                if ($resultInsert) {
        ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Insert Data Success!</strong> Your data is successfully stored.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php } else { ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Insert Data Error!</strong> You should check in on some of those fields below.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?php   } 
             } 
        ?>
        <div class="accordion mb-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h4>Input Data</h4>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="./?page=data" method="post" id="formInputDataNilai">

                            <input type="hidden" value="something" name="code">

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtNama">Nama</label>
                                    <input type="text" class="form-control" id="txtNama" name="nama" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtDaerah">Daerah</label>
                                    <input type="text" class="form-control" id="txtDaerah" name="daerah" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtTanggal">Tanggal</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtTanggal" name="tanggal1" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtJenisKelamin">Jenis Kelamin</label>
                                    <select class="custom-select" id="txtJenisKelamin" name="jeniskelamin" required>
                                        <option selected disabled value="">Please Select</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="txtStatusAnak">Status Anak</label>
                                    <select class="custom-select" id="txtStatusAnak" name="statusanak" required>
                                        <option selected disabled value="">Please Select</option>
                                        <option value="Kandung">Kandung</option>
                                        <option value="Tiri">Tiri</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="txtNamaSMP">Nama SMP</label>
                                    <input type="text" class="form-control" id="txtNamaSMP" name="namasmp" required>
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtJurusan">Jurusan</label>
                                    <select class="custom-select" id="txtJurusan" name="jurusan" required>
                                        <option selected disabled value="">Please Select</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>


                                <div class="col-4">
                                    <label for="txtAgama">Agama</label>
                                    <select class="custom-select" id="txtAgama" name="agama" required>
                                        <option selected disabled value="">Please Select</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Khonghucu">Khonghucu</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="txtMapel">Mata Pelajaran</label>
                                    <input type="text" class="form-control" id="txtMapel" name="mapel" required>
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtNilaiTeori">Nilai Teori</label>
                                    <input type="number" class="form-control" id="txtNilaiTeori" name="nilaiteori" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtNilaiPraktek">Nilai Praktek</label>
                                    <input type="number" class="form-control" id="txtNilaiPraktek" name="nilaipraktek" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtNamaGuru">Nama Guru</label>
                                    <input type="text" class="form-control" id="txtNamaGuru" name="namaguru" required>
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtMapelLM">Mapel LM</label>
                                    <input type="text" class="form-control" id="txtMapelLM" name="mapellm" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtKumpulNilai">Kumpul Nilai</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtKumpulNilai" name="kumpulnilai" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="txtTerimaRapor">Terima Rapor</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtTerimaRapor" name="terimarapor" required>
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtEkskul">Ekskul</label>
                                    <input type="text" class="form-control" id="txtEkskul" name="ekskul" required>
                                </div>

                                <div class="col-4">
                                    <label for="txtPrestasi">Prestasi</label>
                                    <input type="number" class="form-control" id="txtPrestasi" name="prestasi" required>
                                </div>

                                <div class="col-4">
                                    <button class="btn btn-warning">Reset</button>
                                    <button class="btn btn-primary" type="submit">Submit form</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-light p-4 rounded">
            <h3>Data Content</h3>
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Daerah</th>
                        <th>Jenis Kelamin</th>
                        <th>Status Anak</th>
                        <th>Nama SMP</th>
                        <th>Jurusan</th>
                        <th>Agama</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Teori</th>
                        <th>Nilai Praktek</th>
                        <th>Guru</th>
                        <th>Mapel LM</th>
                        <th>Ekskul</th>
                        <th>Prestasi</th>
                    </tr>
                </thead>
            </table>
        </div>