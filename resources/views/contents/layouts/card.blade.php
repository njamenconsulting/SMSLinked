@extends('auth.template')


@section('Breadcrump-Title')
    {{ $BreadcrumpTitle }}
@endsection

@section('main-content')

<div class="card card-shadow">
  <header class="card-header has-background-info">
      @yield('card-header')

  </header>
  <div class="card-content">
    <div class="content">

        @yield('card-content')

    </div>
  </div>
  <footer class="card-footer has-background-link-light">
      @yield('card-footer')
  </footer>
</div>
@endsection
