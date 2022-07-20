<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        {{-- Trix Editor --}}
        <link rel="stylesheet" type="text/css" href="/css/trix.css">
        <script type="text/javascript" src="/js/trix.js"></script>

        {{-- Leaflet --}}
        <script src="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet-src.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.8.0/dist/leaflet.css">

        <title>webSIG | </title>
        <style>
            /* Show it is fixed to the top */
            body {
            min-height: 20rem;
            padding-top: 4.5rem;
            }
        </style>
    </head>
    <body>
        @include('layouts.partials.navbar')
        
        <div class="container mt-4">
            @yield('content')
        </div>
        <footer class="text-center text-lg-start bg-light text-muted fixed-button">
            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
                © 2022 Copyright:
                <a class="text-reset fw-bold" href="{{ Route('index') }}">WebSIG</a>
            </div>
            <!-- Copyright -->
        </footer>

        <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
        <script src="/js/dashboard.js"></script>
    </body>
</html>