<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
<meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('link')
    @yield('script_head')
    <script src="/client/js/client/accounting.js"></script>
    <script>
        let text = document.getElementsByClassName('total').value;
        let re = accounting.formatMoney(text);
        document.getElementsByClassName('total').value = re;
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="/client/css/style.css" />
    <link rel="stylesheet" href="/client/css/footer.css" />
    <link rel="stylesheet" href="/client/css/responsiveslides.css" />

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

    <link rel="shortcut icon" type="image/jpg" href="/fion.png" />
    <script>
        $(function() {

            // Slideshow 1
            $("#slider1").responsiveSlides({
                maxwidth: 1600,
                speed: 600
            });
        });
    </script>
</head>

<body>

    @include('client.include.header')
    @yield('content')
    @include('client.include.footer')
    @yield('script')
    <script src="/client/js/client/header.js"></script>
    <script src="/client/js/responsiveslides.min.js"></script>
    <script src="/client/js/index.js"></script>
</body>

</html>
