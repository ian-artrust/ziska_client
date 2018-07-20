$(document).ready(function() {
	var table;
	//   var urlAPI = "http://localhost/ziska_api";
	  var urlAPI = "http://101.50.2.45/ziska_api";
	/* LOAD DATA TABLES LIBRARY */
	table = $('#tabelkantor').DataTable( {
		"ajax": urlAPI+"/app/module/kl/get_kl_bypass.php",
		"lengthMenu": [[5, 7, 9, -1], [5, 7, 9, "All"]],
		"columns": [
			{"data": "no_kantor" },
          	{"data": "nama_kantor" },
            {"data": "phone" },
            {"data": "pimpinan" },
		]
	});


});