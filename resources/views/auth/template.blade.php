<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{ config('app.name', 'SMSLinked-v2') }}</title>

  <!-- Bulma is included -->

  <link href="{{ asset('css/main.min.css') }}" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="{{ asset('css/fonts-googleapis.css') }}" rel="stylesheet" type="text/css">

</head>
<body>
<div id="app">
  <nav id="navbar-main" class="navbar is-fixed-top">
    <div class="navbar-brand">
      <a class="navbar-item is-hidden-desktop jb-aside-mobile-toggle">
        <span class="icon"><i class="mdi mdi-forwardburger mdi-24px"></i></span>
      </a>
      <div class="navbar-item has-control">
        <div class="control"><input placeholder="Search everywhere..." class="input"></div>
      </div>
    </div>
    <div class="navbar-brand is-right">
      <a class="navbar-item is-hidden-desktop jb-navbar-menu-toggle" data-target="navbar-menu">
        <span class="icon"><i class="mdi mdi-dots-vertical"></i></span>
      </a>
    </div>
    <div class="navbar-menu fadeIn animated faster" id="navbar-menu">
      <div class="navbar-end">
        <div class="navbar-item has-dropdown has-dropdown-with-icons has-divider has-user-avatar is-hoverable">
          <a class="navbar-link is-arrowless">

            <div class="is-user-name"><span><i class="mdi mdi-24px mdi-account"></i>{{ Auth::user()->name }}</span></div>
            <span class="icon"><i class="mdi mdi-chevron-down"></i></span>
          </a>
          <div class="navbar-dropdown">
            <a href="profile.html" class="navbar-item">
              <span class="icon"><i class="mdi mdi-account"></i></span>
              <span>My Profile</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-settings"></i></span>
              <span>Settings</span>
            </a>
            <a class="navbar-item">
              <span class="icon"><i class="mdi mdi-email"></i></span>
              <span>Messages</span>
            </a>
            <hr class="navbar-divider">
            <a class="navbar-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
              <span class="icon"><i class="mdi mdi-logout"></i></span>
              <span>Log Out</span>
            </a>
          </div>
        </div>
        <a title="Log out" class="navbar-item is-desktop-icon-only" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
          <form id="logout-form" action="{{ route('logout') }}" method="POST" hidden>@csrf</form>
          <span class="icon"><i class="mdi mdi-logout"></i></span>
          <span>Log out</span>
        </a>
      </div>
    </div>
  </nav>
  <aside class="aside is-placed-left is-expanded">
    <div class="aside-tools">
      <div class="aside-tools-label">
        <span><b>Admin</b> SMSLinked</span>
      </div>
    </div>
    <div class="menu is-menu-main">
      <p class="menu-label">General</p>
      <ul class="menu-list">
        <li>
          <a href="index.html" class="is-active router-link-active has-icon">
            <span class="icon"><i class="mdi mdi-desktop-mac"></i></span>
            <span class="menu-item-label">Dashboard</span>
          </a>
        </li>
      </ul>
      <p class="menu-label">Message</p>
      <ul class="menu-list">

        <li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-cellphone-message"></i></span>
            <span class="menu-item-label">SMS</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="{{ route('sms.create') }}">
                <span class="icon"><i class="mdi mdi-message-text"></i></span>
                <span>New SMS</span>
              </a>
            </li>
            <li>
              <a href="{{ route('sms.index') }}">
                <span class="icon"><i class="mdi mdi-message-text"></i></span>
                <span>Show SMS</span>
              </a>
            </li>
          </ul>
        </li>


        <li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-contacts"></i></span>
            <span class="menu-item-label">Contact</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="{{route('contact.create') }}">
                <span class="icon"><i class="mdi mdi-format-align-justify"></i></span>
                <span>New Contact</span>
              </a>
            </li>
            <li>
              <a href="{{route('upload.create') }}">
                <span class="icon"><i class="mdi mdi-file-upload"></i></span>
                <span>Upload Contacts</span>
              </a>
            </li>
            <li>
              <a href="{{route('contact.index')}}">
                <span class="icon"><i class="mdi mdi-eye"></i></span>
                <span>Show Contact</span>
              </a>
            </li>
          </ul>
        </li>



        <li>
          <a class="has-icon has-dropdown-icon">
            <span class="icon"><i class="mdi mdi-account-group"></i></span>
            <span class="menu-item-label">Groups</span>
            <div class="dropdown-icon">
              <span class="icon"><i class="mdi mdi-plus"></i></span>
            </div>
          </a>
          <ul>
            <li>
              <a href="{{route('group.create')}}">
                <span class="icon"><i class="mdi mdi-account-multiple-plus"></i></span>
                <span>New Group</span>
              </a>
            </li>
            <li>
              <a href="{{route('group.index')}}">
                <span class="icon"><i class="mdi mdi-eye"></i></span>
                <span>Show Groups</span>
              </a>
            </li>
          </ul>
        </li>

      </ul>
      <p class="menu-label">Statistics</p>
      <ul class="menu-list">
        <li>
          <a href="https://admin-one-html.justboil.me/" target="_blank" class="has-icon">
            <span class="icon"><i class="mdi mdi-cart-outline"></i></i></span>
            <span class="menu-item-label">Purchase</span>
          </a>
        </li>
        <li>
          <a href="https://justboil.me/bulma-admin-template/one-html" class="has-icon">
            <span class="icon"><i class="mdi mdi-gauge"></i></span>
            <span class="menu-item-label">Usages</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <section class="section is-title-bar">
    <div class="level">
      <div class="level-left">
        <div class="level-item">
          <ul>
            <li>Admin</li>
            <li>@yield('Breadcrump-Title')</li>
          </ul>
        </div>
      </div>
      <div class="level-right">
        <div class="level-item">
          <div class="buttons is-right">
            <a href="https://admin-one-html.justboil.me/" target="_blank" class="button is-link">
              <span class="icon"><i class="mdi mdi-credit-card-outline"></i></span>
              <span>Premium Demo</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

    <section class="section is-main-section">
    @yield('main-content')
     </section>


  <footer class="footer">
    <div class="container-fluid">
      <div class="level">
        <div class="level-left">
          <div class="level-item">
            © 2020, NjamenConsulting
          </div>
          <div class="level-item">
            <a href="https://github.com/vikdiesel/admin-one-bulma-dashboard" style="height: 20px">
              <img src="https://img.shields.io/github/v/release/vikdiesel/admin-one-bulma-dashboard?color=%23999">
            </a>
          </div>
        </div>
        <div class="level-right">
          <div class="level-item">
            <div class="logo">
              <a href="https://justboil.me"><img src="img/justboil-logo.svg" alt="JustBoil.me"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<div id="sample-modal" class="modal">
  <div class="modal-background jb-modal-close"></div>
  <div class="modal-card">
    <header class="modal-card-head">
      <p class="modal-card-title">Confirm action</p>
      <button class="delete jb-modal-close" aria-label="close"></button>
    </header>
    <section class="modal-card-body">
      <p>This will permanently delete <b>Some Object</b></p>
      <p>This is sample modal</p>
    </section>
    <footer class="modal-card-foot">
      <button class="button jb-modal-close">Cancel</button>
      <button class="button is-danger jb-modal-close">Delete</button>
    </footer>
  </div>
  <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
</div>

<!-- Scripts below are for demo only -->
<script type="text/javascript" src="{{ asset('js/main.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/chart.sample.min.js') }}"></script>

<!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
<link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
<link rel="stylesheet" href="{{ asset('css/materialdesignicons.min.css') }}">
@yield('scripts')
</body>
</html>
