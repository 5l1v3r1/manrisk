<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tindak Lanjut</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/table.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet" type="text/css">

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" type="text/css">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>Risk</span>Management</a>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">{{ Auth::user()->username }}</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<ul class="nav menu">
			<li><a href="{{route('resiko')}}"><em class="fa fa-exclamation-triangle">&nbsp;</em> Resiko</a></li>
			<li class="active"><a href="{{route('actionplan')}}"><em class="fa fa-puzzle-piece">&nbsp;</em> Tindak Lanjut</a></li>
			<li><a href="{{ route('logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();"><em class="fa fa-power-off">&nbsp;</em>
          Logout
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
    </li>
		</ul>
	</div><!--/.sidebar-->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Tindak Lanjut</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Tindak Lanjut</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
					<div class="col-sm-12">
						<div class="tbl-header">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <thead>
					        <tr>
										<th>ID Action Plan</th>
										<th>Resiko</th>
										<th>Aspek Terdampak</th>
										<th>Treatment</th>
										<th>Waktu Pelaksanaan</th>
										<th>Status</th>
										<th>PIC</th>
										<th>Keterangan</th>
					        </tr>
					      </thead>
					    </table>
					  </div>
					  <div class="tbl-content">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <tbody>
									@foreach ($data as $d)
										<tr>
											<td>{{$d->id_action_plan}}</td>
											<td>{{$d->deskripsi_resiko}}</td>
											<td>{{$d->nama_aspek_terdampak}}</td>
											<td>{{$d->nama_action_plan}}</td>
											<td>{{$d->waktu_pelaksanaan}}</td>
											<td>{{$d->status_pelaksanaan}}</td>
											<td>{{$d->pic}}</td>
											<td>{{$d->keterangan}}</td>
										</tr>
									@endforeach
					      </tbody>
					    </table>
					  </div>
						<br>
						<a class="btn btn-success pull-right" data-toggle="modal" href="#add">Add</a>
					</div>
			</div><!--/.row-->

			<div id="add" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Tambah Action Plan</h4>
			      </div>
			      <div class="modal-body">
							<form class="form-horizontal" action='{{route('actionplan.add')}}' method='post'>
									{{ csrf_field() }}
									<div class="form-group">
											<label for="id_resiko" class="col-md-4 control-label">Resiko</label>

											<div class="col-md-6">
													<select id="id_resiko" type="number" class="form-control" name="id_resiko" required autofocus>
															@foreach ($rs as $rs)
																	<option value="{{$rs->id_resiko}}">{{$rs->deskripsi_resiko}}</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="nama_action_plan" class="col-md-4 control-label">Nama action plan</label>

											<div class="col-md-6">
													<input id="nama_action_plan" type="text"  class="form-control" name="nama_action_plan" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="waktu_pelaksanaan" class="col-md-4 control-label">Waktu pelaksanaan</label>

											<div class="col-md-6">
													<input id="waktu_pelaksanaan" type="date" placeholder="yyyy-mm-dd" class="form-control" name="waktu_pelaksanaan" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="status_pelaksanaan" class="col-md-4 control-label">Status</label>

											<div class="col-md-6">
													<select id="status_pelaksanaan" type="number" class="form-control" name="status_pelaksanaan" required autofocus>
															<option value="1">Belum Terlaksana</option>
															<option value="2">Sedang Dilaksanakan</option>
															<option value="3">Telah Terlaksana</option>
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="pic" class="col-md-4 control-label">PIC</label>

											<div class="col-md-6">
													<input id="pic" type="text" class="form-control" name="pic" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="keterangan" class="col-md-4 control-label">Keterangan</label>

											<div class="col-md-6">
													<input id="keterangan" type="text" class="form-control" name="keterangan" required autofocus>
											</div>
									</div>
									<input type='hidden' name='created_by' id='created_by' value='{{ Auth::user()->username }}'/>
									<input class='btn btn-success' type='submit' value='Submit' />
							</form>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

			<br>
		<div class="row">
			<div class="col-sm-12">
				<p class="back-link">Risk Mangement <a href="https://www.unair.ac.id">Airlangga University</a></p>
			</div>
		</div><!--/.row-->
	</div>	<!--/.main-->

	<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script>

		// $(function() {
		// 	$("#waktu_pelaksanaan").datepicker({
		// 		dateFormat: 'dd-mm-yy'});
		// 	});
			$('#add').on('show.bs.modal');

			$('#id_kemungkinan').on('change',function(){
					var dampak = document.getElementById('id_dampak').value;
					var kemungkinan = document.getElementById('id_kemungkinan').value;
					$.ajax({
						type:'get',
						url:'{!!URL::to('findSkorKemungkinan')!!}',
						data:{'id_kemungkinan':kemungkinan},
						dataType: "json",
						success: function(response){
								$.ajax({
									type:'get',
									url:'{!!URL::to('findSkorDampak')!!}',
									data:{'id_dampak':dampak},
									dataType: "json",
									success: function(a){
											var skor = response.skor_kemungkinan * a.skor_dampak;
											document.getElementById("skor").innerHTML = skor;
							    },
								});
				    },
					});

     	});

			$('#id_dampak').on('change',function(){
					var dampak = document.getElementById('id_dampak').value;
					var kemungkinan = document.getElementById('id_kemungkinan').value;
					$.ajax({
						type:'get',
						url:'{!!URL::to('findSkorKemungkinan')!!}',
						data:{'id_kemungkinan':kemungkinan},
						dataType: "json",
						success: function(response){
								$.ajax({
									type:'get',
									url:'{!!URL::to('findSkorDampak')!!}',
									data:{'id_dampak':dampak},
									dataType: "json",
									success: function(a){
											var skor = response.skor_kemungkinan * a.skor_dampak;
											document.getElementById("skor").innerHTML = skor;
							    },
								});
				    },
					});

     	});

	</script>

</body>
</html>
