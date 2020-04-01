<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('partials.head')
	@yield('styles')
</head>

<body>
	@include('partials.navbar-home')
	
	@yield('content')

	<footer class="footer mt-4">
		<div class="space-1">
			<div class="container">
				<div class="d-lg-flex d-md-block justify-content-between align-items-center">
					<p class="mb-3 mb-lg-0 text-gray-1">© 2020 Traval. All rights reserved</p>
				</div>
			</div>
		</div>
	</footer>
</body>
@include('partials.footer')

@yield('scripts')

</html>