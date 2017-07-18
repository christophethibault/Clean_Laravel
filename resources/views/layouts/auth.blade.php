<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Quickbrain v2') }}</title>
	<!-- Styles -->
	<link href="/css/app.css" rel="stylesheet">
	<!-- JS -->
	<script src="/js/vendor.js"></script>
	<script src="/js/app.js"></script>
</head>
<body class="auth">
	<div class="container">
		<br/>
		<h1 class="text-center">{{ config('app.name', 'Quickbrain v2') }}</h1>
		<br/>
		<br/>
		@yield('content')
	</div>
</body>
</html>
