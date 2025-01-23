<style>
   .nav-item a:hover {
    text-decoration: underline; 
  }
</style>

<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top" style="background-color: #1C3FDC">
    <div class="container-fluid">
      <a class="navbar-brand display-1" style="font-family: Poppins; margin-left: 5px;" href="#">To-Do!</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" style="font-family: Poppins" aria-current="page" href="{{route("home")}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-family: Poppins" aria-current="page" href="{{route("about")}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" style="font-family: Poppins" aria-current="page" href="{{route("logs")}}">Logs</a>
          </li>
        </ul>
          <a class="btn btn-primary" style="margin-right: 5px; font-family: Poppins" href="{{route("task.add")}}">Add Task</a>
          <a class="btn btn-danger" style="font-family: Poppins" href="{{route("logout")}}">Logout</a>
      </div>
    </div>
  </nav>
</header>
