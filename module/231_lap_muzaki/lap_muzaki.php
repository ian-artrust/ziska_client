<?php
session_start();
  if($_SESSION['status']!='LOGIN'){
    header("location:../index.php");
  } else {
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<!-- Custom CSS -->
	<style type="text/css">
		.form-control{
			padding-bottom: auto;
			margin-bottom: 5px;
		}

		fieldset 
			{
				border: 1px solid #ddd !important;
				margin: 0;
				xmin-width: 0;
				padding: 10px;       
				position: relative;
				border-radius:4px;
				background-color:#f5f5f5;
				padding-left:10px!important;
			}	
			
		legend
			{
				font-size:14px;
				font-weight:bold;
				margin-bottom: 0px; 
				width: 35%; 
				border: 1px solid #ddd;
				border-radius: 4px; 
				padding: 5px 5px 5px 10px; 
				background-color: #ffffff;
			}
	</style>
    <!-- Call JQuery Library -->
    <script src="../bower_components/jquery/dist/jquery.min.js" type="text/javascript"></script>
    
    <!-- Call DataTables Library -->
    <script src="../bower_components/datatables.net/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
    <script src="../bower_components/moment/min/moment.min.js" type="text/javascript"></script>
    <script src="../bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="../bower_components/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="../bower_components/wnumb/wNumb.js" type="text/javascript"></script>

    <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-dt/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css">
    <!-- <link rel="stylesheet" type="text/css" href="../bower_components/chosen/chosen.min.css"> -->

	<!-- Call Custom Library -->
	<script src="../module/231_lap_muzaki/lap_muzaki.js" type="text/javascript"></script>

    <style>
        input, select {
            padding: 3px;
        }
        #npwz, #muzaki, #zisr, #total_donasi{
            background-color:#e1f4f7;
        }
    </style>

</head>
<body>
    <br>
    <div class="container-fluid">
        <div class="row-md-11">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#tab_muzaki">Data Muzaki</a></li>
                <li><a data-toggle="tab" href="#tab_muzaki_aktif">Muzaki Aktif</a></li>
                <li><a data-toggle="tab" href="#tab_muzaki_nonaktif">Muzaki Non Aktif</a></li>
            </ul>
            <div class="tab-content">
            <br>
                <div id="tab_muzaki" class="tab-pane fade in active">
                    <table id="tabel_muzaki" class="display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NPWZ</th>
                                <th>Muzaki</th>
                                <th>Kategori</th>
                                <th>Alamat</th>
                                <th>No HP</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="tab_muzaki_aktif" class="tab-pane">
                    <table id="tabel_muzaki_aktif" width="100%" class="display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NPWZ</th>
                                <th>Muzaki</th>
                                <th>Kategori</th>
                                <th>Total Donasi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div id="tab_muzaki_nonaktif" class="tab-pane">
                    <table id="tabel_muzaki_nonaktif" width="100%" class="display" cellspacing="0">
                        <thead>
                            <tr>
                                <th>NPWZ</th>
                                <th>Muzaki</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<?php } ?>