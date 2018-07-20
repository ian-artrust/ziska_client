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
	<script src="../module/421_jadwal_survey/jadwal_survey.js" type="text/javascript"></script>

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
        <fieldset>
			<legend>SETORAN KAS ZISR / FO</legend>
            <div class="form-group">
                <!-- Header Transaksi -->
                <div class="row" id="header">
                    <!-- Column 1 -->
                    <div class="col-md-12">
                        <table border="0" cellspacing="2" cellpadding="2">
                            <tr>
                                <td>
                                    <label>No Pengajuan</label><br>
                                    <input type="text" class="form-control"
                                    name="no_pengajuan" id="no_pengajuan" 
                                    placeholder="No Pengajuan..." readonly="true">
                                </td>
                                <td>&nbsp;</td>
                                <td>
                                    <label>Tgl Survey</label><br>
                                    <div class='input-group date' id="datetimepicker1">
                                        <input type='text' class="form-control" 
                                        id="tgl_survey" width="125px;" />
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <br>
                        <button type="button" class="btn btn-info" id="reset">
                            <span class="glyphicon glyphicon-refresh"></span>
                            Reset
                        </button>
                        &nbsp;
                        <button class="btn btn-success" id="survey">
                            <span class="glyphicon glyphicon-floppy-saved"></span> Jadwalkan Survey
                        </button>
                    </div>
                </div>
            </div>
        </fieldset>
    <br>
        <div class="container-fluid">
            <div class="col-md-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#tab_srv_individu">Individu</a></li>
                    <li><a data-toggle="tab" href="#tab_srv_entitas">Entitas</a></li>
                </ul>
                <div class="tab-content">
                    <br>
                    <div id="tab_srv_individu" class="tab-pane fade in active">
                        <table id="tabelpengajuan" class="display" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No Disposisi</th>
                                    <th>No Pengajuan</th>
                                    <th>Mustahik</th>
                                    <th>Pengajuan</th>
                                    <th>Tgl Pengajuan</th>
                                    <th>Jml Pengajuan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                    <div id="tab_srv_entitas" class="tab-pane fade in">
                        <table id="tabelpengajuan_entitas" width="100%" class="display" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No Disposisi</th>
                                    <th>No Pengajuan</th>
                                    <th>Lembaga</th>
                                    <th>Pengajuan</th>
                                    <th>Tgl Pengajuan</th>
                                    <th>Jml Pengajuan</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
	</div>
</div>
</body>
</html>
<?php } ?>