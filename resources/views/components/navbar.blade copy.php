<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ExistAuto</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<header>
  @auth
  @if (Auth::user()->role == 'admin')
  <div class="container border-bottom">
    <div class="logo">
      <img src="logo.png" alt="ExistAuto">
    </div>
    <nav>
      <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="/beli">Beli Mobil</a></li>
        <li><a href="/jual">Jual Mobil</a></li>
        <li><a href="/forum">Forum</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </nav>
    <div class="search">
      <input type="text" placeholder="Cari mobil...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="user">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle text-secondary" data-toggle="dropdown"
            aria-expanded="false" href="#">Profile</a>
          <div class="dropdown-menu" role="menu">
            <p class="dropdown-item" role="presentation"
              href="#">{{auth()->user()->name}}</p>
            <a class="dropdown-item" role="presentation"
              href="/editprofile/{{Auth::user()->id}}">Edit Profile</a>
            <a class="dropdown-item" role="presentation"
              href="/changepw/{{Auth::user()->id}}">Change Password</a>
          </div>
        </li>
      </ul>
    </div>
    <a class="btn btn-light action-button" role="button" href="/logout">Log Out</a>
  </div>
  @elseif(Auth::user()->role == 'customer')
  <div class="container">
    <div class="logo">
      <img src="logo.png" alt="ExistAuto">
    </div>
    <nav>
      <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="/beli">Beli Mobil</a></li>
        <li><a href="/jual">Jual Mobil</a></li>
        <li><a href="/forum">Forum</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </nav>
    <div class="search">
      <input type="text" placeholder="Cari mobil...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="user">
      <ul class="nav navbar-nav">
        <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle text-secondary" data-toggle="dropdown"
            aria-expanded="false" href="#">Profile</a>
          <div class="dropdown-menu" role="menu">
            <p class="dropdown-item" role="presentation"
              href="#">{{auth()->user()->name}}</p>
            <a class="dropdown-item" role="presentation"
              href="/editprofile/{{Auth::user()->id}}">Edit Profile</a>
            <a class="dropdown-item" role="presentation"
              href="/changepw/{{Auth::user()->id}}">Change Password</a>
          </div>
        </li>
      </ul>
    </div>
    <a class="btn btn-light action-button" role="button" href="/logout">Log Out</a>
  </div>
  @endif
  @else
  <div class="shadow-sm navbar">
    <div class="logo">
      <img src="logo.png" alt="ExistAuto">
    </div>
    <nav>
      <ul>
        <li><a href="/home">Home</a></li>
        <li><a href="#">About Us</a></li>
      </ul>
    </nav>
    <div class="search">
      <input type="text" placeholder="Cari mobil...">
      <button type="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="user">
      <a class="login-btn" href="/login">Login</a>
      <a class="signup-btn" href="/signup">Sign Up</a>
    </div>
  </div>
  <br>
  
  @endauth
</header>
@yield('home')
@yield('login')
@yield('signup')
@yield('BeliMobil')
@yield('JualMobil')
@yield('forum')
@yield('addforum')

<!-- <footer class="bg-white py-4">
  <div class="container justify-content-center">
    <div class="row">
      <div class="col-md-4">
        <h5>ExistAuto</h5>
        <p>Gading Serpong, Banten, Indonesia</p>
      </div>
      <div class="col-md-4">
        <h5>Follow Us</h5>
        <ul class="list-unstyled">
          <li><a href="#">Facebook</a></li>
          <li><a href="#">Twitter</a></li>
          <li><a href="#">Instagram</a></li>
        </ul>
      </div>
      <div class="col-md-4">
        <h5>Contact Us</h5>
        <p>Email: info@example.com</p>
        <p>Phone: +1234567890</p>
      </div>
    </div>
  </div>
</footer> -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
</body>
</html>
