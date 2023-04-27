<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('dist/css/bootstrap.min.css') }}">
</head>
<body>
<div class="container">
<header>
    <div class="px-3 py-2 text-bg">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <h1>HEADER</h1>
            </div>
        </div>
    </div>
    <div class="px-3 py-2 text-bg-dark mb-3">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        @yield('menu')
        </div>
    </div>
</header>

<!-- bagian menu -->


<!-- bagian konten -->
@yield('konten')
<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 Company, Inc</p>

    <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
    </a>
</footer>
</div>
</body>
</html>