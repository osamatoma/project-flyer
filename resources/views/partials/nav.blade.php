<nav class="navbar navbar-expand-md navbar-dark   bg-dark">
    <a class="navbar-brand" href="{{ url('') }}">Project flyer</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#loginNav" aria-controls="loginNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="loginNav">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="{{ url('') }}">Home <span class="sr-only">(current)</span></a>
        </li>
         @guest
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Login</a>
          <div class="dropdown-menu" aria-labelledby="dropdown01">
            <a class="dropdown-item" href="{{ route('login') }}">Login </a>
            <a class="dropdown-item" href="{{ route('register') }}">Register </a>
          </div>
        </li>
        @else
          <li class="nav-item active">
            <a class="nav-link" href="#">{{ auth()->user()->name }}</a>
          </li>
        @endguest
      </ul>
    </div>
  </nav>
