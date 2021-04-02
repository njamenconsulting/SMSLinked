@extends('auth.layouts.cards',['cardHeaderTitle'=>'Login'])

@section('partials-content')
<!-- LOGIN -->

  <form method="POST" action="{{ route('login') }}">
  @csrf
  <div class="field">
    <label class="label">Email Address:</label>
      <div class="control has-icons-left">
          <input class="input @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{old('email') }}"  placeholder="Your Email" autofocus="">
          <span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
      </div>
      @error('email')
          <p class="help is-danger">{{ $message }}</p>
      @enderror
  </div>

  <div class="field">
    <label class="label"> Password: </label>
      <div class="control has-icons-left">
          <input class="input @error('password') is-invalid @enderror" type="password" id="password" name="password" value="{{old('password') }}" placeholder="Your Password">
          <span class="icon is-small is-left">
            <i class="fas fa-key"></i>
          </span>
      </div>
      @error('password')
          <p class="help is-danger">{{ $message }}</p>
      @enderror
  </div>


        <div class="field">
            <label class="checkbox">
              <input type="checkbox" name = "remember" id="remember" {{old('remember') ? 'checked' : '' }}>
              Remember me
            </label>
        </div>
        <button class="button is-block is-info is-fullwidth">Login <i class="fas fa-fighter-jet" aria-hidden="true"></i></button>
        <p class="has-text-grey">
            <a href="{{ route('register') }}">Sign Up</a> &nbsp;·&nbsp;
            <a href="#">Forgot Password</a> &nbsp;·&nbsp;
            <a href="#">Need Help?</a>
        </p>
    </form>
@endsection
