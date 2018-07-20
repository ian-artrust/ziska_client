$(document).ready(function() {
	var table;
	var server = $('#server').val();
	var urlAPI = server+"ziska_api";

	$(function () {
		$('#datetimepicker1').datetimepicker({
			format:'YYYY-MM-DD'
		});
	
		$('#datetimepicker2').datetimepicker({
			format:'YYYY-MM-DD'
		});
	});
	/* LOAD DATA TABLES LIBRARY */
    table = $('#tabelbatal').DataTable( {
        "ajax": urlAPI+"/app/module/batal_donasi_kl/get_donasi_kl.php",
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]],
		"columns": [
			{"data": "no_donasi" },
          	{"data": "npwz" },
			{"data": "nama_donatur" },
            {"data": "norek_bank" },
			{"data": "program" },
			{"data": "jml_donasi" },
		]
    });

	$('#tabelbatal tbody').on('click', 'tr', function () {
		var data = table.row(this).data();
		$('#no_donasi').val(data["no_donasi"]);
	});

    /* BUTTON EVENT */

    /* RESET */
    $('#reset').click(function(){
		$('.konten').load('229_batal_donasi_kl/batal_donasi_kl.php');
    });

	/* BATAL */
	$('#batal').click(function(){
		batalDonasi();
		$('.konten').load('229_batal_donasi_kl/batal_donasi_kl.php');
	});

	function batalDonasi(){
		var no_donasi = $('#no_donasi').val();
		$.ajax({
			url:  urlAPI+"/app/module/batal_donasi_kl/donasi_kl_reject.php",
			type: 'POST',
			dataType: 'json',
			data: {
				'aksi':'reject',
				'no_donasi':no_donasi
			},
			success : function(data){
				alert(data.pesan);
			}, 
			error: function(data){
				alert(data.pesan);
			}
		});

	}
});