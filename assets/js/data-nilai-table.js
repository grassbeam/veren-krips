$(document).ready(function() {
    $('#example').DataTable( {
        "processing": true,
        "serverSide": true,
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
            { "data": "tanggal1" },
            { "data": "jenis_kelamin" },
            { "data": "status_anak" },
            { "data": "nama_smp" }
        ]
    } );
} );