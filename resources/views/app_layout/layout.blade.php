<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Jeffrey Appiatu Art</title>
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
        crossorigin="anonymous"
    />
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"
    ></script>
    <link
        rel="stylesheet"
        href="assets/bootstrap-5.0.2-dist/css/bootstrap.min.css"
    />
    <source src="assets/bootstrap-5.0.2-dist/js/bootstrap.min.js"/>
    <source src="assets/bootstrap-5.0.2-dist/js/bootstrap.js"/>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"
        integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN"
        crossorigin="anonymous"
    />
    {{--      IziToast Link --}}
    <link rel="stylesheet" href="{{ asset('iziToast/css/iziToast.min.css') }}">
    <script src="{{ asset('iziToast/js/iziToast.min.js') }}"></script>
</head>
<body>
<header>
    <nav
        class="
          navbar navbar-light navbar-expand-md
          py-4
          text-uppercase
          bg-light
        "
    >
        <div class="container">
            <a href="index.html" class="navbar-brand"
            ><span class="fs-2">JEFFREY APPIATU ART</span></a
            >

            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navMenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="/artist" class="nav-link {{ $page == 'artist' ? 'active' : '' }}">Artist</a>
                    </li>
                    <li class="nav-item">
                        <a href="/" class="nav-link {{ $page == 'gallery' ? 'active' : '' }}">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="/contact" class="nav-link {{ $page == 'contact' ? 'active' : '' }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>


@yield('content');


<!-- footer -->
<footer class="bg-white mt-3">
    <section class="p-5">
        <div class="container text-center">
            <div class="d-flex justify-content-center align-items-center">
                <a href="https://www.facebook.com/jeffreyappiatuart" target="_blank" class="text-dark h2 mx-3"
                ><i class="bi bi-facebook"></i
                    ></a>
                <a href="https://twitter.com/jeffreyappiatu" target="_blank" class="text-dark h2 mx-3"
                ><i class="bi bi-twitter"></i
                    ></a>
                <a href="https://www.instagram.com/jeffreyappiatu_art" target="_blank" class="text-dark h2 mx-3"
                ><i class="bi bi-instagram"></i
                    ></a>
            </div>
        </div>
    </section>
    <section class="bg-dark text-white p-5">
        <div class="container text-center">
            <p class="lead">Copyright &copy; Jeffrey Appiatu 2021</p>
        </div>
    </section>
</footer>
</body>

<script>
    @if (session('success'))
    iziToast.success({
        // theme: 'dark',
        title: 'Great',
        message: '{{ session('success') }}',
        position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        progressBarColor: 'rgb(0, 255, 184)',
    });
    @endif

    @if ($errors->any())
    iziToast.error({
        // theme: 'dark',
        title: 'Fail',
        message: 'Invalid input, try again.',
        position: 'bottomRight', // bottomRight, bottomLeft, topRight, topLeft, topCenter, bottomCenter, center
        progressBarColor: 'rgb(243,53,53)',
    });
    @endif

</script>

</html>
