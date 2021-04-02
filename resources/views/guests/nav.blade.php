<div class="navbar-brand">
    <a class="navbar-item" href="../">
        <img src="img/made-with-bulma.png" alt="Logo">
    </a>
    <div class="navbar-burger burger" data-target="navbarMain">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>

<div id="navbarMain" class="navbar-menu">
    <div class="navbar-end">
        <a class="navbar-item" href="#about">
          <span class="icon">
            <i class="fas fa-info"></i>
          </span>
          <span>About</span>
        </a>
        <a class="navbar-item" href="#services">
          <span class="icon">
            <i class="fas fa-bars"></i>
          </span>
          <span>Services</span>
        </a>
        <a class="navbar-item" href="#resume">
          <span class="icon">
            <i class="fas fa-file-alt"></i>
          </span>
          <span>Resume</span>
        </a>
        <a class="navbar-item" href="#portfolio">
          <span class="icon">
            <i class="fas fa-th-list"></i>
          </span>
          <span>Portfolio</span>
        </a>
        <a class="navbar-item" href="#contact">
          <span class="icon">
            <i class="fas fa-envelope"></i>
          </span>
          <span>Contact</span>
        </a>

      <a  href="{{ route('register') }}" class="navbar-item is-warning-dark">
          <span class="icon is-small is-left">
          <i class="fas fa-edit"></i>
          </span>
          <strong>Sign up</strong>
      </a>
      <a href="{{ route('login') }}"  class="navbar-item is-warning">
          <span class="icon is-small is-left">
          <i class="fas fa-sign-in-alt"></i>
          </span>
          <strong>Log in</strong>
      </a>

    </div>
</div>
