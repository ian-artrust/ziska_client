$(document).ready(function() {
	var server = $('#server').val();
	var urlAPI = server+"ziska_api";
    var urlGetCombo     = urlAPI+'/app/lib/combo_periode_kas.php';

	$(function () {        
		$.getJSON(urlGetCombo,function(json){
			$('#periode').html('');
			$.each(json, function(index, row) {
				$('#periode').append('<option value='+row.periode+'>'+row.periode+'</option>');
			});
		});
	});

	$("#load_lpd").click(function(){
        loadLPD();
	});
	
	$("#cetak").click(function(){
        $('#data-here').printArea();
    });

	function loadLPD(){
        var periode = $('#periode').val();
		$.ajax({
            url:urlAPI+'/app/module/lpd/lpd.php',
            type:'POST',
            data:{periode:periode},
            success:function(data){
                $('#data-here').html(data);
            }
        });
	}

});