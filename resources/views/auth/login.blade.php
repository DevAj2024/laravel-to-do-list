@extends("layout.auth")
@section("style")
    <style>
        html,
    body {
    height: 100%;
    }

    .form-signin {
    max-width: 330px;
    padding: 1rem;
    }

    .form-signin .form-floating:focus-within {
    z-index: 2;
    }

    .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    }

    .form-signin input[type="password"] {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    }
    </style>
@endsection


@section("content") 
<main class="form-signin w-100 m-auto">
    <form method="POST" action="{{route("login.post")}}">
      @csrf
      <img class="center mb-4" style="align-content: center" src="{{asset("assets/img/to-do-icon.jpg")}}" alt="" width="72" height="72">
      <h1 class="h3 mb-5 fw-normal" style="font-family: Poppins;">Welcome to To-Do!</h1>
      <h4 class="mb-3 fw-normal" style="font-family: Poppins;">Sign In Your Account</h4>
  
      <div class="form-floating">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput" style="font-family: Poppins;">Email address</label>
        @error("email")
        <span class="text-danger"> {{$message}}</span>
        @enderror
      </div>
      <div class="form-floating" style="margin-bottom: 10px">
        <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword" style="font-family: Poppins;">Password</label>
        @error("password")
        <span class="text-danger"> {{$message}}</span>
        @enderror
      </div>
      @if(session()->has("success"))
      <div class="alert alert-success">
          {{session()->get("success")}}
      </div>
      @endif
      
      @if(session()->has("error"))
      <div class="alert alert-danger">
          {{session("error")}}
      </div>
      @endif
      <div class="form-check text-start my-3">
        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault" style="font-family: Poppins;">
          Remember me
        </label>
      </div>
      <button class="btn btn-primary w-100 py-2" type="submit" style="font-family: Poppins;">Sign in</button>
      <a href="{{route("register")}}" class="btn btn-primary w-100 py-2" style="font-family: Poppins; margin-top: 5px">Create an account</a>
    </form>
  </main>
@endsection