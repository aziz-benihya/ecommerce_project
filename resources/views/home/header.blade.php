<header class="header_section">
  <nav class="navbar navbar-expand-lg custom_nav-container" style="background-color: #ffffff;"> <!-- Fond blanc -->
    <a class="navbar-brand" href="index.html"> <!-- Fond mauve pour le titre -->
      <span style="color: rgb(17, 4, 4); font-weight: bold; font-size: 1.5rem;"> <!-- Texte blanc -->
        ZINWEAR
      </span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" style="color: #000 ;"></span> <!-- Icône mauve -->
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="{{url('/')}}" style="color: #000;">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="shop.html" style="color: #000 ;">
            Shop
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="why.html" style="color: #000;">
            Why Us
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="testimonial.html" style="color: #000;">
            Testimonial
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.html" style="color: #000;">Contact Us</a>
        </li>
      </ul>
      <div class="user_option">
        @if (Route::has('login'))
        @auth
        <a href="{{url('myorders')}}" style="color: #000;">
          My Orders
        </a>

        <a href="{{url('mycart')}}" style="color: #000;">
          <i class="fa fa-shopping-bag" aria-hidden="true" style="color: #000;"></i>
          {{$count}}
        </a>

        <form style="padding: 15px" method="POST" action="{{ route('logout') }}">
          @csrf
          <input class="btn btn-light" type="submit" value="logout" style="background-color: #1eaf43; color: white; font-weight: 500;"> <!-- Bouton mauve avec texte blanc -->
        </form>

        @else
        <a href="{{url('/login')}}" style="color: #000;">
          <i class="fa fa-user" aria-hidden="true" style="color: #000;"></i>
          <span>
            Login
          </span>
        </a>

        <a href="{{url('/register')}}" style="color: #000;">
          <i class="fa fa-vcard" aria-hidden="true" style="color: #000;"></i>
          <span>
            register
          </span>
        </a>
        @endauth
        @endif
      </div>
    </div>
  </nav>
</header>

<style>
/* Styles pour les états hover */
.nav-link:hover,
.user_option a:hover {
  color: #6C63FF !important;
  opacity: 0.8;
  text-decoration: underline;
  background-color: #f0f0f0;
  border-radius: 4px;
}

.nav-item.active .nav-link {
  color: #6C63FF !important;
  font-weight: 600;
  text-decoration: underline;
}

.navbar-toggler {
  color: #6C63FF;
  border-color: #6C63FF;
}

/* Animation douce au survol */
.nav-link, .user_option a {
  transition: all 0.3s ease;
  padding: 0.5rem 1rem;
}

/* Style global */
.custom_nav-container {
  box-shadow: 0 2px 10px rgba(108, 99, 255, 0.1);
}
</style>