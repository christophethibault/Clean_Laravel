<!DOCTYPE html>
<html lang="fr">
<head>
	@include('layouts.partials.head')
</head>
<body>
<div id="wrapper">
	<!-- Sidebar -->
	<div id="sidebar-wrapper">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header fixed-brand">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" id="menu-toggle">
				<span class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
			</button>
		</div><!-- navbar-header-->
		<ul class="sidebar-nav nav-pills nav-stacked" id="menu">
			<li style="text-indent:0">
				<!-- Branding Image -->
				<a class="navbar-brand-custom" href="{{ url('/') }}">
					<i class="fa fa-cloud"></i>
					<span>{{ config('app.name', 'Quickbrain v2') }}</span>
				</a>
			</li>

			@if (Auth::check())
				<li class="">
					<a href="{{ url('/') }}">
						<span class="fa-stack pull-left"><i
									class="fa fa-home fa-stack-1x "></i></span> {{ trans("common.layout.accueil") }}
					</a>
				</li>
			@endif
		</ul>
	</div><!-- /#sidebar-wrapper -->

	<nav class="navbar navbar-default navbar-custom no-margin">
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active">
					<button class="navbar-toggle collapse in" data-toggle="collapse" id="menu-toggle-2">
						<span class="glyphicon glyphicon-menu-hamburger" aria-hidden="true"></span>
					</button>
				</li>
			</ul>
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right navbar-right-icon">
				<!-- Authentication Links -->
				@if (Auth::guest())
					<li><a href="{{ route('login') }}">{{ trans("common.actions.login") }}</a></li>
					<li><a href="{{ route('register') }}">{{ trans("common.actions.register") }}</a></li>
				@else
					<li class="dropdown">
						{{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">--}}
						{{--{{Auth::user()->fullname}} <span class="caret"></span>--}}
						{{--</a>--}}
						<a class="text-center dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
							<i class="fa fa-2x fa-user"></i>
							<p class="outline">{{Auth::user()->fullname }} <b class="caret"></b></p>
						</a>
						{{--<a href="http://bootsnipp.com/resources" class="dropdown-toggle" data-toggle="dropdown"> {{Auth::user()->fullname}} <b class="caret"></b></a>--}}

						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="{{ route('logout') }}"
								   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
									{{ trans("common.actions.logout") }}
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST"
								      style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endif
			</ul>
		</div><!-- bs-example-navbar-collapse-1 -->
	</nav>

	<!-- Page Content -->
	<div id="page-content-wrapper" style="padding-bottom: 100px;">
		<div class="container-fluid">
			@yield('content')
		</div>
	</div><!-- /#page-content-wrapper -->
</div><!-- /#wrapper -->
@include('partials.error')
</body>
</html>
