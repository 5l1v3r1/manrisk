<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Detail Program</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/datepicker3.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/table.css') }}" rel="stylesheet" type="text/css">

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
			<li class="active"><a href="{{route('detailprogram')}}"><em class="fa fa-info">&nbsp;</em> Detail Program</a></li>
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
				<li class="active">Detail Program</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Detail Program</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
					<div class="col-sm-12">
						<div class="tbl-header">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <thead>
					        <tr>
										<th>Judul Program</th>
										<th>Action Plan</th>
										<th>Resiko</th>
										<th>Sasaran</th>
										<th>Rencana Anggaran</th>
										<th>Waktu Pelaksanaan</th>
										<th>Indikator Kegiatan</th>
										<th>Luaran Dampak</th>
										<th>Status Capaian</th>
										<th>Tahun</th>
					        </tr>
					      </thead>
					    </table>
					  </div>
					  <div class="tbl-content">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <tbody>
									@foreach ($data as $d)
										<tr>
											<td>{{$d->nama_judul_program}}</td>
											<td>{{$d->nama_action_plan}}</td>
											<td>{{$d->deskripsi_resiko}}</td>
											<td>{{$d->unit_sasaran}}</td>
											<td>{{$d->rencana_anggaran}}</td>
											<td>@php
											echo $d->waktu_pelaksanaan->format('d-m-Y');
											@endphp</td>
											<td>{{$d->indikator_kegiatan}}</td>
											<td>{{$d->luaran_dampak}}</td>
											<td>{{$d->status_capaian}}</td>
											<td>{{$d->tahun}}</td>
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
			        <h4 class="modal-title">Tambah Detail Program</h4>
			      </div>
			      <div class="modal-body">
							<form class="form-horizontal" action='{{route('detailprogram.add')}}' method='post'>
									{{ csrf_field() }}
									<div class="form-group">
											<label for="id_judul_program" class="col-md-4 control-label">Judul program</label>

											<div class="col-md-6">
													<select id="id_judul_program" type="number" class="form-control" name="id_judul_program" required autofocus>
															@foreach ($jp as $jp)
																	<option value="{{$jp->id_judul_program}}">{{$jp->nama_judul_program}}</option>
															@endforeach
											    </select>
											</div>
									</div>
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
											<label for="id_action_plan" class="col-md-4 control-label">Action plan</label>

											<div class="col-md-6">
													<select id="id_action_plan" type="number" class="form-control" name="id_action_plan" required autofocus>
															@foreach ($ap as $ap)
																	<option value="{{$ap->id_action_plan}}">{{$ap->nama_action_plan}}</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="unit_sasaran" class="col-md-4 control-label">Unit sasaran</label>

											<div class="col-md-6">
													<input id="unit_sasaran" type="text" class="form-control" name="unit_sasaran" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="rencana_anggaran" class="col-md-4 control-label">Rencana anggaran</label>

											<div class="col-md-6">
													<input id="rencana_anggaran" type="number" class="form-control" name="rencana_anggaran" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="waktu_pelaksanaan" class="col-md-4 control-label">Waktu pelaksanaan</label>

											<div class="col-md-6">
													<input id="waktu_pelaksanaan" type="datetime" class="form-control datepicker"  name="waktu_pelaksanaan" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="indikator_kegiatan" class="col-md-4 control-label">Indikator kegiatan</label>

											<div class="col-md-6">
													<input id="indikator_kegiatan" type="text" class="form-control" name="indikator_kegiatan" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="luaran_dampak" class="col-md-4 control-label">Luaran dampak</label>

											<div class="col-md-6">
													<input id="luaran_dampak" type="text" class="form-control" name="luaran_dampak" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="status_capaian" class="col-md-4 control-label">Status capaian</label>

											<div class="col-md-6">
													<input id="status_capaian" type="number" class="form-control" name="status_capaian" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="tahun" class="col-md-4 control-label">Tahun</label>

											<div class="col-md-6">
													<input id="tahun" type="number" class="form-control" name="tahun" required autofocus>
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

	<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script>
			$('#myModal').on('show.bs.modal', function(e) {
					var idk = $(e.relatedTarget).data('idk');
					$(e.currentTarget).find('input[name="id_dampak"]').val(idk);
			});

			$('#add').on('show.bs.modal');

			$(function(){
				   $('.datepicker').datepicker({
				      format: 'dd-mm-yyyy'
				    });
				});
	</script>

</body>
</html>
