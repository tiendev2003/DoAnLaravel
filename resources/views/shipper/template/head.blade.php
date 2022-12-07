<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
{{-- CSRF Token --}}
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>
<!-- Custom fonts for this template -->
@yield('style-libraries')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css">
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="shortcut icon" href="/fion.png" type="image/x-icon">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
<link rel="stylesheet" href="{{ asset('ad/css/sb-admin-2.min.css') }}">
<link rel="stylesheet" href="{{ asset('ad/vendor/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('ad/css/style.css') }}">
