<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	@include('partials.head')
	@yield('styles')
</head>

<body>
	@include('partials.navbar')
	
	@yield('content')
	
	<footer class="footer mt-4">
		<div class="space-1">
			<div class="container">
				<div class="d-lg-flex d-md-block justify-content-between align-items-center">
					<!-- Copyright -->
					<p class="mb-3 mb-lg-0 text-gray-1">© 2020 Traval. All rights reserved</p>
					<!-- End Copyright -->

					<!-- Social Networks -->
					<ul class="list-inline mb-0">
						<li class="list-inline-item  pb-3 pb-md-0">
							<a class="list-group-item-action text-decoration-on-hover pr-3" href="../home/index.html">Home</a>
						</li>
						<li class="list-inline-item  pb-3 pb-md-0">
							<a class="list-group-item-action text-decoration-on-hover pr-3" href="../home/home-v6.html">Activity</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</footer>
</body>
@include('partials.footer')

@yield('scripts')

</html>