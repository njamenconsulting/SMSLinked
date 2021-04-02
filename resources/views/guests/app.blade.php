
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ config('app.name', 'SMSLinked-v2') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bulma-pricingtable.min.css') }}" rel="stylesheet">
    <script async type="text/javascript" src="{{ asset('js/bulma.js') }}"></script>

</head>
<body>
      <!-- Navigation bar -->
    <nav class="navbar is-link is-fixed-top">
         @include('guests.nav')
    </nav>

  <!-- HERO SECTION -->
      <section class="hero is-fullheight">
        <div class="header has-background-warning">
             @include('guests.header')
        </div>
        <div class="hero-body has-background-grey-lighter is-justify-content-center">
            @yield('content')
        </div>
      </section>
<!-- ../ HERO SECTION-->
      <hr class="navbar-divider">
<!-- SERVICE SECTION -->
      <section class="section" id = "service'">
           @include('guests.partials._service')
      </section>
<!-- ../ SERVICE SECTION -->
        <hr class="navbar-divider">
<!-- PRICING SECTION -->
      <section class="section" id= "pricing">
           @include('guests.partials._pricing')
      </section>
<!-- ../ PRICING SECTION -->
      <hr class="navbar-divider">
<!-- PRICING SECTION -->
      <section class="section has-background-info" id="contact">
          @include('guests.partials._hero')
      </section>
      <!-- FOOTER-->
      <footer class="footer">
          @include('guests.footer')
      </footer>
       <!-- ../FOOTER-->
</body>
</html>
