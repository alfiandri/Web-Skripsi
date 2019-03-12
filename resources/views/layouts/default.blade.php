
<html>
<!-- Head -->
<head>
	@include('layouts.head')
</head>
<!-- End head -->

<!-- Body -->
<body>
	@include('layouts.cursor')
	@include('layouts.nav')
	@yield('contents')
	
	@include('layouts.footer')
	@include('layouts.js')
</body>
<!-- End body -->
</html>