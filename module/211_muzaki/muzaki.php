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

     <!-- Data Tables CSS -->
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-dt/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">

	<!-- Call Custom Library -->
	<script src="../module/211_muzaki/muzaki.js" type="text/javascript"></script>
</head>
<body>
	<br>
	<!-- Container datagrid dan form -->
	<div class="container-fluid">
		<div class="row clearfix">

			<!-- Form Place -->
			<div class="col-md-5 column">
			<fieldset>
				<legend>DATA MUZAKI</legend>
			    <!-- Form CRUD Book Master -->
				<!-- <form class="form" id="frmanggota" action="" method="post"> -->
					<div class="form-group">
						<label>NPWZ dan Nama</label>
						<div class="row">
							<div class="col-md-4">
								<input type="hidden" name="kode_daerah" id="kode_daerah">
								<input type="text" class="col-md-2 form-control" id="npwz"
								placeholder="NPWZ" readonly="true">
							</div>
							<div class="col-md-8">
								<input type="text" class="col-md-6 form-control" id="nama_donatur" name="nama_donatur" 
						 		required placeholder="Masukan Nama Muzaki ...">
							</div>
						</div>	

						<label>NIK</label>
						<input type="text" class="form-control" id="nik" name="nik" 
						required placeholder="Masukan NIK">				

						<label>Alamat</label>
						<input type="text" class="form-control" id="alamat" name="alamat" 
						required placeholder="Masukan Alamat">

						<label>Phone dan Level</label>
						<div class="row">
							<div class="col-md-6">
								<input type="text" class="form-control" id="no_hp" name="no_hp" 
								maxlength="15" required placeholder="No Handphone...">
							</div>
							<div class="col-md-3">
								<div class="selectContainer">
				            	<select class="form-control" name="kategori" id="kategori">
				                	<option value="">Kategori</option>
				                	<option value="Individu">Individu</option>
				                	<option value="Entitas">Entitas</option>
				            	</select>
				        		</div>
							</div>
							<div class="col-md-3">
								<select class="form-control" name="status" id="status">
				                <option value="Aktif">Aktif</option>
				                <option value="Tidak Aktif">Tidak Aktif</option>
				            </select>
							</div>
						</div>

						<label>Petugas</label>
		                <div class="row">
		                    <div class="col-md-4">
		                        <input type="text" class="form-control" name="kode_petugas" id="kode_petugas" placeholder="Kode Petugas" readonly="" />		                    </div>
		                    <div class="col-md-6">
		                        <input type="text" class="form-control" name="nama_petugas" id="nama_petugas" placeholder="Nama Petugas" readonly="" />
		                    </div>
		                    <div class="col-md-1">
		                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#petugasModal">
		                        	<span class="glyphicon glyphicon-search"></span>
		                        </button>
		                    </div>
		                </div>					
					</div>
					<label>Kantor Layanan</label>
					<div class="row">
						<div class="col-md-3">
							<input type="text" class="form-control" name="no_kantor" id="no_kantor" placeholder="Nomor" readonly="" />		                    </div>
						<div class="col-md-7">
							<input type="text" class="form-control" name="nama_kantor" id="nama_kantor" placeholder="Kantor Layanan" readonly="" />
						</div>
						<div class="col-md-1">
							<button type="button" class="btn btn-info" data-toggle="modal" data-target="#kantorModal">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</div>
					</div>	
					<br>				
					<button type="submit" id="save" name="save" value="save" class="btn btn-sm btn-success">Save</button>
					<button type="button" id="update" name="update" class="btn btn-sm btn-warning">Update</button>
					<button type="button" id="delete" name="delete" class="btn btn-sm btn-danger">Delete</button>	
					<button type="reset" id="reset" class="btn btn-sm btn-primary">Reset</button>					
				<!-- </form>/. End Form CRUD Book Master -->
			</fieldset>		
			</div><!-- /. End Form Place -->

			<!-- Datagrid Place -->
			<div class="col-md-7 column">
				<table id="tabelmuzaki" class="display" cellspacing="0">
					<thead>
						<tr>
							<th>NPWZ</th>
							<th>Nama</th>
							<th>NIK</th>
							<th>Alamat</th>
							<th>Petugas</th>
							<!-- <th></th> -->
						</tr>
					</thead>
	                <tbody></tbody>
				</table>
			</div><!-- /. End Datagrid Place -->

		</div>
	</div>	<!-- ./End Container datagrid dan form -->

	<!-- Modal Lookup Kantor -->
	<div class="modal fade" id="kantorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog" style="width:800px">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                	<span aria-hidden="true">&times;</span>
	                </button>
	                <h4 class="modal-title" id="myModalLabel">Lookup Data Kantor Layanan</h4>
	            </div>
	            <div class="modal-body">
	                <table id="lookup_kantor" width="100%" class="table table-bordered table-hover table-striped">
	                    <thead>
	                        <tr>
	                            <th>No Kantor</th>
	                            <th>Kantor Layanan</th>
								<th>Pimpinan</th>
	                        </tr>
	                    </thead>
	                    <tbody>
        		</tbody>
	                </table>  
	            </div>
	        </div>
	    </div>
	</div>

	<!-- Modal Lookup Petugas -->
	<div class="modal fade" id="petugasModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="modal-dialog" style="width:800px">
	        <div class="modal-content">
	            <div class="modal-header">
	                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                	<span aria-hidden="true">&times;</span>
	                </button>
	                <h4 class="modal-title" id="myModalLabel">Lookup Data Petugas</h4>
	            </div>
	            <div class="modal-body">
	                <table id="lookup_petugas" width="100%" class="table table-bordered table-hover table-striped">
	                    <thead>
	                        <tr>
	                            <th>Kode Petugas</th>
	                            <th>Nama Petugas</th>
								<th>Phone</th>
	                        </tr>
	                    </thead>
	                    <tbody>
        				</tbody>
	                </table>  
	            </div>
	        </div>
	    </div>
	</div>
</body>
</html>
<?php } ?>