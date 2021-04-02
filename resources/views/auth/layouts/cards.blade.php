@extends('guests.app')

@section('content')
<div class="columns is-gapless is-multiline is-mobile">
      <div class="column is-one-quarter">

      </div>

      <div class="column auto">

        <div class="card">

            <header class="card-header has-background-warning">
              <p class="card-header-title has-text-weight-bold is-justify-content-center is-size-4">
                 {{ $cardHeaderTitle}}
              </p>
            </header>

            <div class="card-content">

              <div class="icon-text">
                <span class="icon has-text-warning">
                  <i class="fas fa-exclamation-triangle"></i>
                </span>
                <span class="block has-text-center is-italic has-text-warning-dark">* Pleace enter your credentials</span>
              </div>

              <div class="content">
                   @yield('partials-content')
              </div>
            </div>

            <footer class="card-footer">
                <p class="card-footer-item"> </p>
                <p class="card-footer-item"> </p>
            </footer>
        </div>
    </div>

</div>
@stop
