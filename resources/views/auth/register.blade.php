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
<main class="form-signin  m-auto"> 
    <form method="POST" action="{{ route('register.post') }}"> <img class="mb-4" src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> 
        @csrf
        <h1 class="h3 mb-3 fw-normal">Create an Account</h1> 
        <div class="form-floating" style="margin-bottom: 10px"> 
            <input name="fullname" type="text" class="form-control" id="floatingInput" placeholder="Full Name" style="width: 20rem"> 
            <label for="floatingInput">Full Name</label>
            @error('fullname')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <div class="form-floating" style="margin-bottom: 10px"> 
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" style="width: 20rem"> 
            <label for="floatingInput">Email address</label> 
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
        <div class="form-floating" style="margin-bottom: 10px"> 
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" style="width: 20rem"> 
            <label for="floatingPassword">Password</label> 
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div> 
       @if(session()->has('success'))
           <div class="alert alert-success" style="width: 20rem">
               {{ session()->get('success') }}
           </div>
       @endif
       @if(session('error'))
           <div class="alert alert-danger" style="width: 20rem">
               {{ session('error') }}
           </div>
       @endif
       <button class="btn btn-primary py-2" style="width: 20rem" type="submit">Register</button> 
    </form> 
</main>
@endsection