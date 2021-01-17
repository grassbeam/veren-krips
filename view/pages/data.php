<?php 
    if (!defined('BASE')) die('<h1 class="try-hack">Restricted access!</h1>');
?>
        <div class="jumbotron page-header">
            <p class="h1">Data Page</p>  
            <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dictum dapibus arcu eget condimentum. Curabitur sagittis sollicitudin quam non iaculis. In hac habitasse platea dictumst. Praesent tempus ligula ac accumsan viverra. Ut tempus eleifend molestie. Integer quis blandit nunc. Praesent at leo eu sem finibus porta vel nec metus.</p>
        </div>
        <div class="accordion mb-4" id="accordionExample">
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h2 class="mb-0">
                        <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                        <h4>Input Data</h4>
                        </button>
                    </h2>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                    <div class="card-body">
                        <form action="#" method="post" id="formInputDataNilai">

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtNama">Nama</label>
                                    <input type="text" class="form-control" id="txtNama" name="nama" >
                                </div>

                                <div class="col-4">
                                    <label for="txtDaerah">Daerah</label>
                                    <input type="text" class="form-control" id="txtDaerah" name="daerah" >
                                </div>

                                <div class="col-4">
                                    <label for="txtTanggal">Tanggal</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtTanggal" name="tanggal1" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtJenisKelamin">Jenis Kelamin</label>
                                    <select class="custom-select" id="txtJenisKelamin" name="jeniskelamin" >
                                        <option selected>Please Select</option>
                                        <option value="L">Laki-Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="txtStatusAnak">Status Anak</label>
                                    <select class="custom-select" id="txtStatusAnak" name="statusanak" >
                                        <option selected>Please Select</option>
                                        <option value="Kandung">Kandung</option>
                                        <option value="Tiri">Tiri</option>
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label for="txtNamaSMP">Nama SMP</label>
                                    <input type="text" class="form-control" id="txtNamaSMP" name="namasmp" >
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtJurusan">Jurusan</label>
                                    <select class="custom-select" id="txtJurusan" name="jurusan" >
                                        <option selected>Please Select</option>
                                        <option value="IPA">IPA</option>
                                        <option value="IPS">IPS</option>
                                    </select>
                                </div>


                                <div class="col-4">
                                    <label for="txtAgama">Agama</label>
                                    <select class="custom-select" id="txtAgama" name="agama" >
                                        <option selected>Please Select</option>
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
                                    <input type="text" class="form-control" id="txtMapel" name="mapel" >
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtNilaiTeori">Nilai Teori</label>
                                    <input type="number" class="form-control" id="txtNilaiTeori" name="nilaiteori" >
                                </div>

                                <div class="col-4">
                                    <label for="txtNilaiPraktek">Nilai Praktek</label>
                                    <input type="number" class="form-control" id="txtNilaiPraktek" name="nilaipraktek" >
                                </div>

                                <div class="col-4">
                                    <label for="txtNamaGuru">Nama Guru</label>
                                    <input type="text" class="form-control" id="txtNamaGuru" name="namaguru" >
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtMapelLM">Mapel LM</label>
                                    <input type="text" class="form-control" id="txtMapelLM" name="mapellm" >
                                </div>

                                <div class="col-4">
                                    <label for="txtKumpulNilai">Kumpul Nilai</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtKumpulNilai" name="kumpulnilai" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4">
                                    <label for="txtTerimaRapor">Terima Rapor</label>
                                    <div class="input-group date">
                                        <input type="text" class="form-control" id="txtTerimaRapor" name="terimarapor" >
                                        <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="bi bi-calendar-date"></i></div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-row align-items-center mb-3">

                                <div class="col-4">
                                    <label for="txtEkskul">Ekskul</label>
                                    <input type="text" class="form-control" id="txtEkskul" name="ekskul" >
                                </div>

                                <div class="col-4">
                                    <label for="txtPrestasi">Prestasi</label>
                                    <input type="text" class="form-control" id="txtPrestasi" name="prestasi" >
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