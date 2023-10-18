<nav class="navbar navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/">Creative Coder</a>
      <div class="d-flex">
        <a href="#home" class="nav-link">Home</a>
        <a href="#blogs" class="nav-link">Blogs</a>
        <a href="#subscribe" class="nav-link">Subscribe</a>
       
        @if (auth()->check())
        <a href="#" class="nav-link">{{auth()->user()->name}}</a>
            <form action="/logout" method="POST">
              @csrf
               <button type="submit" class="btn">Logout</button>
            </form>
        @else
        <a href="/register" class="nav-link">Register</a>
        <a href="/login" class="nav-link">Login</a>
        @endif
      </div>
    </div>
  </nav>