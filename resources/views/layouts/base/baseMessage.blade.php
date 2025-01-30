<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <title>@yield( 'title')|Messagerie</title>
</head>
<body>
   <div class="container mt-5">
    @yield('Message')
   </div>
   <script src="{{ asset("bootstrap5/js/bootstrap.bundle.min.js") }}"></script>

</body>
</html>
