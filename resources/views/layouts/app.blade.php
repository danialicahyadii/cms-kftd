<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport">
    <title>@yield('title') &mdash; CMS</title>

    <!-- General CSS Files -->
    <link rel="stylesheet"
        href="{{ asset('library/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">

    @stack('style')

    <!-- Template CSS -->
    <link rel="stylesheet"
        href="{{ asset('css/style.css') }}">
    <link rel="stylesheet"
        href="{{ asset('css/components.css') }}">


    <!-- Start GA -->
    <script async
        src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- END GA -->
</head>
</head>

<body>
    @include('sweetalert::alert')
    <div id="app">
        <div class="main-wrapper">
            <!-- Header -->
            @include('components.header')

            <!-- Sidebar -->
            @include('components.sidebar')

            <!-- Content -->
            @yield('main')

            <!-- Footer -->
            @include('components.footer')
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('library/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('library/popper.js/dist/umd/popper.js') }}"></script>
    <script src="{{ asset('library/tooltip.js/dist/umd/tooltip.js') }}"></script>
    <script src="{{ asset('library/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('library/jquery.nicescroll/dist/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('library/moment/min/moment.min.js') }}"></script>
    <script src="{{ asset('js/stisla.js') }}"></script>

    @stack('scripts')
    <!-- Template JS File -->
    <script src="{{ asset('js/scripts.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script>
        // document.addEventListener('contextmenu', function(e) {
        //     e.preventDefault(); // Mencegah klik kanan
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.14.0/dist/sweetalert2.all.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.show-link').on('click', function(e){
                var src = $(this).attr('src');
                Swal.fire({
                    title: false,
                    text: false,
                    imageUrl: src,
                    imageWidth: false,
                    imageHeight: false,
                    showConfirmButton: false,
                    });

            })
        });
    </script>
</body>

</html>
