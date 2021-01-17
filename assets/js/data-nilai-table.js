$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
        "scrollX": true,
        "searching": false,
        "ajax": {
            "url": $('#BASEURL').val() + "api/get.php",
            "type": "GET",
            "data": {
                "context": "data"
            },
        },
        "columns": [
            { "data": "nama" },
            { "data": "daerah" },
            { "data": "jenis_kelamin" },
            { "data": "status_anak" },
            { "data": "nama_smp" },
            { "data": "jurusan" },
            { "data": "agama" },
            { "data": "mapel" },
            { "data": "nilai_teori" },
            { "data": "nilai_praktek" },
            { "data": "guru" },
            { "data": "mapel_lm" },
            { "data": "ekskul" },
            { "data": "prestasi" },
        ]
    } );
} );