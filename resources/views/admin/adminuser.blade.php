<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Users</title>
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
				<a class="navbar-brand" href="#"><span>RM</span>Admin</a>
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
			<li><a href="{{route('admin.dashboard')}}"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li  class="active"><a href="{{route('admin.users')}}"><em class="fa fa-calendar">&nbsp;</em> Users</a></li>
			<li class="parent"><a data-toggle="collapse" href="#sub-item-1">
				<em class="fa fa-navicon">&nbsp;</em> Master Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
				</a>
				<ul class="children collapse" id="sub-item-1">
					<li><a class="" href="{{route('admin.master.kemungkinan')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Kemungkinan
					</a></li>
					<li><a class="" href="{{route('admin.master.dampak')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Dampak
					</a></li>
					<li><a class="" href="{{route('admin.master.aspekterdampak')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Aspek Terdampak
					</a></li>
					<li><a class="" href="{{route('admin.master.program')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Program
					</a></li>
					<li><a class="" href="{{route('admin.master.resiko')}}">
						<span class="fa fa-arrow-right">&nbsp;</span> Resiko
					</a></li>
				</ul>
			</li>
			<li><a href="{{route('admin.resiko')}}"><em class="fa fa-exclamation-triangle">&nbsp;</em> Resiko</a></li>
			<li><a href="{{route('admin.detailprogram')}}"><em class="fa fa-info">&nbsp;</em> Detail Program</a></li>
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
				<li class="active">Users</li>
			</ol>
		</div><!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">All Users</h1>
			</div>
		</div><!--/.row-->

		<div class="row">
					<div class="col-sm-12">
						<div class="tbl-header">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <thead>
					        <tr>
										<th>Username</th>
										<th>Email</th>
										<th>Delete</th>
					        </tr>
					      </thead>
					    </table>
					  </div>
					  <div class="tbl-content">
					    <table cellpadding="0" cellspacing="0" border="0">
					      <tbody>
									@foreach ($data as $d)
										<tr>
											<td>{{$d->username}}</td>
											<td>{{$d->email}}</td>
											<td class="action-buttons">
												<form action='{{route('admin.users.delete')}}' method='post'>
                            {{ csrf_field() }}
                            <input type='hidden' name='username' value='{{ $d->username }}'/>
														<button type="submit" style="border:none; background-color: transparent;"><i class="fa fa-xl fa-trash"></i></button>
                        </form>
											</td>
										</tr>
									@endforeach
					      </tbody>
					    </table>
					  </div>
					</div>

			</div><!--/.row-->
		<br>
			<div class="row">
				<div class="col-sm-12">
					<p class="back-link">Risk Mangement <a href="https://www.unair.ac.id">Airlangga University</a></p>
				</div>
			</div>
	</div>	<!--/.main-->

	<script type="text/javascript" src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/chart.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/chart-data.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/easypiechart.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/easypiechart-data.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
	<script type="text/javascript" src="{{ asset('js/custom.js') }}"></script>
	<script>
		window.onload = function () {
			var chart1 = document.getElementById("line-chart").getContext("2d");
			window.myLine = new Chart(chart1).Line(lineChartData, {
			responsive: true,
			scaleLineColor: "rgba(0,0,0,.2)",
			scaleGridLineColor: "rgba(0,0,0,.05)",
			scaleFontColor: "#c5c7cc"
			});
		};

		$(window).on("load resize ", function() {
		  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
		  $('.tbl-header').css({'padding-right':scrollWidth});
		}).resize();
	</script>

</body>
</html>
