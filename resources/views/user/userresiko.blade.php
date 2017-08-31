<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Resiko</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
	<link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
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
			<li class="active"><a href="{{route('resiko')}}"><em class="fa fa-exclamation-triangle">&nbsp;</em> Resiko</a></li>
			<li><a href="{{route('detailprogram')}}"><em class="fa fa-info">&nbsp;</em> Detail Program</a></li>
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
				<li class="active">Resiko</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Resiko</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
					<div class="col-sm-12">
						<div class="tbl-header">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <thead>
					        <tr>
										<th>Deskripsi Resiko</th>
										<th>Aspek Terdampak</th>
										<th>Dampak</th>
										<th>Kemungkinan</th>
										<th>Skor</th>
										<th>Pemicu</th>
										<th>Jenis</th>
					        </tr>
					      </thead>
					    </table>
					  </div>
					  <div class="tbl-content">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <tbody>
									@foreach ($data as $d)
										<tr>
											<td>{{$d->deskripsi_resiko}}</td>
											<td>{{$d->nama_aspek_terdampak}}</td>
											<td>{{$d->nama_dampak}}</td>
											<td>{{$d->nama_kemungkinan}}</td>
											<td>{{$d->total_skor}}</td>
											<td>{{$d->nm_pemicu_resiko}}</td>
											<td>@if ($d->jenis_pemicu==1)
												Internal
											@else
												External
											@endif</td>
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
			        <h4 class="modal-title">Tambah Resiko</h4>
			      </div>
			      <div class="modal-body">
							<form class="form-horizontal" action='{{route('resiko.add')}}' method='post'>
									{{ csrf_field() }}
									<div class="form-group">
											<label for="id_master_resiko" class="col-md-4 control-label">Master resiko</label>

											<div class="col-md-6">
													<select id="id_master_resiko" type="number" class="form-control" name="id_master_resiko" required autofocus>
															@foreach ($mr as $mr)
																	<option value="{{$mr->id_master_resiko}}">{{$mr->nm_pemicu_resiko}} ({{$mr->jenis_pemicu}})</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="deskripsi_resiko" class="col-md-4 control-label">Deskripsi resiko</label>

											<div class="col-md-6">
													<input id="deskripsi_resiko" type="text" class="form-control" name="deskripsi_resiko" required autofocus>
											</div>
									</div>
									<div class="form-group">
											<label for="id_aspek_terdampak" class="col-md-4 control-label">Aspek Terdampak</label>

											<div class="col-md-6">
													<select id="id_aspek_terdampak" type="number" class="form-control" name="id_aspek_terdampak" required autofocus>
															@foreach ($at as $at)
																	<option value="{{$at->id_aspek_terdampak}}">{{$at->nama_aspek_terdampak}}</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="id_kemungkinan" class="col-md-4 control-label">Kemungkinan terjadi</label>

											<div class="col-md-6">
													<select id="id_kemungkinan" type="number" class="form-control" name="id_kemungkinan" required autofocus>
															@foreach ($kt as $kt)
																	<option value="{{$kt->id_kemungkinan}}">{{$kt->nama_kemungkinan}} ({{$kt->skor_kemungkinan}})</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="id_dampak" class="col-md-4 control-label">Dampak</label>

											<div class="col-md-6">
													<select id="id_dampak" type="number" class="form-control" name="id_dampak" required autofocus>
															@foreach ($dm as $d)
																	<option value="{{$d->id_dampak}}">{{$d->nama_dampak}} ({{$d->skor_dampak}})</option>
															@endforeach
											    </select>
											</div>
									</div>
									<div class="form-group">
											<label for="skor" class="col-md-4 control-label">Skor</label>

											<div class="col-md-6">
													<p id="skor"></p>
											</div>
									</div>
									<input type='hidden' name='created_by' id='created_by' value='{{ Auth::user()->username }}'/>
									<a class="btn btn-warning pull-right" href="#callskor">Hitung Skor</a>
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
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script>
			// $('#myModal').on('show.bs.modal', function(e) {
			// 		var idk = $(e.relatedTarget).data('idk');
			// 		$(e.currentTarget).find('input[name="id_dampak"]').val(idk);
			// });

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
											alert(response);
											console.log(a);
							    },
								});
				    },
					});

     });

			// function Calculate()
			// {
			// 		var dampak = document.getElementById('id_kemungkinan').value;
			// 		var kemungkinan = document.getElementById('id_kemungkinan').value;
			// 		document.getElementById('skor').value=parseInt(dampak) * parseInt(kemungkinan);
			// 		document.form1.submit();
			// }
	</script>

</body>
</html>
