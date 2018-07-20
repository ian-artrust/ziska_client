$(document).ready(function() {
	var server = $('#server').val();
	var urlAPI = server+"ziska_api";
    $(function () {
        $('#datetimepicker1').datetimepicker({
            format:'YYYY-MM-DD'
        }); 

        $('#lookup_muzaki').DataTable( {
		    "ajax":urlAPI+"/app/module/rekap_kasir/lookup_muzaki.php",
		    "columns": [
			    {"data": "npwz" },
          	    {"data": "nama_donatur" },
		    ]
        });
    });

    $('#lookup_muzaki tbody').on('click', 'tr', function (e) {
		var table = $('#lookup_muzaki').DataTable();
        var data = table.row( this ).data();
        $('#npwz').val(data["npwz"]);
        $('#nama_muzaki').val(data["nama_donatur"]);
        $('.close').click();
    });

    function loadDonasi(){
		var npwz = $('#npwz').val();
		$.ajax({
            url:urlAPI+'/app/module/rekap_kasir/load_donasi.php',
            type:'POST',
            data:{npwz:npwz},
            success:function(data){
                $('#data-here').html(data);
            }
        });
	}

    function cetak(){
        var tgl_donasi = $('#tgl_donasi').val();
        $('.konten').load('226_rekap_kasir/print_kasir.php','tgl_donasi='+tgl_donasi);
    }

    function cetak_km(){
        var npwz = $('#npwz').val();
        $('.konten').load('226_rekap_kasir/print_km.php','npwz='+npwz);
    }

    $('#reset').click(function(){
        $('.konten').load('226_rekap_kasir/rekap_kasir.php');
    });

    $('#cetak').click(function(){
        cetak();
    });

    $('#load_donasi').click(function(){
        loadDonasi();
    });

    $('#cetak_km').click(function(){
        cetak_km();
    });

});