@extends('layouts.template')

@section('landing')


<div class="container">

     @if (session()->has('berhasil'))
     <div class="row justify-content-center">
        <div class="alert alert-success alert-dismissible fade show mt-2 col-md-6" role="alert" style="position: absolute; z-index: 9999">
          {{ session('berhasil') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
     </div>
      @endif

      @if (session()->has('LoginError'))
        <div class="alert alert-danger alert-dismissible fade show mt-2 col-md-12" role="alert">
          {{ session('LoginError') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
 <div class="row justify-content-center mt-5">
          <div class="col-md-6 border">
            <main class="form-signin w-100 m-auto mt-5">
                    <h1 class="h3 mb-3 fw-normal text-center mb-4">Login</h1>
                <form action="/login" method="post">
                  @csrf
                    <div class="form-floating">
                    <input type="email" name="email" class="form-control rounded-0 @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" required autofocus value="{{ old('email') }}">
                    <label for="email">Email address</label>
                    @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                    @enderror
                    </div>
                    <div class="form-floating">
                    <input type="password" name="password" class="form-control rounded-0" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    </div>
                    <button class="btn btn-primary w-100 py-2 mt-3 rounded-0" type="submit">Login</button>
                </form>
                <small class="d-block text-center mt-2 mb-5">Not registered ? <a href="/register">register now</a></small>
            </main>
    </div>
  </div>
</div>

@endsection