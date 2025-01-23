<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #1C3FDC">
      <div class="container-fluid">
        <a class="navbar-brand display-1" href="#">To-Do!</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route("home")}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="{{route("home")}}">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route("home")}}">About</a>
            </li>
          </ul>
            <a class="btn btn-danger" href="{{route("logout")}}">Logout</a>
        </div>
      </div>
    </nav>
  </header>
  